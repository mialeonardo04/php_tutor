@extends('layout.mastercourse')
@section('content')

{{--    {{$coursebyid}}--}}
{{--{{ $checkhavedone }}--}}
@if($checkhavedone>0)
    @if($lastscoreincourse==100)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> You have finished this course. Your latest score: {{$lastscoreincourse}}%</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif($lastscoreincourse==75)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> You have finished this course. Your latest score: {{$lastscoreincourse}}%</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @else
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> You have finished this course. Your latest score: {{$lastscoreincourse}}%</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div>
        @if($id_course == $lastidcoursebyunit)
            <a href="{{route('siswa.units')}}" class="btn btn-success pull-right">Finish
            </a>
        @else
            <a href="{{route('siswa.course',[
                'id_unit'=>$id_unit,
                'id_course'=>$id_course+1
            ])}}" class="btn btn-success pull-right">Next Course
            </a>
        @endif
    </div>
@endif
{{--{{$lastidcoursebyunit}}--}}
{{--{{$coursebyid->tipe_soal}}--}}
@if($coursebyid->tipe_soal == 1)
    <div class="min-height-200px">
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue">{{$coursebyid->description}}</h4>
                    <p class="font-14 ml-0">Amati video berikut, dan jawab soal dibawah!</p>
                </div>
            </div>
            <div class="container">
                <div data-type="youtube" data-video-id="{{$coursebyid->embed_url}}"></div>
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue">Exercise</h4>
                </div>
            </div>
            @if($coursebyid->id_course==23 || $coursebyid->id_course==25 || $coursebyid->id_course==26
            || $coursebyid->id_course==29 || $coursebyid->id_course==30 ||$coursebyid->id_course==31)
                <img id="image" src="{{ asset('theme/src/images')}}/{{$coursebyid->question}}" alt="Picture">
            @else
                <p>{{$coursebyid->question}}</p>
            @endif
            <form method="post" action="{{route('submitexercise')}}">
                @csrf
                <input type="hidden" name="tipe_soal" value="{{$coursebyid->tipe_soal}}">
                <input type="hidden" name="id_std" value="{{$idstudent}}">
                <input type="hidden" name="id_crs" value="{{$coursebyid->id_course}}">
                <input type="hidden" name="id_unt" value="{{$coursebyid->id_unit}}">
                <input type="hidden" name="answer" value="{{base64_encode($coursebyid->answer)}}">
                <input type="hidden" name="count_corr" value="{{base64_encode($coursebyid->correct_count)}}">
                <input class="form-control" type="text" placeholder="your answer (separate it with dash(-) if you have more than one answers)" name="answerrequest" required><br>
                <div>
                    <button type="submit" class="btn btn-primary pull-left" data-dismiss="modal">Submit Answer</button>
                </div>
            </form>
        </div>
    </div>
@elseif($coursebyid->tipe_soal == 2)
    <div class="min-height-200px">
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue">{{$coursebyid->description}}</h4>
                </div>
            </div>
            <p class="font-14 ml-0"><strong>{{$coursebyid->question}}</strong></p>
            @if($coursebyid->id_course == 32)
                <textarea class="form-control" disabled>{{str_replace("<br>","\n",$coursebyid->answer)}}</textarea>
            @endif
            <form action="{{route('submitExCode')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Your Coding Ground</label>
                    <textarea name="code" class="form-control">@php echo htmlentities('<?php') @endphp&#13;&#10;@php echo htmlentities('   /*write your code here*/') @endphp&#13;&#10;@php echo htmlentities('?>') @endphp</textarea>

                </div>

                <input type="hidden" name="answer" value="{{base64_encode($coursebyid->answer)}}">
                <input type="hidden" name="tipe_soal" value="{{$coursebyid->tipe_soal}}">
                <input type="hidden" name="id_std" value="{{$idstudent}}">
                <input type="hidden" name="id_crs" value="{{$coursebyid->id_course}}">
                <input type="hidden" name="id_unt" value="{{$coursebyid->id_unit}}">
                {{--<button type="submit" class="btn btn-primary pull-left">Submit Answer</button>--}}
                <input type="submit" class="btn btn-primary pull-left" value="Submit Answer"/>
            </form>
        </div>
    </div>
@else
    <div class="row clearfix">
        <div class="col-sm-12 col-md-6 mb-30">
            <div class="card box-shadow">
                <div class="card-header">
                    Variabel Superglobals: <strong>@php
                            $str = explode(" ",$coursebyid->description);
                            $one = str_replace("(","",$str[3]);
                            echo str_replace(")","",$one);
                        @endphp </strong>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{$coursedetail->materi}}</p>
                        <footer class="blockquote-footer">Website <cite title="Source Title">w3schools.com</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 mb-30">
            <div class="card box-shadow">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{$coursedetail->question}}</p>
                        <footer class="blockquote-footer">Website <cite title="Source Title">w3schools.com</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="col-sm-12 col-md-12 mb-30">
            <div class="card box-shadow">
                <div class="card-header">
                    Perhatikan Contoh berikut:
                </div>
                <div class="card-body">
                    <img id="image" src="{{ asset('theme/src/images')}}/{{$coursedetail->answer}}" alt="Picture">
                </div>
            </div>
        </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Exercise</h4>
            </div>
        </div>
        <img id="image" src="{{ asset('theme/src/images')}}/{{$coursebyid->embed_url}}" alt="Picture">
        <p>{{$coursebyid->question}}</p>
        <form method="post" action="{{route('submitTx')}}">
            @csrf
            <input type="hidden" name="tipe_soal" value="{{$coursebyid->tipe_soal}}">
            <input type="hidden" name="id_std" value="{{$idstudent}}">
            <input type="hidden" name="id_crs" value="{{$coursebyid->id_course}}">
            <input type="hidden" name="id_unt" value="{{$coursebyid->id_unit}}">
            <input type="hidden" name="answer" value="{{base64_encode($coursebyid->answer)}}">
            <input type="hidden" name="count_corr" value="{{base64_encode($coursebyid->correct_count)}}">
            <input class="form-control" type="text" placeholder="your answer (separate it with dash(-) if you have more than one answers)" name="answerrequest" required><br>
            <div>
                <button type="submit" class="btn btn-primary pull-left" data-dismiss="modal">Submit Answer</button>
            </div>
        </form>
    </div>
{{--    {{$coursebyid->question}}--}}
@endif
@endsection
