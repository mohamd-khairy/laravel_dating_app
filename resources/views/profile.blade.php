 @extends("master")
@section("content")
   

    <!-- Product Detail -->
    <div class="container bgwhite p-t-35 p-b-80">
        <div class="flex-w flex-sb">

            <div class="w-size13 p-t-30 respon5">
                <div class="wrap-slick3 flex-sb flex-w">

                    <div class="wrap-slick3-dots"></div>

                    <div class="slick3">
                    <?php
                    if(!empty($dataimage[0])){   
                        foreach ($dataimage as $key => $value) { 
                           $user=App\User::where('id',$value->user_id)->first();

                            ?>
                           
                        <div  class="item-slick3" data-thumb="images/<?= $value->image ?>">
                            <div class="wrap-pic-w">
                                <img src="images/<?= $value->image ?>" style="max-height: 670px;min-height: 470px" alt="IMG-PRODUCT">
                            </div>
                        </div>
                      
                    <?php   } }else{ ?>
                              
                        <div  class="item-slick3" data-thumb="images/empty_profile.jpg">
                            <div class="wrap-pic-w">
                                <img src="images/empty_profile.jpg" style="max-height: 670px;min-height: 470px" alt="IMG-PRODUCT">
                            </div>
                        </div>

                    <?php } ?>

                    </div>
                    
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5">
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">

                <h4 class="flex-sb-m product-detail-name m-text16 p-b-10 ">
                            <?php if(isset($user)){ echo $user->name; }else{ echo Auth::user()->name;}
                             if(!isset($id)){
                             ?>
                        <a href="#" onclick="update()" class="flex-c-m  bg1 bo-rad-23 hov1 s-text6 trans-0-4" style="color:white;">Update</a>                    

                            <?php }  ?>
                </h4>
                
                <div >
                    <span class="s-text8 m-r-35">Age: <?php if(isset($data)){ echo $data->age;} ?></span>
                </div>

                <div >
                    <span class="s-text8 m-r-35">Gender: <?php if(isset($data)){ echo $data->gendar;} ?></span>
                    <span class="s-text8">Mobile:  <?php if(isset($data)){ echo $data->mobile;} ?></span>
                </div> 

                <div class="p-b-45">
                    <span class="s-text8 m-r-35">Location:  <?php if(isset($data)){ echo $data->location;} ?></span>
                    <span class="s-text8">Religion:  <?php if(isset($data)){ echo $data->religion;} ?></span>
                </div>
                </div>
                

                <!--  -->
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Bio
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                                  <?php if(isset($data)){ echo $data->bio;} ?>
                         </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Additional information
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                                   <?php if(isset($data)){ echo $data->additional_information;} ?>
                         </p>
                    </div>
                </div>

            </div>
        </div>
    </div>


