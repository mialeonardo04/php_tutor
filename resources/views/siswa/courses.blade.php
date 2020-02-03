@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Course Units</h5>
                <h6 class="text-black-50">You need to pass <strong class="text-danger">{{$unit_taken}}</strong> course chapter. Progress:
                    @php
                        $countchapter = 0;
                        $fromdb = 0;
                        $unit1 = 0;
                        $unit2 = 0;
                        $unit3 = 0;
                        $unit4 = 0;
                        $unit5 = 0;
                        $unit6 = 0;
                        $unit7 = 0;
                        $unit8 = 0;

                        $try_count = array();
                        $max_try = 0;
                        //search maximum trycount
                        foreach ($reports as $report){
                            array_push($try_count, $report->try_count);
                            $max_try = max($try_count);

                            if ($report->try_count == $max_try){
                                 if ($report->id_unit == 1){
                                    $unit1 ++;
                                 }
                                 if ($report->id_unit == 2){
                                    $unit2 ++;
                                 }
                                 if ($report->id_unit == 3){
                                    $unit3 ++;
                                 }
                                 if ($report->id_unit == 4){
                                    $unit4 ++;
                                 }
                                 if ($report->id_unit == 5){
                                    $unit5 ++;
                                 }
                                 if ($report->id_unit == 6){
                                    $unit6 ++;
                                 }
                                 if ($report->id_unit == 7){
                                    $unit7 ++;
                                 }
                                 if ($report->id_unit == 8){
                                    $unit8 ++;
                                 }

                                 if ($unit1/$course1 == 1){
                                    $countchapter++;
                                 }
                                 if ($unit2/$course2 == 1){
                                    $countchapter++;
                                 }
                                 if ($unit3/$course3 == 1){
                                    $countchapter++;
                                 }
                                 if ($unit4/$course4 == 1){
                                    $countchapter++;
                                 }
                                 if ($unit5/$course5 == 1){
                                    $countchapter++;
                                 }
                                 if ($unit6/$course6 == 1){
                                    $countchapter++;
                                 }
                                 //if ($unit7/$course7 == 1){
                                 //   $countchapter++;
                                 //}
                                 //if ($unit8/$course8 == 1){
                                 //   $countchapter++;
                                 //}
                            }
                        }

                        //menentukan course yang sudah dikerjakan per-chapter


                        //menentukan progress per siswa


                        //echo $unit3;
                    @endphp
                    @if($countchapter != $unit_taken)
                        @if($countchapter == 0)
                            <strong class="text-danger">{{$countchapter}}/{{$unit_taken}}</strong>
                        @else
                            <strong class="text-warning">{{$countchapter}}/{{$unit_taken}}</strong>
                        @endif
                    @else
                        <strong class="text-success">{{$countchapter}}/{{$unit_taken}}</strong>
                    @endif
                    {{--{{$countchapter}}--}}
                </h6>
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
                        @if($unit->id == 1)
                            <td>{{$course1}}</td>
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
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course1}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">Take Course</button>
                                            </form>
                                        @else
                                            <form>
                                                <button type="submit" class="btn btn-outline-secondary btn-block" disabled>Not Available</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 2)
                            <td>{{$course2}}</td>
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
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course2}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">Take Course</button>
                                            </form>
                                        @else
                                            <form>
                                                <button type="submit" class="btn btn-outline-secondary btn-block" disabled>Not Available</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 3)
                            <td>{{$course3}}</td>
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
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course3}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">Take Course</button>
                                            </form>
                                        @else
                                            <form>
                                                <button type="submit" class="btn btn-outline-secondary btn-block" disabled>Not Available</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 4)
                            <td>{{$course4}}</td>
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
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course4}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">Take Course</button>
                                            </form>
                                        @else
                                            <form>
                                                <button type="submit" class="btn btn-outline-secondary btn-block" disabled>Not Available</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 5)
                            <td>{{$course5}}</td>
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
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course5}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">Take Course</button>
                                            </form>
                                        @else
                                            <form>
                                                <button type="submit" class="btn btn-outline-secondary btn-block" disabled>Not Available</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 6)
                            <td>{{$course6}}</td>
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
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course6}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">Take Course</button>
                                            </form>
                                        @else
                                            <form>
                                                <button type="submit" class="btn btn-outline-secondary btn-block" disabled>Not Available</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 7)
                            <td>{{$course7}}</td>
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
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course7}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">Take Course</button>
                                            </form>
                                        @else
                                            <form>
                                                <button type="submit" class="btn btn-outline-secondary btn-block" disabled>Not Available</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 8)
                            <td>{{$course8}}</td>
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
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course8}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">Take Course</button>
                                            </form>
                                        @else
                                            <form>
                                                <button type="submit" class="btn btn-outline-secondary btn-block" disabled>Not Available</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
