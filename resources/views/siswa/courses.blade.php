@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Course Units</h5>
                @if($unit_taken >0)
                <h6 class="text-black-50">You need to finish <strong class="text-danger">{{$unit_taken}}</strong> course chapter to open <strong>The Final Exam</strong> chapter. Progress:
                    @php
                        $r1 = [];
                        $r2 = [];
                        $r3 = [];
                        $r4 = [];
                        $r5 = [];
                        $r6 = [];
                        $r7 = [];
                        $r8 = [];
                        $hastaken = 0;

                        if (!empty($report1)){
                            array_push($r1,1);
                        }
                        if (!empty($report2)){
                            array_push($r1,1);
                        }
                        if (!empty($report3)){
                            array_push($r1,1);
                        }
                        if (!empty($report4)){
                            array_push($r2,1);
                        }
                        if (!empty($report5)){
                            array_push($r2,1);
                        }
                        if (!empty($report6)){
                            array_push($r2,1);
                        }
                        if (!empty($report7)){
                            array_push($r3,1);
                        }
                        if (!empty($report8)){
                            array_push($r3,1);
                        }
                        if (!empty($report9)){
                            array_push($r3,1);
                        }
                        if (!empty($report10)){
                            array_push($r3,1);
                        }
                        if (!empty($report11)){
                            array_push($r3,1);
                        }
                        if (!empty($report12)){
                            array_push($r3,1);
                        }
                        if (!empty($report13)){
                            array_push($r3,1);
                        }
                        if (!empty($report14)){
                            array_push($r3,1);
                        }
                        if (!empty($report15)){
                            array_push($r3,1);
                        }
                        if (!empty($report16)){
                            array_push($r4,1);
                        }
                        if (!empty($report17)){
                            array_push($r4,1);
                        }
                        if (!empty($report18)){
                            array_push($r5,1);
                        }
                        if (!empty($report19)){
                            array_push($r5,1);
                        }
                        if (!empty($report20)){
                            array_push($r5,1);
                        }
                        if (!empty($report21)){
                            array_push($r5,1);
                        }
                        if (!empty($report22)){
                            array_push($r5,1);
                        }
                        if (!empty($report23)){
                            array_push($r6,1);
                        }
                        if (!empty($report24)){
                            array_push($r6,1);
                        }
                        if (!empty($report25)){
                            array_push($r6,1);
                        }
                        if (!empty($report26)){
                            array_push($r6,1);
                        }
                        if (!empty($report27)){
                            array_push($r6,1);
                        }
                        if (!empty($report28)){
                            array_push($r6,1);
                        }
                        if (!empty($report29)){
                            array_push($r7,1);
                        }
                        if (!empty($report30)){
                            array_push($r7,1);
                        }
                        if (!empty($report31)){
                            array_push($r7,1);
                        }
                        if (!empty($report32)){
                            array_push($r7,1);
                        }
                        if (!empty($report33)){
                            array_push($r8,1);
                        }
                        if (!empty($report34)){
                            array_push($r8,1);
                        }
                        if (!empty($report35)){
                            array_push($r8,1);
                        }
                        if (!empty($report36)){
                            array_push($r8,1);
                        }

                        if (count($r1)/$course1 == 1){
                            $hastaken+=1;
                        }
                        if (count($r2)/$course2 == 1){
                            $hastaken+=1;
                        }
                        if (count($r3)/$course3 == 1){
                            $hastaken+=1;
                        }
                        if (count($r4)/$course4 == 1){
                            $hastaken+=1;
                        }
                        if (count($r5)/$course5 == 1){
                            $hastaken+=1;
                        }
                        if (count($r6)/$course6 == 1){
                            $hastaken+=1;
                        }
                        if (count($r7)/$course7 == 1){
                            $hastaken+=1;
                        }
                        if (count($r8)/$course8 == 1){
                            $hastaken+=1;
                        }
                        if($unit_taken>0){
                            $checkToExam = $hastaken/$unit_taken;
                        }
                    @endphp

                    @if($hastaken != $unit_taken)
                        @if($hastaken == 0)
                            <strong class="text-danger">{{$hastaken}}/{{$unit_taken}}</strong>
                        @else
                            <strong class="text-warning">{{$hastaken}}/{{$unit_taken}}</strong>
                        @endif
                    @else
                        <strong class="text-success">{{$hastaken}}/{{$unit_taken}}</strong>
                    @endif
                    @endif
                    @if($unit_taken > 0)
                        @if($checkToExam == 1)
                            You can take the exam now
                            <a href="{{route('siswa.getexam')}}" class="btn btn-sm btn-primary">Take Final Exam</a>
                        @else
                            <form>
                                @csrf
                                <button type="submit" name="submit" class="btn btn-sm btn-outline-secondary" disabled>Take Final Exam</button>
                            </form>
                        @endif
                    @else
                        You can take the exam now
                        <a href="{{route('siswa.getexam')}}" class="btn btn-sm btn-primary">Take Final Exam</a>
                    @endif


                </h6>
            </div>
        </div>
        <div class="row">
            <table class="data-table stripe hover nowrap">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Unit Name</th>
                    <th>Total Course</th>
                    <th>Your Pretest Score</th>
                    <th>Status</th>
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
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <td><p class="@if($score->jumlah_benar*20 == 60) text-warning @else text-danger @endif">{{$score->jumlah_benar*20}}% - <strong>Needs Improvement</strong></p></td>
                                            <td>
                                                @if(count($r1) == $course1)
                                                    <p class="text-success">Finished</p>
                                                @else
                                                    <p class="text-danger">Not Finished</p>
                                                @endif
                                            </td>
                                        @else
                                            @if($score->jumlah_benar*20 == 100)
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You are Brilliant!</p></td>
                                                <td>
                                                    <p class="text-success">Finished</p>
                                                </td>
                                            @else
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You have Passed</p></td>
                                            <td>
                                                <p class="text-success">Finished</p>
                                            </td>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach

                            <td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course1}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">@if(count($r1) == $course1) Retake @else Take Course @endif</button>
                                            </form>
                                        @else
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course1}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary btn-block">Learn Again</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 2)
                            <td>{{$course2}}</td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <td><p class="@if($score->jumlah_benar*20 == 60) text-warning @else text-danger @endif">{{$score->jumlah_benar*20}}% - <strong>Needs Improvement</strong></p></td>
                                            <td>
                                                @if(count($r2) == $course2)
                                                    <p class="text-success">Finished</p>
                                                @else
                                                    <p class="text-danger">Not Finished</p>
                                                @endif
                                            </td>
                                        @else
                                            @if($score->jumlah_benar*20 == 100)
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You are Brilliant!</p></td>
                                                <td>
                                                    <p class="text-success">Finished</p>
                                                </td>
                                            @else
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You have Passed</p></td>
                                                <td>
                                                    <p class="text-success">Finished</p>
                                                </td>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            <td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course2}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">@if(count($r2) == $course2) Retake @else Take Course @endif</button>
                                            </form>
                                        @else
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course2}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary btn-block">Learn Again</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 3)
                            <td>{{$course3}}</td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <td><p class="@if($score->jumlah_benar*20 == 60) text-warning @else text-danger @endif">{{$score->jumlah_benar*20}}% - <strong>Needs Improvement</strong></p></td>
                                            <td>@if(count($r3) == $course3)<p class="text-success">Finished</p>@else <p class="text-danger">Not Finished</p> @endif</td>
                                        @else
                                            @if($score->jumlah_benar*20 == 100)
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You are Brilliant!</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @else
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You have Passed</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            <td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course3}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">@if(count($r3) == $course3) Retake @else Take Course @endif</button>
                                            </form>
                                        @else
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course3}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary btn-block">Learn Again</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 4)
                            <td>{{$course4}}</td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <td><p class="@if($score->jumlah_benar*20 == 60) text-warning @else text-danger @endif">{{$score->jumlah_benar*20}}% - <strong>Needs Improvement</strong></p></td>
                                            <td>@if(count($r4) == $course4)<p class="text-success">Finished</p>@else <p class="text-danger">Not Finished</p> @endif</td>
                                        @else
                                            @if($score->jumlah_benar*20 == 100)
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You are Brilliant!</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @else
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You have Passed</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            <td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course4}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">@if(count($r4) == $course4) Retake @else Take Course @endif</button>
                                            </form>
                                        @else
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course4}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary btn-block">Learn Again</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 5)
                            <td>{{$course5}}</td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <td><p class="@if($score->jumlah_benar*20 == 60) text-warning @else text-danger @endif">{{$score->jumlah_benar*20}}% - <strong>Needs Improvement</strong></p></td>
                                            <td>@if(count($r5) == $course5)<p class="text-success">Finished</p>@else <p class="text-danger">Not Finished</p> @endif</td>
                                        @else
                                            @if($score->jumlah_benar*20 == 100)
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You are Brilliant!</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @else
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You have Passed</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            <td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course5}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">@if(count($r5) == $course5) Retake @else Take Course @endif</button>
                                            </form>
                                        @else
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course5}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary btn-block">Learn Again</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 6)
                            <td>{{$course6}}</td>

                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <td><p class="@if($score->jumlah_benar*20 == 60) text-warning @else text-danger @endif">{{$score->jumlah_benar*20}}% - <strong>Needs Improvement</strong></p></td>
                                            <td>@if(count($r6) == $course6)<p class="text-success">Finished</p>@else <p class="text-danger">Not Finished</p> @endif</td>
                                        @else
                                            @if($score->jumlah_benar*20 == 100)
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You are Brilliant!</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @else
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You have Passed</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            <td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course6}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">@if(count($r6) == $course6) Retake @else Take Course @endif</button>
                                            </form>
                                        @else
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course6}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary btn-block">Learn Again</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 7)
                            <td>{{$course7}}</td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <td><p class="@if($score->jumlah_benar*20 == 60) text-warning @else text-danger @endif">{{$score->jumlah_benar*20}}% - <strong>Needs Improvement</strong></p></td>
                                            <td>@if(count($r7) == $course7)<p class="text-success">Finished</p>@else <p class="text-danger">Not Finished</p> @endif</td>
                                        @else
                                            @if($score->jumlah_benar*20 == 100)
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You are Brilliant!</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @else
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You have Passed</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            <td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course7}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">@if(count($r7) == $course7) Retake @else Take Course @endif</button>
                                            </form>
                                        @else
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course7}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary btn-block">Learn Again</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @elseif($unit->id == 8)
                            <td>{{$course8}}</td>

                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)
                                            <td><p class="@if($score->jumlah_benar*20 == 60) text-warning @else text-danger @endif">{{$score->jumlah_benar*20}}% - <strong>Needs Improvement</strong></p></td>
                                            <td>@if(count($r8) == $course8)<p class="text-success">Finished</p>@else <p class="text-danger">Not Finished</p> @endif</td>
                                        @else
                                            @if($score->jumlah_benar*20 == 100)
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You are Brilliant!</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @else
                                                <td><p class="text-success">{{$score->jumlah_benar*20}}% - You have Passed</p></td>
                                                <td><p class="text-success">Finished</p></td>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            <td>
                                @foreach($nilaiPretest as $score)
                                    @if($score->id_unit == $unit->id)
                                        @if($score->jumlah_benar*20 < 70)

                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course8}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-block">@if(count($r8) == $course8) Retake @else Take Course @endif</button>
                                            </form>
                                        @else
                                            <form method="post" action="/siswa/units/{{$unit->id}}/{{$course8}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary btn-block">Learn Again</button>
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
