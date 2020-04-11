 @extends("master")
@section("content")
  <!-- New Product -->
    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Search Result
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                
                <?php 
                if(isset($data)){
                 $like=App\Like::where('user_id',Auth::user()->id)->where('like_user_id',$data->user_id)->first();
                 $dataimage=App\Image::where('user_id',$data->user_id)->first();
                 $user=App\User::where('id',$data->user_id)->first();
                 ?>
                    <div class="item-slick2 p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="images/<?php if(isset($dataimage)){echo $dataimage->image;}else{ echo "empty_profile.jpg"; } ?>" style=" height: 370px" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <button value="<?=$data->user_id?>" href="#"   class="send-btn block2-btn-addwishlist hov-pointer trans-0-4">
                                        <?php  if(isset($like) ){ ?>
                                            <!-- <i class="icon-wishlist icon_heart_alt dis-none" aria-hidden="true"></i> -->
                                            <i class="icon-wishlist icon_heart" id="remove_like" style="display: block;color: #e65540;"  aria-hidden="true"></i>
                                        <?php  }else{ ?>
                                            <!-- <i class="icon-wishlist icon_heart_alt " aria-hidden="true"></i> -->
                                            <i class="icon-wishlist icon_heart"   aria-hidden="true"></i>
                                        <?php  } ?>
                                    </button>

                                    <div  class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <form action="/show_profile" method="post">
                                            {!! csrf_field() !!}
                                        <input type="hidden" name="user_id" value="<?=$data->user_id?>" id="pro_user_id">
                                        <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            View Profile 
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20" style="margin-left: 10px">
                                <a style="font-weight: bold" href="#" class="block2-name dis-block s-text3 p-b-5">
                                    <?=$dataa->name;?>, <?=$data->age?>
                                </a>

                                <h6 style="margin: 10px;margin-left: 0">
                                    <?=$data->location?>, <?=$data->gendar?>
                                </h6>
                                <h6>
                                    <?=$data->nationality?> / <?=$data->religion?>
                                </h6>
                            </div>
                        </div>
                    </div>


                <?php  }?>    
                </div>
            </div>

        </div>
    </section>
<!-- sale-noti -->
<script>
    window.onload = function () {
         $("#home").attr('class', 'sale-noti');
    }
</script>
@stop