<div class="modal fade" id="update"  role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form  class="form-horizontal"  method="POST" action="/update_profile"  enctype="multipart/form-data">
                              {!! csrf_field() !!}

                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 style="margin-top: -2px">   
                                Update Profile Data         
                                </h4> 
                                <button type="button"  class="close pull-right" data-dismiss="modal">&times;</button>
                            </div>
                            <div class=" modal-body" >
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="size16 bo4  form-group{{ $errors->has('image') ? ' has-error' : '' }}">

                                                <input id="image" multiple type="file" class="sizefull s-text7 p-t-8 p-l-15 p-r-15"  name="image[]" >

                                                @if ($errors->has('image'))
                                                    <span class="help-block">
                                                        <small>{{ $errors->first('image') }}</small>
                                                    </span>
                                                @endif
                                        </div>

                                        <div class="size16 bo4  form-group{{ $errors->has('age') ? ' has-error' : '' }}">

                                                <input id="age" value="<?php if(isset($data)){ echo $data->age;} ?>" type="number" class="sizefull s-text7 p-l-15 p-r-15"  name="age" placeholder="Age">

                                                @if ($errors->has('age'))
                                                    <span class="help-block">
                                                        <small>{{ $errors->first('age') }}</small>
                                                    </span>
                                                @endif
                                        </div>

                                        
                                        <div class="size16 bo4  form-group{{ $errors->has('gendar') ? ' has-error' : '' }}">
                                            <div class=" p-l-15 p-t-13"> 
                                                Male<input   type="radio" value="male" <?php if(isset($data)){echo ($data->gendar=='male')?'checked':''; }else{ echo 'checked'; } ?> class=" s-text7 p-l-15 p-r-15"  name="gendar" >
                                                Female<input   type="radio" value="female" <?php if(isset($data)){echo ($data->gendar=='female')?'checked':''; } ?> class=" s-text7 p-l-15 p-r-15"  name="gendar" >
                                           
                                            </div>
                                            
                                                @if ($errors->has('gendar'))
                                                    <span class="help-block">
                                                        <small>{{ $errors->first('gendar') }}</small>
                                                    </span>
                                                @endif
                                        </div>


                                        <div class="size16 bo4  form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">

                                                <input id="mobile" value="<?php if(isset($data)){ echo $data->mobile;} ?>" type="number" class="sizefull s-text7 p-l-15 p-r-15"  name="mobile" placeholder="Mobile">

                                                @if ($errors->has('mobile'))
                                                    <span class="help-block">
                                                        <small>{{ $errors->first('mobile') }}</small>
                                                    </span>
                                                @endif
                                        </div>


                                        <div class="size16 bo4  form-group{{ $errors->has('location') ? ' has-error' : '' }}">

                                                <input id="location" value="<?php if(isset($data)){ echo $data->location;} ?>" type="text" class="sizefull s-text7 p-l-15 p-r-15"  name="location" placeholder="Location">

                                                @if ($errors->has('location'))
                                                    <span class="help-block">
                                                        <small>{{ $errors->first('location') }}</small>
                                                    </span>
                                                @endif
                                        </div>


                                        <div class="size16 bo4  form-group{{ $errors->has('religion') ? ' has-error' : '' }}">

                                                <input id="religion" value="<?php if(isset($data)){ echo $data->religion;} ?>" type="text" class="sizefull s-text7 p-l-15 p-r-15"  name="religion" placeholder="Religion">

                                                @if ($errors->has('religion'))
                                                    <span class="help-block">
                                                        <small>{{ $errors->first('religion') }}</small>
                                                    </span>
                                                @endif
                                        </div>


                                        <div class="size16 bo4  form-group{{ $errors->has('bio') ? ' has-error' : '' }}">

                                                <input id="bio" value="<?php if(isset($data)){ echo $data->bio;} ?>" type="text" class="sizefull s-text7 p-l-15 p-r-15"  name="bio" placeholder="Bio">

                                                @if ($errors->has('bio'))
                                                    <span class="help-block">
                                                        <small>{{ $errors->first('bio') }}</small>
                                                    </span>
                                                @endif
                                        </div>


                                        <div class="size16 bo4  form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">

                                                <input id="nationality" value="<?php if(isset($data)){ echo $data->nationality;} ?>" type="text" class="sizefull s-text7 p-l-15 p-r-15"  name="nationality" placeholder="Nationality">

                                                @if ($errors->has('nationality'))
                                                    <span class="help-block">
                                                        <small>{{ $errors->first('nationality') }}</small>
                                                    </span>
                                                @endif
                                        </div>


                                        <div class="size16 bo4  form-group{{ $errors->has('additional_information') ? ' has-error' : '' }}">

                                                <input id="additional_information" value="<?php if(isset($data)){ echo $data->additional_information;} ?>"type="text" class="sizefull s-text7 p-l-15 p-r-15"  name="additional_information" placeholder="Additional_information">

                                                @if ($errors->has('additional_information'))
                                                    <span class="help-block">
                                                        <small>{{ $errors->first('additional_information') }}</small>
                                                    </span>
                                                @endif
                                        </div>

                                        <div class="size14 trans-0-4 m-b-20 ">
                                            <!-- Button -->
                                            <button  type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Update 
                                            </button>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
<script>
  
    function update(){
      $("#update").modal('show');
  }
        
    </script>
@stop

