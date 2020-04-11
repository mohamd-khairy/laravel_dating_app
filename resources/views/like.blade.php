@extends('master')
@section('content')

<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
}
</style>


                        <ul  class="col-lg-12">

                             <?php 
                                if(isset($data[0])){

                                foreach ($data as $key => $value) {

                                 $like=App\Like::where('user_id',Auth::user()->id)->where('like_user_id',$value->user_id)->first();
                                    if(!isset($like)){
                                        continue;
                                    }
                                 $dataimage=App\Image::where('user_id',$value->user_id)->first();
                                 $user=App\User::where('id',$value->user_id)->first();
                             ?>
                                        <li class=" col-lg-2 col-md-6 col-sm-12 col-xs-12 p-b-20 p-t-20" >
                                    <img src="images/<?php if(isset($dataimage)){echo $dataimage->image;}else{ echo "empty_profile.jpg"; } ?>" style="width: 100%;height: 100%;height: 200px" alt="IMG-PRODUCT">
                              
                                <div class="block2-overlay trans-0-4">
                                        <div  class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <a style="color:white" href="#" onclick="message(<?=$value->user_id?>)" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 ">
                                               Send Message
                                            </a>
                                            <form action="/show_profile" method="post">
                                            {!! csrf_field() !!}
                                                <input type="hidden" name="user_id" value="<?=$value->user_id?>" id="pro_user_id">
                                                <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    View Profile 
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                               


                                <div class="block2-txt p-t-20" style="margin-left: 8px">
                                <a style="font-weight: bold"  class="block2-name dis-block s-text3 p-b-5">
                                    <?=$user->name;?>, <?=$value->age?>
                                </a>

                                <h6 style="margin: 10px;margin-left: 0">
                                    <?=$value->location?>,<?=$value->gendar?>
                                </h6>
                                <h6>
                                    <?=$value->nationality?> / <?=$value->religion?>
                                </h6>
                                </div>
                            </li>

                            <?php }}else{ ?> 


                            <li class=" col-lg-2 col-md-6 col-sm-12 col-xs-12 p-b-20 p-t-20" >
                                    <img src="images/empty_profile.jpg" style="width: 100%;height: 100%;height: 200px" alt="IMG-PRODUCT">
                              
                                <div class="block2-overlay trans-0-4">
                                        <div  class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button value="" style="color:white" href="#"  class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 ">
                                               Send Message
                                            </button>
                                                <button type="button" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    View Profile 
                                                </button>
                                        </div>
                                    </div>
                                
                            <div class="block2-txt p-t-20" style="margin-left: 10px">
                                <a style="font-weight: bold" href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                    Name, Age
                                </a>

                                <h6 style="margin: 10px;margin-left: 0">
                                    City, gender
                                </h6>
                                <h6>
                                    Nationality / Religion
                                </h6>
                            </div>
                            </li>
                            <?php } ?>
                            
                        </ul>

                </div>

        

<script>
    window.onload = function () {

         $("#likee").attr('style', 'color:orange');
    
        $("body #likebar").show();
         // $('#likebar').delay(1000).fadeOut();
        
        $('body #pro').click(function(){
            $('#likebar').hide();
        });


    }  
    </script>
@endsection
