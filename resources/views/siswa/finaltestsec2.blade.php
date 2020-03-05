@extends('layout.masterdashboard')
@section('content')
    {{--live coding--}}
    <div id="notiftime" class="pull-right text-danger font-18"><strong>This task will end in <span id="time">25:00</span></strong></div>
    <div id="hehe">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue">Live Code Test (Looping Algorithm)</h4>
                    </div>
                </div>
                <p class="font-14 ml-0"><strong>Mari menguji pemahaman anda tentang algoritma dasar PHP. Buatlah pattern(motif) seperti gambar dibawah ini</strong></p>
                @php
                    $strings = "-+++++<br>--++++<br>---+++<br>----++<br>-----+<br>";
                @endphp
                <textarea class="form-control" disabled>{{str_replace("<br>","\n",$strings)}}</textarea>

                <form action="{{route('postExam2')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Your Coding Ground</label>
                        <textarea name="code" class="form-control">@php echo htmlentities('<?php') @endphp&#13;&#10;@php echo htmlentities('   /*write your code here*/') @endphp&#13;&#10;@php echo htmlentities('?>') @endphp</textarea>

                    </div>

                    <input type="hidden" name="answer" value="{{base64_encode($strings)}}">
                    <input type="hidden" name="progress" value="2">
                    <input type="hidden" name="id_std" value="{{$idstudent}}">
                    {{--<input type="hidden" name="id_unt" value="{{$coursebyid->id_unit}}">--}}
                    {{--<button type="submit" class="btn btn-primary pull-left">Submit Answer</button>--}}
                    <input type="submit" class="btn btn-primary pull-right" value="Submit Answer"/>
                </form>
            </div>
        </div>
    </div>
@endsection
