@extends('admin.layouts.master')
@section('title', 'Login')
<link rel="stylesheet" href="{{asset('css/login/style.css')}}">
<script type="text/javascript">//<![CDATA[

    window.onload=function(){

        /**
         * @author Abdo-Hamoud <abdo.host@gmail.com>
         * https://github.com/Abdo-Hamoud/bootstrap-show-password
         * version: 1.0
         */
        !function(a){a(function(){a('[data-toggle="password"]').each(function(){var b = a(this); var c = a(this).parent().find(".input-group-text"); c.css("cursor", "pointer").addClass("input-password-hide"); c.on("click", function(){if (c.hasClass("input-password-hide")){c.removeClass("input-password-hide").addClass("input-password-show"); c.find(".fa").removeClass("fa-eye").addClass("fa-eye-slash"); b.attr("type", "text")} else{c.removeClass("input-password-show").addClass("input-password-hide"); c.find(".fa").removeClass("fa-eye-slash").addClass("fa-eye"); b.attr("type", "password")}})})})}(window.jQuery);
    }

    //]]></script>
@section('content')
    <!-- Sing in  Form -->
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-google-plus-square"></i></a>
                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                    </div>
                    @if(isset($errors))
                        <div class="alert-danger">
                            @foreach($errors->all() as $error)
                                {!! $error !!}<br/>
                            @endforeach
                        </div>
                    @endif
                    @if(isset($message))
                        <div class="alert-danger">
                            {!! $message !!}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" class="register-form" id="login-form">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control" placeholder="username" value="{{ old('username')  }}"/>

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" data-toggle="password" placeholder="password" value="{{ old('password') }}"/>
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-eye"></i></div>
                            </div>
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox" name="remember" id="remember_me" value="{{ old('remember') === 'on' ? 'checked' : '' }}"/>Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" name="signin" value="Login" class="btn float-right login_btn"/>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="#">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('admin.forgot_password')}}">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
