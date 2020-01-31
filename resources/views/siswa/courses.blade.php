@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Course Units</h5>
            </div>
        </div>
        <div class="row">
            <table class="data-table stripe hover nowrap">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Unit Name</th>
                    <th>Number of courses</th>
                    <th>Your Pretest Score</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($units as $unit)
                    <tr>
                        <td class="table-plus">{{$unit->id}}</td>
                        <td class="table-plus">{{$unit->name}}</td>
                        <td>
                            @if($unit->id == 1)
                            {{$course1}}
                            @elseif($unit->id == 2)
                            {{$course2}}
                            @elseif($unit->id == 3)
                            {{$course3}}
                            @elseif($unit->id == 4)
                            {{$course4}}
                            @elseif($unit->id == 5)
                            {{$course5}}
                            @elseif($unit->id == 6)
                            {{$course6}}
                            @elseif($unit->id == 7)
                            {{$course7}}
                            @elseif($unit->id == 8)
                            {{$course8}}
                            @endif
                        </td>
                        <td>
                            @foreach($nilaiPretest as $score)
                                @if($score->id_unit == $unit->id)
                                    @if($score->jumlah_benar*20 < 60)
                                        <p class="text-danger">{{$score->jumlah_benar*20}}% - <strong>Needs Improvement</strong></p>
                                    @else
                                        @if($score->jumlah_benar*20 == 100)
                                            <p class="text-success">{{$score->jumlah_benar*20}}% - You are Brilliant!</p>
                                        @else
                                            <p class="text-success">{{$score->jumlah_benar*20}}% - You have Passed</p>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($nilaiPretest as $score)
                                @if($score->id_unit == $unit->id)
                                    @if($score->jumlah_benar*20 < 60)
                                        <form method="post" action="/siswa/courses/{{$unit->id}}">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-success btn-block">Take Course</button>
                                        </form>
                                    @else
                                        <form>
                                            <button type="submit" class="btn btn-outline-secondary btn-block" disabled>Not yet Available</button>
                                        </form>
                                    @endif
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
