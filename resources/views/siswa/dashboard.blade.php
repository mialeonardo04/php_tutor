@extends('layout.masterdashboard')
{{--@section('title', 'Login')--}}
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Welcome to <img src="{{asset('theme/vendors/images/phpitutor_logo_txt.png')}}" alt="PHP Intelligent Tutor"> {{Auth::user()->username}}</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row clearfix progress-box">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
                <div class="progress-box text-center">
                    <input id="aaa" type="text" class="knob dial1" value="66" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#0099ff" readonly>
                    <h5 class="text-blue padding-top-10 weight-500">My Earnings</h5>
                    <span class="font-14">66% Average <i class="fa fa-line-chart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
                <div class="progress-box text-center">
                    <input id="bbb" type="text" class="knob dial2" value="75" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#41ccba" readonly>
                    <h5 class="text-light-green padding-top-10 weight-500">Business Captured</h5>
                    <span class="font-14">75% Average <i class="fa fa-line-chart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
                <div class="progress-box text-center">
                    <input id="ccc" type="text" class="knob dial3" value="90" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#f56767" readonly>
                    <h5 class="text-light-orange padding-top-10 weight-500">Projects Speed</h5>
                    <span class="font-14">90% Average <i class="fa fa-line-chart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
                <div class="progress-box text-center">
                    <input id="ddd" type="text" class="knob dial4" value="35" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#a683eb" readonly>
                    <h5 class="text-light-purple padding-top-10 weight-500">Panding Orders</h5>
                    <span class="font-14">35% Average <i class="fa fa-line-chart"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
        <div class="pd-20 bg-white border-radius-4 box-shadow">
            <h5 class="mb-20">Animated  Progress</h5>
            <div class="progress mb-20">
                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="progress mb-20">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="progress">
                <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
    {{--<div class="row clearfix progress-box">--}}
        {{--<div class="col-lg-3 col-md-6 col-sm-12 mb-30">--}}
            {{--<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">--}}
                {{--<div class="progress-box text-center">--}}
                    {{--<input id="aaa" type="text" class="knob dial1" value="66" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#0099ff" readonly>--}}
                    {{--<h5 class="text-blue padding-top-10 weight-500">My Earnings</h5>--}}
                    {{--<span class="font-14">66% Average <i class="fa fa-line-chart"></i></span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3 col-md-6 col-sm-12 mb-30">--}}
            {{--<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">--}}
                {{--<div class="progress-box text-center">--}}
                    {{--<input id="bbb" type="text" class="knob dial2" value="75" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#41ccba" readonly>--}}
                    {{--<h5 class="text-light-green padding-top-10 weight-500">Business Captured</h5>--}}
                    {{--<span class="font-14">75% Average <i class="fa fa-line-chart"></i></span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3 col-md-6 col-sm-12 mb-30">--}}
            {{--<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">--}}
                {{--<div class="progress-box text-center">--}}
                    {{--<input id="ccc" type="text" class="knob dial3" value="90" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#f56767" readonly>--}}
                    {{--<h5 class="text-light-orange padding-top-10 weight-500">Projects Speed</h5>--}}
                    {{--<span class="font-14">90% Average <i class="fa fa-line-chart"></i></span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3 col-md-6 col-sm-12 mb-30">--}}
            {{--<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">--}}
                {{--<div class="progress-box text-center">--}}
                    {{--<input id="ddd" type="text" class="knob dial4" value="35" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#a683eb" readonly>--}}
                    {{--<h5 class="text-light-purple padding-top-10 weight-500">Panding Orders</h5>--}}
                    {{--<span class="font-14">35% Average <i class="fa fa-line-chart"></i></span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection
