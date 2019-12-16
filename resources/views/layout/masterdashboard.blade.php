<!doctype html>
<html lang="en">
<head>
    @include('include.head')
</head>
<body>
@include('include.header')
@include('include.sidebar')
<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        @yield('content')
        @include('include.footer')
    </div>
</div>
@include('include.script')
</body>
</html>

