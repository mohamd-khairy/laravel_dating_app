<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fashe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta  name="_token" id="token" content="{!!csrf_token()!!}" />
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.png')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/themify/themify-icons.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/elegant-font/html-css/style.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/lightbox2/css/lightbox.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<!--===============================================================================================-->
        <link rel="stylesheet" href="css/AdminLTE.min.css">

</head>
<body class="animsition">

    <!-- Header -->
    <header class="header1">
        <!-- Header desktop -->
        <div class="container-menu-header">
            <div class="wrap_header">
                <!-- Logo -->
                <a href="/" class="logo">
                    <img src="images/icons/logo.png" alt="IMG-LOGO">
                </a>


                <!-- Menu -->
                <div class="wrap_menu">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li  id="home">
                                <a  href="/">Recently active</a>
                            </li>

                            <li id="peoplee">
                                <a href="/people?page=1">Peaple</a>
                            </li>

                            <li id="message">
                                <a href="/message">Messages</a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <!-- Header Icon -->
                <div class="header-icons">

                    <a href="/like" class="header-wrapicon1 dis-block" style="margin-right: 20px">
                        <img src="images/icons/love.png" class="header-icon1" alt="ICON">
                    </a>
<!-- icons/icon-header-01.png -->
                    <div class="header-wrapicon2" >
                        <?php $dataimage=App\Image::where('user_id',Auth::user()->id)->first();?>
                    <img src="images/<?=$dataimage->image?>" id="pro" title="<?=Auth::user()->name?>" style="width:40px;height:30px;border-radius:50%" class="header-icon1 js-show-header-dropdown" alt="ICON">

                        <!-- Header cart -->
                        <div class="header-cart header-dropdown">
                            
                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <a href="/profile" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Profile
                                    </a>
                                </div>
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="/logout" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        Log Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <span class="linedivide1"></span>

                    <div class="header-wrapicon2">
                        <img src="images/icons/icon-header-02.png" id="pro" class="header-icon1 js-show-header-dropdown" alt="ICON">
                         <span class="header-icons-noti">0</span>

                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">
                              
                            </ul>

                        </div>
                    </div>
                </div>


            </div>


            <div class="topbar" id="likebar" style="display: none;">
                <div class="topbar-social">
                    <a href="/like" class="topbar-social-item" id='likee' > Your likes</a>
                    <a href="/like2" class="topbar-social-item " id='likee2'> Who like's You</a>
                   
                </div>
            </div>

           
        </div>
        

        <!-- Header Mobile -->
        <div class="wrap_header_mobile">
            <!-- Logo moblie -->
            <a href="/" class="logo-mobile">
                <img src="images/icons/logo.png" alt="IMG-LOGO">
            </a>

            <!-- Button show menu -->
            <div class="btn-show-menu">
                <!-- Header Icon mobile -->
                <div class="header-icons-mobile">
                    
                    <div class="header-wrapicon2" style="margin-right: 10px">
                        <img src="images/icons/love.png" class="header-icon1 js-show-header-dropdown" alt="ICON">

                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            
                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="/like" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        Your likes
                                    </a>
                                </div>

                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="/like2" style="color:white" class="flex-c-m size2 bg1 bo-rad-20 hov1 s-text3 trans-0-4">
                                        Who like's You
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="header-wrapicon2" >
                        <?php $dataimage=App\Image::where('user_id',Auth::user()->id)->first();?>
                    <img src="images/<?=$dataimage->image?>" id="pro" title="<?=Auth::user()->name?>" style="width:40px;height:30px;border-radius:50%" class="header-icon1 js-show-header-dropdown" alt="ICON">

                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            
                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="/profile" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Profile
                                    </a>
                                </div>

                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="/logout" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        Log Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <span class="linedivide2"></span>

                      <div class="header-wrapicon2">
                        <img src="images/icons/icon-header-02.png" id="pro" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti">0</span>

                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">
                                
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>
 
        </div>


        <!-- Menu Mobile -->
        <div class="wrap-side-menu" >
            <nav class="side-menu">
                        <ul class="main_menu">
                            <li  id="home">
                                <a  href="/">Recently active</a>
                            </li>

                            <li id="peoplee">
                                <a href="/people?page=1">Peaple</a>
                            </li>

                            <li id="message">
                                <a href="/message">Messages</a>
                            </li>

                        </ul>
            </nav>
        </div>


    </header>



