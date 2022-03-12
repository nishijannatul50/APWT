<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="loginForm/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="loginForm/css/style.css">

</head>
@extends('layouts.app')
@section('content')

<div class="main">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="loginForm/images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="{{ route ('registration') }}" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign in</h2>
                    <form method="POST" action="{{route('dashboard')}}">
                        {{csrf_field()}}
                        <div class="mb-3">
                            <div class="w-100">
                                @if(session('database-error'))
                                <div class="d-flex justify-content-center align-items-center"
                                style="height: 30px; font-size:13px; color:red; padding:10px; width:100%; background: black; border-radius: 20px">
                                    {{ session('database-error') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                @error('role')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                            <select name="role" type="text" class="ml-4 form-control">
                                <option value="">Login as</option>
                                <option value="admin">Admin</option>
                                <option value="user">Customar</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div>
                                @error('email')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                            <label for="email"><i class="zmdi zmdi-account material-icons-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                       


                        <div class="form-group">
                            <div>
                                @error('password')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Your Password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="https://www.facebook.com/jannatulferdous.ferdous.7921"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

</html>