@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        @php
            function ordinal($number) {
                $ends = array('th','st','nd','rd','th','th','th','th','th','th');
                if ((($number % 100) >= 11) && (($number%100) <= 13))
                    return $number. 'th';
                else
                    return $number. $ends[$number % 10];
            }
        @endphp
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">{{$detailreport->name}}</h4>
                <p class="mb-30 font-14">{{$detailreport->description}}</p>
            </div>
            <div class="pull-right">
                <a href="{{route('pengajar.unitrecords.detail',['id_unit'=>$detailreport->id_unit])}}" class="btn btn-dark btn-sm">Get Back</a>
            </div>
        </div>
        <form>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Trial Count</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{{ordinal($detailreport->try_count)}} trial" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Course Type</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="@if($detailreport->tipe_soal ==1)Video Tutor @elseif($detailreport->tipe_soal ==2)Live Coding @else Theory Session @endif" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Error Type</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="@if($detailreport->error_type === null) Not Match Answer @else {{$detailreport->error_type}} @endif" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Correct Answer</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{{$detailreport->answer}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Student's Answer</label>
                <div class="col-sm-12 col-md-10">
                    <textarea class="form-control" disabled>{{$detailreport->jawaban_siswa}}</textarea>
                </div>
            </div>
        </form>
    </div>
@endsection
