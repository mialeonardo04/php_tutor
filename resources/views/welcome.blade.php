@extends('layout.masterhome')
@section('title', 'PHP Intelligent Tutor')
@section('welcometitle','PHP Intelligent Tutor')
@section('content')
    <!-- About Section page-top-->
    <section id="about" class="about-section text-center">
        <div class="container">
            <div class="row">
                {{--<img src="{{ asset('theme2/img/php_PNG20.png') }}" class="img-fluid" alt="">--}}
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">PHP Intelligent Tutor</h2>
                    <p class="text-white-50">PHP Intelligent Tutor (PHP-I-Tutor) is a <i>web-based</i> supporting application for learning PHP Scripting Languages. This application is intended for students in web programming courses with basic PHP materials. </p>
                    <a href="#page-top" class="btn btn-primary js-scroll-trigger" style="margin-top: -100px">Begin</a><br>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section bg-black">
        <div class="container">

            <div class="row">

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">
                                <a href="https://www.google.com/maps/place/7%C2%B033'31.2%22S+110%C2%B046'32.4%22E/@-7.5586477,110.7734753,17z/data=!3m1!4b1!4m6!3m5!1s0x0:0x0!7e2!8m2!3d-7.5586533!4d110.7756641" target="_blank">
                                    Kos Damai - Jalan Sidomulyo, Dusun II, Makamhaji, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57161
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">
                                <a href="mailto:phpitutor@gmail.com?Subject=Hello%20i%20am%20a%20visitor">phpitutor@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">+62 (271) 714-819</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="social d-flex justify-content-center">
                <a href="#" class="mx-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://github.com/leonard04?tab=repositories" target="_blank" class="mx-2">
                    <i class="fab fa-github"></i>
                </a>
            </div>

        </div>
    </section>
@endsection
