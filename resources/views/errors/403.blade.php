<!doctype html>
<html lang="en">
<head>
    @include('include.head')
</head>
<body>
<div class="error-page login-wrap bg-cover height-100-p customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
    <img src="{{asset('theme/vendors/images/error-bg.jpg')}}" alt="" class="bg_img">
    <div class="pd-10">
        <div class="error-page-wrap text-center color-white">
            <h1 class="color-white weight-500">Error: 403 Forbidden</h1>
            <img src="{{asset('theme/vendors/images/403.png')}}" alt="">
            <p>Sorry, access to this resource on the server is denied.<br>Either check the URL, <a href="/">go home</a>.</p>
        </div>
    </div>
</div>
@include('include.script')
</body>
</html>
