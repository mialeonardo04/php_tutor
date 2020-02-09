@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        {{--{{$student->password}}--}}
        {{printf($courserecord)}}
    </div>
@endsection
