@extends('layout.masterlogin')
@section('title','PHP Intelligent Tutor')
@section('content')
    @if(Session::has('messageResetSuccess'))
        <div class="alert {{ Session::get('alert alert-success', 'alert-success') }}">{{ Session::get('messageResetSuccess') }}</div>
    @endif
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="input-group custom input-group-lg {{ $errors->has('username') ? 'has-error' : ''  }}">
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
    <div class="input-group custom input-group-lg {{ $errors->has('password') ? 'has-error' : ''  }}">
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
            <div class="forgot-password padding-top-10"><a href="">Forgot Password</a></div>
        </div>
    </div>
</form>
@endsection
