@extends('admin.layouts.master')
@section('title', 'Login')
<link rel="stylesheet" href="{{asset('css/login/style.css')}}">
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
                            <input type="password" name="password" class="form-control js-password" data-toggle="password" placeholder="password" value="{{ old('password') }}"/>
                            <span class="p-password__display js-togglePassword"></span>
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

@push('scripts')
    <script>
        if ($('.js-password').length) {
            $('.js-togglePassword').click(function () {

                $(this).toggleClass('-visible');

                let input = $(this).prev('.js-password');
                if (input.attr('type') == 'password') {
                    input.attr('type', 'text');
                } else {
                    input.attr('type', 'password');
                }
            });
        }
    </script>
@endpush
