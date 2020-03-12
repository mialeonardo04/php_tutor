
<!DOCTYPE html>
<html lang="en">@if(Auth::user())
    @if(Auth::user()->roles[0]['name'] == "siswa")
        <script>window.location = "/siswa/dashboard";</script>
    @elseif(Auth::user()->roles[0]['name'] == "pengajar")
        <script>window.location = "/pengajar/dashboard";</script>
    @endif
@endif

<head>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="SxivWguc60pSM7KaW4EPl91ODrpGl0Ia6Xsxae7Fa4Q" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('theme/vendors/images/logo.png')}}">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('theme2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('theme2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('theme2/css/grayscale.css') }}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">@yield('welcometitle')</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/register">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
            <h1 class="mx-auto my-0 text-uppercase main-title">PHP I Tutor</h1>
            <h2 class="text-white-50 mx-auto mt-2 mb-5">An intellectual way to receive an Intelligent thing about PHP programming</h2>
            <a href="#about" class="btn btn-primary js-scroll-trigger">What is this?</a>
        </div>
    </div>
</header>

@yield('content')

<!-- Footer -->
<footer class="bg-black small text-center text-white-customleo">
    <div class="container">
        Copyright &copy;  2019 PTIK - PHP Intelligent Tutor - Ignasius Agus Leonardo
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('theme2/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('theme2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('theme2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('theme2/js/grayscale.min.js')}}"></script>

</body>

</html>
