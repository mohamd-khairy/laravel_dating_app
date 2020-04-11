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
                                if(isset($data1[0])){

                                foreach ($data1 as $key => $valuee) {

                                 $dataimage=App\Image::where('user_id',$valuee->user_id2)->first();
                                 $user=App\User::where('id',$valuee->user_id2)->first();
                                 $value=App\Profile::where('user_id',$valuee->user_id2)->first();
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

                            <?php }}
                             if(isset($data2[0])){

                                foreach ($data2 as $key => $valuee) {

                                 $dataimage=App\Image::where('user_id',$valuee->user_id)->first();
                                 $user=App\User::where('id',$valuee->user_id)->first();
                                 $value=App\Profile::where('user_id',$valuee->user_id)->first();
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
                               


                                <div class="block2-txt p-t-20">
                                <a style="font-weight: bold"  class="block2-name dis-block s-text3 p-b-5">
                                    <?=$user->name;?>, <?=$value->age?>
                                </a>

                                <h6 style="margin-bottom: 10px;margin-top: 10px">
                                    <?=$value->location?>,<?=$value->gendar?>
                                </h6>
                                <h6>
                                    <?=$value->nationality?> / <?=$value->religion?>
                                </h6>
                                </div>
                            </li>
                            <?php }} ?>
                        </ul>

                </div>

<script>
    window.onload = function () {
      $("#message").attr('class', 'sale-noti');
    }
    
        
    </script>
@endsection
