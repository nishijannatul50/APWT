<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="loginForm/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="loginForm/css/style.css">

</head>
@extends('layouts.app')
@section('content')
<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <div class=" mb-3">
                        <div class="w-100">
                            @if(session('database-error'))
                            <div class="text-danger d-flex justify-content-center align-items-center"
                                style="height: 35px; width:100%; background: black; border-radius: 10px">
                                {{ session('database-error') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{route('login')}}" method="POST" class="register-form" id="register-form">
                        {{csrf_field()}}

                        <div class="form-group">
                            <div>
                                @error('name')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" value="{{old('name')}}" id="name" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <div>
                                @error('email')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="text" name="email" id="email" placeholder="Your Email" />

                        </div>
                        <div class="form-group">
                            <div>
                                @error('phone')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                            <label for="phone"><i class="zmdi zmdi-rotate-right zmdi-hc-spin"></i></label>
                            <input type="text" name="phone" id="phone" placeholder="Your Phone" />

                        </div>
                        <input type="text" value="user" hidden name="role">

                        <div class="form-group">
                            <div>
                                @error('address')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                           
                            <label for="address"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></label>
                            <input type="text" name="address" id="address" placeholder="Your Address" />

                        </div>

                        <div class="form-group">
                            <div>
                                @error('password')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Your Password" />

                        </div>
                        <div class="form-group">
                            <div>
                                @error('confirm-password')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                            <label for="confirm-password"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="confirm-password" id="confirm-password"
                                placeholder="Repeat password" />

                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="loginForm/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="{{ route ('login') }}" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

</html>






<!-- Sing in  Form -->
{{-- <section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="loginForm/images/signin-image.jpg" alt="sing up image"></figure>
                <a href="{{ route ('registration') }}" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sign up</h2>
                <form method="post" class="register-form" id="login-form" action="{{route('success')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="email" value="{{old('email')}}" name="email" id="email" placeholder="Your email" />
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Your Password" />
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                            me</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                    </div>
                </form>
                <div class="social-login">
                    <span class="social-label">Or login with</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> --}}