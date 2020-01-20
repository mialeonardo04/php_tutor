@extends('layout.masterlogin')
@section('title','PHP Intelligent Tutor')
@section('content')
    @if(Session::has('messageResetSuccess'))
        <div class="alert {{ Session::get('alert alert-success', 'alert-success') }}">{{ Session::get('messageResetSuccess') }}</div>
    @endif
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="input-group custom input-group-lg">
        <input type="text" class="form-control" placeholder="Enter your full name" name="name">
        @if ($errors->has('name'))
            <strong style="color: red">{{ $errors->first('name') }}</strong>
        @endif
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="input-group custom input-group-lg">
        <input type="text" class="form-control" placeholder="Enter your E-mail" name="email">
        @if ($errors->has('email'))
            <strong style="color: red">{{ $errors->first('email') }}</strong>
        @endif
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="fi fi-mail" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="input-group custom input-group-lg">
        <input type="text" class="form-control" placeholder="Pick a username" name="username">
        @if ($errors->has('username'))
            <strong style="color: red">{{ $errors->first('username') }}</strong>
        @endif
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="input-group custom input-group-lg">
        <input type="password" class="form-control" placeholder="**********" name="password" id="inputPassword" value="@if(isset($_COOKIE['remember_pass'])){{base64_decode($_COOKIE['remember_pass'])}}@endif">
        @if ($errors->has('password'))
            <strong style="color: red">{{ $errors->first('password') }}</strong>
        @endif
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="input-group custom input-group-lg">
        <select class="custom-select col-12" name="role">
            <option selected="">Choose Role</option>
            <option value="1">Pengajar</option>
            <option value="2">Peserta Didik</option>
        </select>
        @if ($errors->has('role'))
            <strong style="color: red">{{ $errors->first('role') }}</strong>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="input-group">
                <button class="btn btn-outline-primary btn-lg btn-block" type="submit">
                    Sign Up
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="input-group">
                <a href="/login" class="btn btn-outline-success btn-lg btn-block">
                    Already have an account?
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
