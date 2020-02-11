@extends('layout.masterdashboard')
@section('content')
    {{--<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">--}}
        {{--{{$student->avg_pretest}}--}}
{{--        {{printf($courserecord)}}--}}
    {{--</div>--}}
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Detail</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href=/">Student Data</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                        <img src="@if($student->photo_name === NULL){{asset('theme/vendors/images/default_avatar.jpg')}} @else {{ URL::to('/') }}/images/{{$student->photo_name}} @endif" alt="" class="avatar-photo">
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
                    <h5 class="text-center">{{$student->name}}</h5>
                    <p class="text-center text-muted">@if($student->verified == 1) <span class="text-success">verified account</span> @endif</p>
                    <div class="profile-info">
                        <h5 class="mb-20 weight-500">User Information</h5>
                        <ul>
                            <li>
                                <span>Email Address:</span>
                                {{$student->email}}
                            </li>
                            <li>
                                <span>Username:</span>
                                {{$student->username}}
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
                <div class="bg-white border-radius-4 box-shadow height-100-p">
                    <div class="profile-tab height-100-p">
                        <div class="tab height-100-p">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Record Pretest</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Record Course</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Timeline Tab start -->
                                <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                                    <div class="pd-20">
                                        <div class="clearfix mb-20">
                                            <div class="pull-left">
                                                <h5 class="text-blue">Pretest Info</h5>
                                                {{--<p class="font-14 text-danger">*caution: select row for detail!</p>--}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <table class="stripe hover multiple-select-row data-table-export nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Unit Name</th>
                                                    <th>Point Gain</th>
                                                    <th>Unit Score</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($pretestrecord as $s)
                                                    {{--<tr data-href="{{route('home')}}">--}}
                                                    <tr>
                                                        <td>{{$s->name}}</td>
                                                        <td>{{$s->jumlah_benar}}/5</td>
                                                        <td>{{$s->jumlah_benar*20}}%</td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                                <tr>
                                                    <td colspan="1"><strong>Total:</strong></td>
                                                    <td></td>
                                                    <td><strong>{{$student->avg_pretest}}%</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Timeline Tab End -->
                                <!-- Tasks Tab start -->
                                <div class="tab-pane fade" id="tasks" role="tabpanel">
                                    <div class="pd-20 profile-task-wrap">
                                        <div class="container pd-0">
                                            <div class="row">
                                                <table class="stripe hover multiple-select-row data-table-export nowrap">
                                                    <thead>
                                                    <tr>
                                                        <th>Unit Name</th>
                                                        <th>Course Description</th>
                                                        <th>Exercise Type</th>
                                                        <th>Score Gain</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($courserecord as $s)
                                                        {{--<tr data-href="{{route('home')}}">--}}
                                                        <tr>
                                                            <td>{{$s->name}}</td>
                                                            <td>{{$s->description}}</td>
                                                            <td>
                                                                @if($s->tipe_soal ==1)
                                                                    Short Answer
                                                                @else
                                                                    Live Code
                                                                @endif
                                                            </td>
                                                            <td>{{$s->score}}%</td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                    <tr>
                                                        <td colspan="1"><strong>Total:</strong></td>
                                                        <td></td>
                                                        <td><strong>{{$student->avg_exercise}}%</strong></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tasks Tab End -->
                                <!-- Setting Tab start -->
                                <!--gaada-->
                                <!-- Setting Tab End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