@yield("content")

      <div class="modal fade" id="message_modal"  role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 style="margin-top: -2px">   
                                Direct Message         
                                </h4> 
                                <button type="button"  class="close pull-right" data-dismiss="modal">&times;</button>
                            </div>
                            <div class=" modal-body" >
                                <div class="row">
                                    <div class="col-md-12" id="log">
                                        <!-- DIRECT CHAT -->
                                        <div class="box box-primary direct-chat direct-chat-warning">
                                                <div class="box-body ">
                                                    <!-- Conversations are loaded here -->
                                                    <div class="direct-chat-messages" id="msgs">
                                                                
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            <!-- /.box-footer-->
                                        </div>
                                        <!--/.direct-chat -->   
                                    </div>
                                </div>
                            </div>
                             <div class="box-footer">
                                        <div class="input-group">
                                            <input type="text"  id="messagee" onkeypress="return msgKeyPress(event);" placeholder="Type Message ..." class="form-control">
                                            <span class="input-group-btn">
                                                <button id="user_id_recieve"  type="button" onclick="sendmsg();" class="btn btn-warning btn-flat">Send</button>
                                            </span>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
    




    <!-- Footer -->
    <div style="margin-top:150px"></div>
    <footer class="bg6 p-t-5 p-b-4 p-l-5 p-r-5">
        
        
            <div class="t-center s-text8 p-t-20">
                Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://know-me.000webhostapp.com" target="_blank">Mohamed Khairy</a>
            </div>
    </footer>



    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

<!-- Container Selection -->
    <div id="dropDownSelect1"></div>
    <div id="dropDownSelect2"></div>


<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
   
    <script type="text/javascript">
    

        $(document).ready(function(){
           $('.send-btn').click(function(){  
            $.ajax({
              url: '/add_to_likelist',
              type: "post",
              data: {'id':$(this).val(), '_token': $('input[name=_token]').val()},
              success: function(data){    
                       $("#remove_like").attr('style', 'display: none;');      
                      swal(data, "success");
                     }
                });      
            }); 
        });
        window.setInterval('get_noti()', 5000);
        function count_noti(){
                        $.ajax({
                                  url: '/count_noti',
                                  type: "post",
                                  data: {'_token': $('input[name=_token]').val()},
                                  dataType: "json",
                                  success: function(res){
                                  $(".header-icons-noti").html(res);
                                  }
                        });
        }
        function get_noti(){
                        $.ajax({
                              url: '/get_noti',
                              type: "post",
                              data: {'_token': $('input[name=_token]').val()},
                              dataType: "json",
                              success: function(res){
                                count_noti();
                                $('.header-cart-wrapitem').html(res);
                              }
                        });
        }                        
        function notiyy(id){
            $.ajax({
              url: '/update_noti',
              type: "post",
              data: {'noti_id':id, '_token': $('input[name=_token]').val()},
             success: function(res){
                   //alert(res+id);
                   }                    
             });                            
        }
        function like_noti(){
            location.href = "/like2";

        }
        function message(id){
                  $("#user_id_recieve").val(id);
                  get_msg(id);
                  $("#message_modal").modal('show');
        }
        function get_msg(id){
            $.ajax({
                              url: '/get_message',
                              type: "post",
                              data: {'user_id_recieve':id, '_token': $('input[name=_token]').val()},
                               dataType: "json",
                              success: function(res){
                                $("#msgs").animate({scrollTop: $(document).height() * 2000}, "slow");
                                $('#msgs').html(res);

                              }
                         });
        }
        function msgKeyPress(e) {
                // look for window.event in case event isn't passed in
                e = e || window.event;
                if (e.keyCode == 13)
                {
                    var text = $("#messagee").val();
                    if (text == "") {
                        alert("Write Something !...");
                    } else {
                         $.ajax({
                              url: '/send_message',
                              type: "post",
                              data: {'user_id_recieve':$("#user_id_recieve").val(),'message':$("#messagee").val(), '_token': $('input[name=_token]').val()},
                              success: function(data){
                                $("#msgs").animate({scrollTop: $(document).height() * 2000}, "slow");
                                      get_msg($("#user_id_recieve").val());
                                     $("#messagee").val("");
                              }
                        }); 
                        return false;
                    }
                    return false;
                }
                return true;
        }
        function sendmsg(){
                                     // alert($("#user_id_recieve").val());
                                     // alert($("#messagee").val());
                $.ajax({
                  url: '/send_message',
                  type: "post",
                  data: {'user_id_recieve':$("#user_id_recieve").val(),'message':$("#messagee").val(), '_token': $('input[name=_token]').val()},
                  success: function(data){
                    $("#msgs").animate({scrollTop: $(document).height() * 2000}, "slow");
                          get_msg($("#user_id_recieve").val());
                         $("#messagee").val("");
                  }
                });      
        } 
       

        $('#profile').each(function(){
            $(this).on('click', function(){
                //swal(nameProduct, "is added to cart !", "success");
                location.href = "/profile";
            });
        });
        

        // $('.block2-btn-addwishlist').each(function(){
        //     var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        //     $(this).on('click', function(){
        //                   swal(nameProduct, "is added to Likelist !", "success");
        //     });
        // });
    </script>

<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
    <script type="text/javascript">
        /*[ No ui ]
        ===========================================================*/
        var filterBar = document.getElementById('filter-bar');

        noUiSlider.create(filterBar, {
            start: [ 50, 200 ],
            connect: true,
            range: {
                'min': 50,
                'max': 200
            }
        });

        var skipValues = [
        document.getElementById('value-lower'),
        document.getElementById('value-upper')
        ];

        filterBar.noUiSlider.on('update', function( values, handle ) {
            skipValues[handle].innerHTML = Math.round(values[handle]) ;
        });
    </script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });

        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect2')
        });
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>
