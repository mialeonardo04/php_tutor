@extends('layout.mastercourse')
@section('content')

{{--    {{$coursebyid}}--}}
{{--{{ $checkhavedone }}--}}
@if($checkhavedone>0)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> You have finished this course </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
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
            <p>{{$coursebyid->question}}</p>
            <form method="post" action="{{route('submitexercise')}}">
                @csrf
                <input type="hidden" name="tipe_soal" value="{{$coursebyid->tipe_soal}}">
                <input type="hidden" name="id_std" value="{{$idstudent}}">
                <input type="hidden" name="id_crs" value="{{$coursebyid->id_course}}">
                <input type="hidden" name="id_unt" value="{{$coursebyid->id_unit}}">
                <input type="hidden" name="answer" value="{{base64_encode($coursebyid->answer)}}">
                <input type="hidden" name="count_corr" value="{{base64_encode($coursebyid->correct_count)}}">
                <input class="form-control" type="text" placeholder="your answer (separate it with dash(-) if you have more than one answers)" name="answerrequest" required><br>
                <button type="submit" class="btn btn-primary pull-left" data-dismiss="modal">Submit Answer</button>
            </form>
        </div>
    </div>
@elseif($coursebyid->tipe_soal == 2)
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">{{$coursebyid->description}}</h4>

            </div>
        </div>
        <p class="font-14 ml-0">{{$coursebyid->question}}</p>
        <form action="{{route('submitExCode')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Your Coding Ground</label>
                <textarea name="code" class="form-control">@php echo htmlentities('<?php') @endphp &#13;&#10;@php echo htmlentities('   /*write your code here*/') @endphp&#13;&#10;@php echo htmlentities('?>') @endphp</textarea>
            </div>

            <input type="hidden" name="tipe_soal" value="{{$coursebyid->tipe_soal}}">
            {{--<button type="submit" class="btn btn-primary pull-left">Submit Answer</button>--}}
            <input type="submit" class="btn btn-primary pull-left" value="Submit Answer"/>
        </form>
    </div>
@else
    teori bruh
@endif
@endsection
