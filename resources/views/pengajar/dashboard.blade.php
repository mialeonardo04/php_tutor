@extends('layout.masterdashboard')
{{--@section('title', 'Login')--}}
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
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="tab">
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home2" role="tab" aria-selected="true">New Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile2" role="tab" aria-selected="false">New Teacher @if($adminnotverfiedcount>0)<i class="fa fa-star" aria-hidden="true"></i> @endif</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#contact2" role="tab" aria-selected="false">Approved Teacher</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="home2" role="tabpanel">
                    <div class="pd-20">
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="@if($latestuser->photo_name === NULL){{asset('theme/vendors/images/default_avatar.jpg')}} @endif" alt="">
                                    <div class="da-overlay da-slide-top">
                                        <div class="da-social">
                                            <ul class="clearfix">
                                                <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="da-card-content">
                                    <h5 class="weight-500 mb-10">{{$lateststudent->name}}</h5>
                                    @if(!empty($lateststudent->avg_pretest))
                                        <p class="mb-0">Avg. Pretest: {{$lateststudent->avg_pretest}}</p>
                                    @else
                                        <p class="mb-0">Avg. Pretest: -</p>
                                    @endif
                                    @if(!empty($lateststudent->avg_exercise))
                                        <p class="mb-0">Avg. Exercises: {{$lateststudent->avg_pretest}}</p>
                                    @else
                                        <p class="mb-0">Avg. Exercises: -</p>
                                    @endif
                                    @if(!empty($lateststudent->nilai_final))
                                        <p class="mb-0">Final Test: {{$lateststudent->avg_pretest}}</p>
                                    @else
                                        <p class="mb-0">Final Test: -</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile2" role="tabpanel">
                    <div class="pd-20">
                        <div class="row">
                            <table class="data-table stripe hover nowrap">
                                <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>created time</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($adminnotverfied as $user)
                                    <tr>
                                        <td class="table-plus">{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="icon-copy ion-grid"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <form action="{{route('admin.assign')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="iduser" value="{{$user->id}}">
                                                        <button class="dropdown-item" type="submit" name="accepted" onclick="return confirm('Accept this account. Are you sure?')"><i class="icon-copy ion-checkmark-circled"></i> Accept</button>
                                                    </form>
                                                    <form action="{{route('admin.assign')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="iduser" value="{{$user->id}}">
                                                        <button class="dropdown-item" type="submit" name="denied" onclick="return confirm('Deny this account. Are you sure?')"><i class="icon-copy ion-close-circled"></i> Deny</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact2" role="tabpanel">
                    <div class="pd-20">
                        <div class="row">
                            <table class="data-table stripe hover nowrap">
                                <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>created time</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <td class="table-plus">{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
