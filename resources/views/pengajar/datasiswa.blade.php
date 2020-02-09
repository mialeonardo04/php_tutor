@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">PHP Intelligent's Student </h5>
                <p class="font-14 text-danger">*caution: select row for detail!</p>
            </div>
        </div>
        {{--{{print_r($students)}}--}}
        <div class="row">
            <table class="stripe hover multiple-select-row data-table-export nowrap">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Pretest(avg)</th>
                    <th>Unit Taken</th>
                    <th>IP Address</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr data-href="{{route('pengajar.detail.datasiswa',['id_user'=> $student->id_user,'id_student'=>$student->id])}}">
                            <td>{{$student->name}}</td>
                            <td>{{$student->username}}</td>
                            <td>{{$student->email}}</td>
                            <td align="center">{{$student->avg_pretest}}%</td>
                            <td>{{$student->unit_start}} chapter(s)</td>
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
