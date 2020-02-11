@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Student Record</h5>
                <p class="font-14 text-danger">*caution: select row for detail!</p>
            </div>
        </div>
        {{--{{print_r($students)}}--}}
        <div class="row">
            <table class="stripe hover multiple-select-row data-table-export nowrap">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Pretest(avg)</th>
                    <th>Exercise (avg)</th>
                    <th>Final Score</th>
                    <th>Unit Taken</th>
                    <th>IP Address</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr data-href="{{route('pengajar.detail.datasiswa',['id_user'=> $student->id_user,'id_student'=>$student->id])}}">
                            <td>{{$student->name}}</td>
                            @if($student->avg_pretest === NULL)
                                <td><p class="text-danger">NO DATA</p></td>
                            @else
                                <td align="center">{{$student->avg_pretest}}%</td>
                            @endif
                            @if($student->avg_exercise === NULL)
                                <td><p class="text-danger">NO DATA</p></td>
                            @else
                                <td align="center">{{$student->avg_exercise}}%</td>
                            @endif
                            @if($student->nilai_final === NULL)
                                <td><p class="text-danger">NO DATA</p></td>
                            @else
                                <td align="center">{{$student->nilai_final}}%</td>
                            @endif
                            @if($student->avg_pretest === NULL)
                                <td><p class="text-danger">UNKNOWN</p></td>
                            @else
                                <td>{{$student->unit_start}} chapter(s)</td>
                            @endif
                            <td>{{$student->last_login_ip}}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <script>
                document.addEventListener("DOMContentLoaded",()=>{
                   const rows = document.querySelectorAll("tr[data-href]");

                   rows.forEach(row => {
                        row.addEventListener("click",()=>{
                           window.location.href = row.dataset.href;
                        });
                   });
                });
            </script>
        </div>
        <p class="font-14 text-danger">*caution: select row for detail!</p>
    </div>
@endsection
