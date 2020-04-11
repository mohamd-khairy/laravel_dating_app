@extends('layouts.app')

@section('content')

<section class="cart bgwhite p-t-10 p-b-30" style="background-image : url(images/love.jpg);background-size: cover; background-repeat: no-repeat;">
        <div class="container ">

            <div  class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                <h5 class="m-text20 p-b-24" style="color: black">
                    Login Form
                </h5>
                <form  class="form-horizontal" role="form" method="POST" action="/login">
                    {!! csrf_field() !!}
                <!-- login -->
                <div  class="flex-w flex-sb bo10 p-t-15 p-b-20" >
                   
                    <span class="s-text18 w-size19 w-full-sm" style="color: black">
                        Shipping:
                    </span>

                    <div class="w-size20 w-full-sm">
                        <p class="s-text8 p-b-23" style="color: black">
                             Please double check your address, or contact us if you need any help.
                        </p>


                        <span class="s-text19" style="color: black">
                            Login By Email
                        </span>


                        <div class="size13 bo4 m-b-22 form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="sizefull s-text7 p-l-15 p-r-15" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('email') }}</small>
                                    </span>
                                @endif
                        </div>

                        <div class=" size13 bo4 m-b-22 form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <input id="password" type="password" class="sizefull s-text7 p-l-15 p-r-15" name="password" placeholder="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('password') }}</small>
                                    </span>
                                @endif
                        </div>
                       

                        <div class="form-group">
                             <input type="checkbox"  name="remember"> Remember Me
                        </div>

                        <div class="size14 trans-0-4 m-b-20">
                            <!-- Button -->
                            <button  type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                login 
                            </button>
                            
                            <a class="btn btn-link "  href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                </div>

               
                </form>
                <!--  -->
                <div class="flex-w flex-sb-m p-t-26 p-b-10">
                    
                </div>

                <div class="size15 trans-0-4">
                    <!-- Button -->
                    <a href="/register" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" >
                        Creat New Account
                    </a>
                </div>
            </div>
            

        </div>

    <!-- Footer -->
            <div style="font-weight: bold;color: black" class="t-center s-text8 p-t-10">
                Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://know-me.000webhostapp.com" target="_blank" >Mohamed Khairy</a>
            </div>

    </section>
@endsection
