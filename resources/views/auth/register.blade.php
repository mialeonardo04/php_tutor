@extends('layout.masterlogin')
@section('title','PHP Intelligent Tutor')
@section('content')
<form>
    <div class="input-group custom input-group-lg">
        <input type="text" class="form-control" placeholder="Username">
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="input-group custom input-group-lg">
        <input type="password" class="form-control" placeholder="**********">
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="input-group">
                <!--
                    use code for form submit
                    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
                -->
                <a class="btn btn-outline-primary btn-lg btn-block" href="index.php">Sign In</a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="forgot-password padding-top-10"><a href="forgot-password.php">Forgot Password</a></div>
        </div>
    </div>
</form>
@endsection
