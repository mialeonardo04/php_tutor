@extends('layout.masterlogin')
@section('title','PHP Intelligent Tutor')
@section('content')
    <h5 class="text-center mb-30">Reset Account Password</h5>
    <form method="POST" action="{{route('resetPassword')}}">
        @csrf
        <input type="hidden" value="{{$id}}" name="id">
        <div class="input-group custom input-group-lg">
            <input type="text" class="form-control" name="email" value="{{ $dataEmail }}" readonly />
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="fi fi-mail" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="input-group custom input-group-lg">
            <input type="password" class="form-control" id="password" name="password" placeholder="New Password" autofocus />
            @if ($errors->has('password'))
                <strong style="color: red">{{ $errors->first('password') }}</strong>
            @endif
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="input-group custom input-group-lg">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter New Password" />
            @if ($errors->has('confirm_password'))
                <strong style="color: red">{{ $errors->first('confirm_password') }}</strong>
            @endif
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group">
                    <input type="submit" class="btn btn-outline-primary btn-lg btn-block" value="Reset Password Now"/>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Doesn't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endsection
