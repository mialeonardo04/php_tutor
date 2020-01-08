@extends('layout.masterlogin')
@section('title','PHP Intelligent Tutor')
@section('content')
    @if(Session::has('messageResetSuccess'))
        <div class="alert {{ Session::get('alert alert-success', 'alert-success') }}">{{ Session::get('messageResetSuccess') }}</div>
    @endif
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="input-group custom input-group-lg">
        <input type="text" class="form-control" placeholder="Username" name="username" value="@if(isset($_COOKIE['remember_login'])){{base64_decode($_COOKIE['remember_login'])}}@endif" autofocus>
        @if ($errors->has('username'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="input-group custom input-group-lg">
        <input type="password" class="form-control" placeholder="**********" name="password" id="inputPassword" value="@if(isset($_COOKIE['remember_pass'])){{base64_decode($_COOKIE['remember_pass'])}}@endif">
        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="row col-sm-12">
        <label>
            <input type="checkbox" data-size="small" class="switch-btn" data-color="#0099ff" name="remember" @if(isset($_COOKIE['remember_login'])) checked @endif title="when checked, we will save your account information"> Remember Me
        </label>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="input-group">
                <input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="forgot-password padding-top-10">
                <a href="#" class="btn-block" data-backdrop="static" data-toggle="modal" data-target="#login-modal">
                    Forgot Password
                </a>
                <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <img src="{{asset('theme/vendors/images/phpitutor_logo_10.png')}}" alt="login" class="login-img">
                                <h2 class="text-center mb-30">Find Account</h2>
                                <form>
                                    <div class="input-group custom input-group-lg">
                                        <input type="text" class="form-control" placeholder="Enter your email" name="mailForgot">
                                        <div class="input-group-append custom">
                                            <span class="input-group-text"><i class="fa fi-mail" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Check Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--<div class="forgot-password padding-top-10"><a href="">Forgot Password</a></div>--}}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="input-group">
                <a href="/register" class="btn btn-outline-success btn-lg btn-block">
                    Register here
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
