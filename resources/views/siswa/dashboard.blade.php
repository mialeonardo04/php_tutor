@extends('layout.masterdashboard')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Welcome to <img src="{{asset('theme/vendors/images/phpitutor_logo_txt.png')}}" alt="PHP Intelligent Tutor"></h4>
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
    @if($statusprogress == 0)
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <p>Dear, {{Auth::user()->name}}. it seems like you haven't done the Pre-Test yet. Let us know your competences with using PHP Script Programming Language through this Pre-Test Below</p>
            <p>Good Luck!</p>
            <div class="btn-list">
                <a href="/siswa/pretest" class="btn-info btn-lg btn-block" style="text-align: center">Take Pre-Test Now!</a>
            </div>
        </div>
    @else
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <p>Score Record</p>
            <div class="row clearfix progress-box">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
                        <div class="progress-box text-center">
                            <input id="aaa" type="text" class="knob dial1" value="{{round($nilaipretest)}}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#0099ff" readonly>
                            <h5 class="text-blue padding-top-10 weight-500">My Pre-test Average Score</h5>
                            <span class="font-14">{{round($nilaipretest)}}% <i class="fa fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
                        <div class="progress-box text-center">
                            <input id="bbb" type="text" class="knob dial2" value="{{round($nilaipretestmax)}}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#41ccba" readonly>
                            <h5 class="text-light-green padding-top-10 weight-500">My Pre-Test High Score (bys unit)</h5>
                            <span class="font-14">{{round($nilaipretestmax)}}% <i class="fa fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
                        <div class="progress-box text-center">
                            @if(!empty($nilaicoursesavgmin))
                                <input id="ccc" type="text" class="knob dial3" value="{{round($nilaicoursesavgmin)}}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#f56767" readonly>
                                <h5 class="text-light-orange padding-top-10 weight-500">My Average Courses Score</h5>
                                <span class="font-14">{{round($nilaicoursesavgmin)}}% <i class="fa fa-line-chart"></i></span>
                            @else
                                <input id="ccc" type="text" class="knob dial3" value="0" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#f56767" readonly>
                                <h5 class="text-light-orange padding-top-10 weight-500">My Average Courses Score</h5>
                                <span class="font-14">0% (haven't taken a course)<i class="fa fa-line-chart"></i></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
                        <div class="progress-box text-center">
                         @if(!empty($nilaifinal)> 0)
                                <input id="ddd" type="text" class="knob dial4" value="{{round($nilaifinal)}}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#a683eb" readonly>
                                <h5 class="text-light-purple padding-top-10 weight-500">Final Test Score</h5>
                                <span class="font-14">{{round($nilaifinal)}}% <i class="fa fa-line-chart"></i></span>
                         @else
                                <input id="ddd" type="text" class="knob dial4" value="0" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#a683eb" readonly>
                                <h5 class="text-light-purple padding-top-10 weight-500">Final Test Score</h5>
                                <span class="font-14">0% (haven't tested) <i class="fa fa-line-chart"></i></span>
                         @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row clearfix">
        @if(!empty($lastreportupdate))
            <div class="col-sm-12 col-md-6 mb-30">
                <div class="card box-shadow">
                    <h5 class="card-header weight-500">{{$lastreportupdate->units()->first()->name}}: {{$lastreportupdate->courses()->first()->description}}</h5>
                    <div class="card-body">
                        <p class="card-text">Let's finish your lessons</p>
                        <a href="#" class="btn btn-primary">Continue</a>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-sm-12 col-md-6 mb-30">
            <div class="card box-shadow">
                <h5 class="card-header weight-500">Select Course</h5>
                <div class="card-body">
                    <p class="card-text">Let's choose your course</p>
                    <a href="/siswa/units" class="btn btn-primary">Go!</a>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
