@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Course Units</h5>
            </div>
        </div>
        <div class="row">
            <table class="stripe hover multiple-select-row data-table-export nowrap">
                <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Unit Name</th>
                    <th>Number of Courses</th>
                    <th>See Detail</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($units as $unit)
                        <tr>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
