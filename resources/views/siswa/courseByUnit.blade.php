@extends('layout.mastercourse')
@section('content')
    <div class="row clearfix progress-box">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                <div class="project-info clearfix">
                    <div class="project-info-left">
                        <div class="icon box-shadow bg-blue text-white">
                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="project-info-right">
                        <span class="no text-blue weight-500 font-24">{{count($reports)}}/{{$total_course_perunit}}</span>
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
                            $width = (count($reports)/$total_course_perunit)*100;
                        @endphp
                        <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{$width}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                <div class="project-info clearfix">
                    <div class="project-info-left">
                        <div class="icon box-shadow bg-light-orange text-white">
                            <i class="fa fa-list-alt"></i>
                        </div>
                    </div>
                    <div class="project-info-right">
                        <span class="no text-light-orange weight-500 font-24">
                            @if(!empty($lastreport))
                                {{$lastreport->description}}
                            @else
                                Haven't taken any exercise
                            @endif
                        </span>
                        <p class="weight-400 font-18">Last Completed Exercise</p>
                    </div>
                </div>
                <div class="project-info-progress">
                    <div class="row clearfix">
                        <div class="col-sm-6 text-muted weight-500">Last Score</div>
                        <div class="col-sm-6 text-right weight-500 font-14 text-muted">
                            @if(!empty($lastreport))
                                @if($lastreport->score < 60)
                                    Bad
                                @elseif($lastreport->score >= 60 && $lastreport->score <= 80)
                                    Good
                                @elseif($lastreport->score >= 80 && $lastreport->score < 100)
                                    Excellent!
                                @else
                                    Perfect!
                                @endif
                            @else
                                -
                            @endif

                        </div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-light-orange progress-bar-striped progress-bar-animated" role="progressbar" style="width:@if(!empty($lastreport)){{$lastreport->score}}@endif%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
