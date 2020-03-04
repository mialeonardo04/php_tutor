@extends('layout.masterdashboard')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Courses</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Final Exam</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@if($progresfinaltest == 0)
    {{--Pilihan ganda--}}
    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{asset("theme/unpkgjquery.js")}}"></script>
        <script src="{{asset("theme/surveyjquery.js")}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset("theme/style.css")}}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/pbkdf2.js"></script>

    </head>
    <body>

    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div id="surveyElement"></div>
        <div id="surveyResult"></div>


        <script type="text/javascript" src="{{asset("theme/finaltestfirstsection.js")}}"></script>
        <input type="hidden" name="uid" id="uid" value="{{$uid}}">
        <input type="hidden" name="statuspretest" id="statuspretest" value="{{$statuspretest}}">
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <form id="form" action='{{route('submitposttestsecone')}}' method='post' style="display: none">
                @csrf
                <input id="scorepretest" type="hidden" name="scorefinaltest" value="">
                <input id="uidnew" type="hidden" name="uid" value="">
                <input id="unitID" type="hidden" name="progress" value="">


                <input type='submit' class='btn btn-primary pull-right' name='submit' value='Submit' >
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
    </div>
</body>
</html>
@elseif($progresfinaltest == 1)
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <p>Congratulation! You have finished the first section of these final test. Now prepare your self for the second test.<br> You have 20 minutes to finish one task. <br> The test and the time will start when you click the 'Start' button below</p>
        <p>Good Luck!</p>
        <div class="btn-list">
            <form method="post" action="{{route('examch2')}}">
                @csrf
                <button type="submit" name="submit" class="btn-info btn-lg btn-block" style="text-align: center">Start</button>
            </form>
            {{--<a href="{{route('siswa.getexam')}}" class="btn-info btn-lg btn-block" style="text-align: center">Start</a>--}}
        </div>
    </div>
@else
    Selesai
@endif

@endsection
