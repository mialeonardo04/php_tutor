@extends('layout.mastercourse')
@section('content')
{{--    {{$coursebyid}}--}}
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
                <input type="hidden" name="answer" value="{{base64_encode($coursebyid->answer)}}">
                <input class="form-control" type="text" placeholder="your answer" name="answerrequest"><br>
                <button type="submit" class="btn btn-primary pull-right" data-dismiss="modal">Submit Answer</button>
            </form>
        </div>
    </div>
@elseif($coursebyid->tipe_soal == 2)
    koding bruh
@else
    teori bruh
@endif
@endsection
