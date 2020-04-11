<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\profileRequest;
use Illuminate\Http\Request;
use App\User;
use App\Messagee;
use App\Chat;
use App\Image;
use App\Profile;
use App\Like;
use App\Noti;
use Auth;
use File;
// use Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_result(){
        $dataa=User::where('name',$_POST['search_user'])->first();
        $data=Profile::where('user_id',$dataa->id)->first();
        return view('search')->with('data',$data)->with('dataa',$dataa);
    }
    public function notify($type , $id){
        $noti=Noti::where('user_id',$id)->where('state',false)->where('noti_user_id',Auth::user()->id)->first();
        if(empty($noti)){
        $noti=new Noti();
        $noti->user_id=$id;
        $noti->noti_user_id=Auth::user()->id;
        $noti->date=date("Y-m-d h:i:s");
        $noti->type=$type;
        $noti->state=false;
        $noti->save();
        }else if($type == "unlike"){
            Noti::where('user_id',$id)->where('state',false)->where('noti_user_id',Auth::user()->id)->delete();
        }
    } 
     public function update_noti(){
        $noti=Noti::find($_POST['noti_id']);
        $noti->user_id=$noti->user_id;
        $noti->noti_user_id=$noti->noti_user_id;
        $noti->date=$noti->date;
        $noti->type=$noti->type;
        $noti->state=true;
        $noti->save();
    } 
    public function index()
    {
       $data=Profile::orderBy('id','desc')->where('user_id','!=',Auth::user()->id)->get();
        return view('index')->with('data',$data);
    }
  
    public function like()
    {
       $data=Profile::orderBy('id','desc')->where('user_id','!=',Auth::user()->id)->get();
        return view('like')->with('data',$data);
    }
    public function like2()
    {
       $data=Profile::orderBy('id','desc')->where('user_id','!=',Auth::user()->id)->get();
        return view('like2')->with('data',$data);
    }
  
    public function add_to_likelist(Request $request)
    {
        $like=Like::where('user_id',Auth::user()->id)->where('like_user_id',$_POST['id'])->first();
         $user=User::where('id',$_POST['id'])->first();
        if(isset($like)){
          Like::where('user_id',Auth::user()->id)->where('like_user_id',$_POST['id'])->delete();
          $this->notify('unlike',$_POST['id']);
                    return $user->name." is Removed from Likelist !";
        }else{
        $like=new Like();
        $like->user_id=Auth::user()->id;
        $like->like_user_id=$_POST['id'];
        $like->save();
        $this->notify('like',$_POST['id']);
                  return $user->name." is added to Likelist !";
        }
    }

    public function message()
    {
        $chat1=Chat::where('user_id','=',Auth::user()->id)->get();
        $chat2=Chat::where('user_id2','=',Auth::user()->id)->get();
           return view('message')->with('data1',$chat1)->with('data2',$chat2);
    }
    public function get_message(){
        $chat1=Chat::where('user_id','=',Auth::user()->id)->where('user_id2','=',$_POST['user_id_recieve'])->first();
        $chat2=Chat::where('user_id2','=',Auth::user()->id)->where('user_id','=',$_POST['user_id_recieve'])->first();
            if (!empty($chat1)) {
                $chat = $chat1;
            } else {
                $chat = $chat2;
            }
            $msgdata = Messagee::where('chat_id', $chat->id)->get();
            if (!empty($msgdata)) {
                $data = " ";
                foreach ($msgdata as $m) {
                    $user = User::where('id',$m->user_id)->first();
                    $img=Image::where('user_id',$m->user_id)->first();
                    if ($m->user_id == Auth::user()->id) {
                        $data.='<div class = "direct-chat-msg" >
                                    <div class = "direct-chat-info clearfix" >
                                    <span class = "direct-chat-name pull-left" >' . $user->name . '</span>
                                        <span class = "direct-chat-timestamp pull-right" >' . date("d M h:I A", strtotime($m->date)) . '</span>
                                    </div>
                                    <img class = "direct-chat-img" src = "images/' .  $img->image . '" >
                                    <div class = "direct-chat-text" >
                                    ' . $m->message . '
                                    </div>
                                </div>';
                    } else {
                        $data.='<div class = "direct-chat-msg right" >
                                    <div class = "direct-chat-info clearfix" >
                                    <span class = "direct-chat-name pull-right" >' . $user->name . '</span>
                                        <span class = "direct-chat-timestamp pull-left" >' . date("d M h:I A", strtotime($m->date)) . '</span>
                                    </div>
                                    <img class = "direct-chat-img" src = "images/' .  $img->image . '" >
                                    <div  style"background:#3c8dbc;border-color:#3c8dbc;" class = "direct-chat-text" >
                                    ' . $m->message . '
                                    </div>
                                </div>';
                    }
                }
                echo json_encode($data);
            }
        
    }
    public function send_message(Request $request)
    {
        $chat1=Chat::where('user_id','=',Auth::user()->id)->where('user_id2','=',$_POST['user_id_recieve'])->first();
        $chat2=Chat::where('user_id2','=',Auth::user()->id)->where('user_id','=',$_POST['user_id_recieve'])->first();
        if(Auth::user()->id != $_POST['user_id_recieve']){
        if(empty($chat1) && empty($chat2)){
            $chat=new Chat();
            $chat->user_id=Auth::user()->id;
            $chat->user_id2=$_POST['user_id_recieve'];
            $chat->save();
        }
        $mes=new Messagee();
        $mes->user_id=Auth::user()->id;
        if(!empty($chat1)){
            $mes->chat_id=$chat1->id;
        }else{
            $mes->chat_id=$chat2->id;
        }
        $mes->date= date("Y-m-d h:i:s");
        $mes->message=$_POST['message'];
        $mes->save();
        return $this->notify('msg',$_POST['user_id_recieve']);
        }
    }

    public function people_female()
    {
        $data=Profile::where('gendar','female')->where('user_id','!=',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('people')->with('data',$data)->with("type","people_female");
    }
     public function people_male()
    {
        $data=Profile::where('gendar','male')->where('user_id','!=',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('people')->with('data',$data)->with("type","people_male");
    }
    public function people()
    {
        $data=Profile::orderBy('id','desc')->where('user_id','!=',Auth::user()->id)->paginate(10);
        return view('people')->with('data',$data)->with("type","people");
    }
    public function profile()
    {
        $data=Profile::where('user_id',Auth::user()->id)->first();
        $dataimage=Image::where('user_id',Auth::user()->id)->get();
        return view('profile')->with('data',$data)->with('dataimage',$dataimage);
    }

    public function show_profile()
    {
         $id=$_POST['user_id'];
        $data=Profile::where('user_id',$id)->first();
        $dataimage=Image::where('user_id',$id)->get();
        return view('profile')->with('data',$data)->with('dataimage',$dataimage)->with('id',$id);
    }

   

    public function update_profile(Request $request)
    {
        
            $item=Profile::where('user_id',Auth::user()->id)->first();
            if(isset($item)){
                $user=Profile::find($item->id);
            }else{
                $user=new Profile();
                $user->user_id = Auth::user()->id;
            }
                $user->age = $request->input('age');
                $user->gendar = $request->input('gendar');
                $user->religion = $request->input('religion');
                $user->mobile = $request->input('mobile');
                $user->nationality   = $request->input('nationality');
                $user->bio = $request->input('bio');
                $user->location   = $request->input('location');
                $user->additional_information    = $request->input('additional_information');
                $user->save();
                


                $file=$request->file('image');
                $folder = "images";
                if(isset($file[0])){
                    $item2=Image::where('user_id',Auth::user()->id)->get();
                        if(count($item2) >0){
                                foreach ($item2 as $key => $valuee) {
                                Image::where('user_id',Auth::user()->id)->delete($valuee->id);
                                File::delete("images/".$valuee->image);
                                }
                       }
                                foreach ($file as $key => $value) {
                                $FileName = time() . rand(0, 1000) . $value->getClientOriginalName();
                                $image=new Image();
                                $image->user_id = Auth::user()->id;
                                $image->image = $FileName;
                                $image->selected  = false;
                                $check=$image->save();
                                    if($check == true){
                                         $value->move($folder, $FileName);
                                    }
                                }
                }
             
                session()->push('alert','success');
                session()->push('alert','Profile Updated Successfully');
                return redirect("/profile");

    }
        public function count_noti(){
            $notiii=Noti::where("state","=",0)->where("user_id","=",Auth::user()->id)->where("noti_user_id","!=",Auth::user()->id)->get();
            echo json_encode(count($notiii));

        }
        public function get_noti(){
            // $notiii=App\Noti::where("state","=",0)->where("user_id","=",Auth::user()->id)->where("noti_user_id","!=",Auth::user()->id)->get();
           $data = " ";
            $notii=Noti::where("user_id","=",Auth::user()->id)->where("noti_user_id","!=",Auth::user()->id)->orderBy('id','desc')->limit(10)->get();
                               if(!empty($notii)){ 
                               foreach ($notii as $key => $value) {
                                $dataimage=Image::where('user_id',$value->noti_user_id)->first();
                                $user=User::where('id',$value->noti_user_id)->first();
                                if($value->type == "like"){
                                    $noti=$user->name." Add You to his LikeList.";
                                    $url="notiyy(".$value->id."),like_noti()";
                                }elseif ($value->type == "msg") {
                                    $noti=$user->name." Send Message To You.";
                                    $url="notiyy(".$value->id."),message(".$value->noti_user_id.")";
                                }else{
                                    $noti="There Is No Notification Now.";
                                    $url="";
                                }
                                if($value->state == 0){
                                   $n="background-color:orange";
                                }else{
                                   $n="background-color:white";
                                }
                               $data.='<li class="header-cart-item" style="'.$n.'">
                                    <div class="header-cart-item-img">
                                        <img src="images/'.$dataimage->image.'" style="height:70px" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt ">
                                        <a href="#" onclick="'.$url.'" class="header-cart-item-name">
                                           '.$noti.'
                                        </a>

                                        <span class="header-cart-item-info">
                                        '.date("d M h:I A", strtotime($value->date)).'
                                        </span>
                                    </div>
                                </li>';
                }
            } 
                          echo json_encode($data);
        }

}
