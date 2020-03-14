<!doctype html>
<html lang="en">
<head>
    @include('include.head')
    <link rel="stylesheet" type="text/css" href="{{asset('theme/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}">
</head>
<body>
<div class="container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
                @yield('content')
                @include('include.footer')

        </div>
    </div>
</div>
@include('include.script')
</body>
</html>

