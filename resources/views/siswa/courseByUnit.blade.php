@extends('layout.masterdashboard')
@section('content')
    <table>
        @foreach($courses as $course)
            <tr>
                <td>{{$course->description}}</td>
            </tr>
        @endforeach
    </table>

@endsection
