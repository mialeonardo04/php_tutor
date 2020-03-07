@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Course Report</h5>
                <p class="font-14 text-danger">*caution: select row for detail!</p>
            </div>
            <div class="pull-right">
                <a href="{{route('pengajar.unitrecords')}}" class="btn btn-dark btn-sm">Get Back</a>
            </div>
        </div>
        <div class="row">
            <table class="data-table stripe hover multiple-select-row nowrap">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Student Name</th>
                    <th>Course Description</th>
                    <th>Course Type</th>
                    <th>Error Type</th>
                    <th>Score</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $no=0;
                @endphp
                @foreach($reports as $report)
                    <tr data-href="{{route('pengajar.detail.report.select',['id_report'=> $report->id])}}">
                        <td>@php $no++; echo $no @endphp</td>
                        <td>{{$report->name}}</td>
                        <td>{{$report->description}}</td>
                        <td>@if($report->tipe_soal == 1)
                                Video Tutor
                            @elseif($report->tipe_soal == 2)
                                Live Coding
                            @else
                                Theory Session
                            @endif
                        </td>
                        <td>@if($report->error_type === null)
                                -
                            @else
                                {{$report->error_type}}
                            @endif
                        </td>
                        <td>{{$report->score}}%</td>
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
    </div>
@endsection
