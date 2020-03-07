@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Unit Course Record</h5>
            </div>
        </div>
        <div class="row">
            <table class="stripe hover multiple-select-row data-table-export nowrap">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Unit Description</th>
                    <th>Learning Outcome</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($units as $unit)
                    <tr>
                        <td>{{$unit->id}}</td>
                        <td align="center">{{$unit->name}}</td>
                        @if($unit->id == 1)
                            <td><span>Peserta didik mampu mengenal struktur folder,<br>
                                    dan sintaks dasar dari bahasa PHP script beserta<br>
                                    cara menginstal PHP di komputer</span></td>
                        @elseif($unit->id == 2)
                            <td><span>Peserta didik mampu membuat dan mengoperasikan<br>
                                    variabel pada bahasa PHP script</span></td>
                        @elseif($unit->id == 3)
                            <td><span>Peserta didik mampu memahami, dan mengoperasikan<br>
                                    berbagai macam tipe data dengan bahasa PHP script</span></td>
                        @elseif($unit->id == 4)
                            <td><span>Peserta didik mampu memahami berbagai macam <br>
                                    operator aritmatika serta mampu membuat <br>
                                    operasi aritmatika dengan bahasa PHP script</span></td>
                        @elseif($unit->id == 5)
                            <td><span>Peserta didik mampu mengenal dan memahami <br>
                                    serta dapat mengoperasikan bermacam - macam <br>
                                    tipe array pada bahasa PHP script</span></td>
                        @elseif($unit->id == 6)
                            <td><span>Peserta didik mampu memahami <br>
                                    bermacam - macam jenis percabangan dan mampu <br>
                                    membuat operasi kondisional dengan <br>
                                    bahasa PHP script</span></td>
                        @elseif($unit->id == 7)
                            <td><span>Peserta didik mampu memahami <br>
                                    fungsi dari looping dan membuat operasi <br>
                                    perulangan(looping) dengan bahasa PHP script</span></td>
                        @else
                            <td><span>Peserta didik mampu membuat, mengoperasikan <br>
                                    serta memahami variabel super global pada <br>
                                    bahasa PHP script</span></td>
                        @endif
                        <td><a href="{{route('pengajar.unitrecords.detail',['id_unit'=> $unit->id])}}" class="btn btn-outline-success"><i class="fa fa-eye"> See Detail</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
