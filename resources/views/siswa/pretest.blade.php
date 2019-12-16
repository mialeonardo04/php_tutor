@extends('layout.masterdashboard')
@section('content')
    {{--@if($statuspretest >= 1)--}}
        {{--<script>window.location = "/siswa/dashboard";</script>--}}
    {{--@else--}}
        <!DOCTYPE html>
        <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="{{asset("theme/unpkgjquery.js")}}"></script>
            <script src="{{asset("theme/surveyjquery.js")}}"></script>
            <link rel="stylesheet" type="text/css" href="{{asset("theme/style.css")}}">


        </head>
        <body>
        <div id="surveyElement"></div>
        <div id="surveyResult"></div>

        <script type="text/javascript" src="{{asset("theme/quiz.js")}}"></script>
        {{--<input type="hidden" name="uid" id="uid" value="{{$uid}}">--}}
        {{--<input type="hidden" name="statuspretest" id="statuspretest" value="{{$statuspretest}}">--}}

        <form id="form" action='' method='post' style="display: none">
            @csrf
            <input id="scorepretest" type="hidden" name="scorepretest" value="">
            <input id="uidnew" type="hidden" name="uid" value="">
            <input type='submit' class='btn btn-primary pull-right' name='submit' value='Submit' >
        </form>

        </body>
        </html>

    {{--@endif--}}
@endsection
