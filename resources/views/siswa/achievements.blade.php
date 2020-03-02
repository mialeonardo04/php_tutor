@extends('layout.masterdashboard')
@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Achievement</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href=/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Student Achievement</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-30">
                <div class="pd-20 bg-white border-radius-4 box-shadow">
                    <div class="profile-photo">
                        {{--<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>--}}
                        <img src="@if(Auth::user()->photo_name === NULL){{asset('theme/vendors/images/default_avatar.jpg')}} @else {{ URL::to('/') }}/images/{{Auth::user()->photo_name}} @endif" alt="" class="avatar-photo">
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pd-5">
                                        <div class="img-container">
                                            <img id="image" src="{{ asset('theme/vendors/images/photo2.jpg')}}" alt="Picture">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Update" class="btn btn-primary">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-center">{{Auth::user()->name}}</h5>
                    <p class="text-center text-muted">@if(Auth::user()->verified == 1) <span class="text-success">verified account</span> @endif</p>
                    <div class="profile-info">
                        <h5 class="mb-20 weight-500">User Information</h5>
                        <ul>
                            <li>
                                <span>Email Address:</span>
                                {{Auth::user()->email}}
                            </li>
                            <li>
                                <span>Username:</span>
                                {{Auth::user()->username}}
                            </li>
                            <li>
                                <span>Major:</span>
                                Informatics and Computer Engineering Education
                            </li>
                            <li>
                                <span>College:</span>
                                Universitas Sebelas Maret<br>
                                Surakarta
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 mb-30">
                <div class="invoice-wrap">
                    <div class="invoice-box">
                        <div class="invoice-header">
                            <div class="logo text-center">
                                <div class="profile-photo">
                                {{--<img src="{{ asset('theme/vendors/images/phpitutor_logo.png') }}" alt="">--}}
                                <img src="@if(Auth::user()->photo_name === NULL){{asset('theme/vendors/images/default_avatar.jpg')}} @else {{ URL::to('/') }}/images/{{Auth::user()->photo_name}} @endif" alt="" class="avatar-photo">
                                </div>
                            </div>
                        </div>
                        <h4 class="text-center mb-30 weight-600">Congratulations</h4>
                        <div class="row pb-30">
                            <div class="col-md-6">
                                <h5 class="mb-15">Student Name</h5>
                                <p class="font-14 mb-5">Date Join: <strong class="weight-600">@php $d =explode(" ",Auth::user()->created_at);
                                                                $newdate = date("d F Y",strtotime($d[0]));
                                                                echo $newdate;
                                        @endphp</strong></p>
                                <p class="font-14 mb-5">No: <strong class="weight-600">{{Auth::user()->id}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <div class="text-right">
                                    <p class="font-14 mb-5"><strong>{{Auth::user()->name}} </strong></p>
                                    <p class="font-14 mb-5">Prodi PTIK UNS</p>
                                    <p class="font-14 mb-5">Surakarta</p>
                                    <p class="font-14 mb-5">57161</p>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-desc pb-30">
                            <div class="invoice-desc-head clearfix">
                                <div class="invoice-sub">Activity</div>
                                <div class="invoice-rate">Unit Taken</div>
                                <div class="invoice-hours"></div>
                                <div class="invoice-subtotal">Average Score</div>
                            </div>
                            <div class="invoice-desc-body">
                                <ul>
                                    <li class="clearfix">
                                        <div class="invoice-sub">Pretest</div>
                                        <div class="invoice-rate">All</div>
                                        <div class="invoice-hours"></div>
                                        <div class="invoice-subtotal"><span class="weight-600">{{$pretest}}</span></div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="invoice-sub">Courses</div>
                                        <div class="invoice-rate">{{$unittaken}}</div>
                                        <div class="invoice-hours"></div>
                                        <div class="invoice-subtotal"><span class="weight-600">{{$course}}</span></div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="invoice-sub">Final Test</div>
                                        <div class="invoice-rate">All</div>
                                        <div class="invoice-hours"></div>
                                        <div class="invoice-subtotal"><span class="weight-600">@if($nilaifinal !== null){{$nilaifinal}}@else - <a href="{{route('siswa.units')}}" class="text-primary">Take Now</a> @endif</span></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="invoice-desc-footer">
                                <div class="invoice-desc-head clearfix">
                                    <div class="invoice-sub">Issued By</div>
                                    <div class="invoice-rate">Due By</div>
                                    <div class="invoice-subtotal">STATUS</div>
                                </div>
                                <div class="invoice-desc-body">
                                    <ul>
                                        <li class="clearfix">
                                            <div class="invoice-sub">
                                                <img src="{{ asset('theme/vendors/images/phpitutor_logo.png') }}" alt="">
                                            </div>
                                            <div class="invoice-rate font-16 weight-600">{{date('d M Y')}}</div>
                                            <div class="invoice-subtotal">@if(($nilaifinal>=60)&&($course>=60))<span class="weight-600 font-24 text-success">PASSED</span> @else <span class="weight-600 font-24 text-danger">FAILED</span> @endif</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{--<h4 class="text-center pb-20">Thank You!!</h4>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
