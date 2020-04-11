 @extends("master")
@section("content")
	

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Search
						</h4>
					

						<div class="search-product pos-relative bo4 of-hidden" >
							<form method="post" action="/search_result" id="search_form">
								  {!! csrf_field() !!}
							<input class="s-text7 size6 p-l-23 p-r-50" list='uni' type="text" id="search_user" name="search_user"  placeholder="Search People...">
				                <datalist id="uni">
				                	<?php   $user=App\User::get();
				                	foreach ($user as $key => $value) { ?>
				                    <option><?= $value->name?></option>
				                	<?php } ?>
				                </datalist>
							<button type="button" onclick="check_search($('#search_user').val())" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</form>
						</div> 

						<!--  -->
						<h4 class="m-text14 p-b-7 p-t-37">
							Categories
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="/people?page=1" class="s-text13 " id="people">
									All
								</a>
							</li>

							<li class="p-t-4">
								<a href="/people_male?page=1" class="s-text13" id="people_male">
									Men
								</a>
							</li>

							<li class="p-t-4">
								<a href="/people_female?page=1" class="s-text13" id="people_female">
									Women
								</a>
							</li>

						</ul>

						
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

					<!-- Product -->
					<div class="row">


						 <?php 
                if(isset($data[0])){

                foreach ($data as $key => $value) {
                	$like=App\Like::where('user_id',Auth::user()->id)->where('like_user_id',$value->user_id)->first();
                	// $like2=App\Like::where('like_user_id',Auth::user()->id)->where('user_id',$value->user_id)->first();

                 $dataimage=App\Image::where('user_id',$value->user_id)->first();
                 $user=App\User::where('id',$value->user_id)->first();
                 ?>
                    
                    
                   <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">

									<img src="images/<?php if(isset($dataimage)){echo $dataimage->image;}else{ echo "empty_profile.jpg";} ?>" style=" height: 300px" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										 <button value="<?=$value->user_id?>" href="#"  class="send-btn block2-btn-addwishlist hov-pointer trans-0-4">
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
                                        <input type="hidden" name="user_id" value="<?=$value->user_id?>" id="pro_user_id">
                                        <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            View Profile
                                        </button>
                                        </form>
                                    </div>
									</div>
								</div>

								 <div class="block2-txt p-t-20" style="margin-left: 10px">
                                <a style="font-weight: bold" href="#" class="block2-name dis-block s-text3 p-b-5">
                                    <?=$user->name;?>, <?=$value->age?>
                                </a>

                                <h6 style="margin: 10px;margin-left: 0">
                                    <?=$value->location?>, <?=$value->gendar?>
                                </h6>
                                <h6>
                                    <?=$value->nationality?> / <?=$value->religion?>
                                </h6>
                            </div>
							</div>
						</div>


                <?php } }  ?> 

					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<?php if(!empty($data->links())){ 
                              if(!isset($_GET['page'])){
                              	$page=1;
                              }else{
                              	$page=$_GET['page'];
                              }
							?>
						<a href="#" onclick="last(<?=$page-1?>)" class="item-pagination flex-c-m trans-0-4 active-pagination"><<</a>
						<a href="#" onclick="next(<?=$page+1?>)" class="item-pagination flex-c-m trans-0-4 active-pagination">>></a>
                         <?php } ?>
                   </div>										
				</div>
			</div>
		</div>
	</section>
<script>
    window.onload = function () {
         $("#peoplee").attr('class', 'sale-noti');
         // $("#<?=$type?>").attr('class', 'active1');
         $("#<?=$type?>").attr('style', 'color:orange');
    }
    function check_search(s){
         if(s == ''){
         	alert("Write Name ,Please !..");
         }else{
            $("#search_form").submit();
         }
    }
    function next(p){
    	location.href = "/<?=$type?>?page="+p;
    }
    function last(p){
    	if(p == 0){
        location.href = "/<?=$type?>?page=1";
    	}else{
    	location.href = "/<?=$type?>?page="+p;
        }
    }
</script>
@stop