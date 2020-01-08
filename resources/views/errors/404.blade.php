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
                <h1 class="color-white weight-500">Error: 404 Page Not Found</h1>
                <img src="{{asset('theme/vendors/images/404.png')}}" alt="">
                <p>Sorry, the page you’re looking for cannot be accessed.<br>Either check the URL, <a href="/">go home</a>.</p>
            </div>
        </div>
    </div>
    @include('include.script')
</body>
</html>
