@extends('layout.mastercourse')
@section('content')
    <div class="row clearfix progress-box">
        <div class="col-sm-12 col-md-12 col-lg-12 mb-30">
            <div class="card box-shadow">
                <div class="card-body">
                    <h5 class="card-title weight-500">Learning Outcome</h5>

                    @if($id_unit ==  1)
                        <p class="card-text">Peserta didik mampu mengenal struktur folder, dan sintaks dasar dari bahasa PHP <i>script</i> beserta cara menginstal PHP di komputer</p>
                    @elseif($id_unit ==  2)
                        <p class="card-text">Peserta didik mampu membuat dan mengoperasikan variabel pada bahasa PHP <i>script</i></p>
                    @elseif($id_unit ==  3)
                        <p class="card-text">Peserta didik mampu memahami, mengoperasikan berbagai macam tipe data dengan bahasa PHP <i>script</i></p>
                    @elseif($id_unit ==  4)
                        <p class="card-text">Peserta didik mampu memahami berbagai macam operator aritmatika serta mampu membuat operasi aritmatika dengan bahasa PHP <i>script</i></p>
                    @elseif($id_unit ==  5)
                        <p class="card-text">Peserta didik mampu mengenal dan memahami serta dapat mengoperasikan bermacam - macam tipe array pada bahasa PHP <i>script</i></p>
                    @elseif($id_unit ==  6)
                        <p class="card-text">Peserta didik mampu memahami bermacam - macam jenis percabangan dan mampu membuat operasi kondisional dengan bahasa PHP <i>script</i></p>
                    @elseif($id_unit ==  7)
                        <p class="card-text">Peserta didik mampu memahami fungsi dari looping dan membuat operasi perulangan(looping) dengan bahasa PHP <i>script</i></p>
                    @else
                        <p class="card-text">Peserta didik mampu membuat, mengoperasikan serta memahami variabel super global pada bahasa PHP <i>script</i></p>
                    @endif
                    <p class="card-text"><small class="text-muted pull-right">Good Luck:)</small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix progress-box">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
            <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                <div class="project-info clearfix">
                    <div class="project-info-left">
                        <div class="icon box-shadow bg-blue text-white">
                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                        </div>
                    </div>
                    @php
                        $countR = [];
                        if (!empty($reportsC1)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC2)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC3)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC4)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC5)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC6)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC7)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC8)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC9)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC10)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC11)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC12)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC13)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC14)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC15)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC16)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC17)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC18)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC19)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC20)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC21)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC22)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC23)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC24)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC25)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC26)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC27)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC28)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC29)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC30)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC31)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC32)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC33)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC34)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC35)){
                            array_push($countR,1);
                        }
                        if (!empty($reportsC36)){
                            array_push($countR,1);
                        }
                    @endphp
                    <div class="project-info-right">
                        <span class="no text-blue weight-500 font-24">{{count($countR)}}/{{$total_course_perunit}}</span>
                        <p class="weight-400 font-18">My Progress</p>
                    </div>
                </div>
                <div class="project-info-progress">
                    <div class="row clearfix">
                        <div class="col-sm-6 text-muted weight-500">Target</div>
                        <div class="col-sm-6 text-right weight-500 font-14 text-muted">{{$total_course_perunit}}</div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        @php
                            $width = (count($countR)/$total_course_perunit)*100;
                        @endphp
                        <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{$width}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
