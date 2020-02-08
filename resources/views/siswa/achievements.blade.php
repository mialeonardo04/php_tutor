@extends('layout.masterdashboard')
@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Achievement</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href=/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Student Achievement</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-30">
                <div class="pd-20 bg-white border-radius-4 box-shadow">
                    <div class="profile-photo">
                        {{--<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>--}}
                        <img src="@if(Auth::user()->photo_name === NULL){{asset('theme/vendors/images/default_avatar.jpg')}} @else {{ URL::to('/') }}/images/{{Auth::user()->photo_name}} @endif" alt="" class="avatar-photo">
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pd-5">
                                        <div class="img-container">
                                            <img id="image" src="{{ asset('theme/vendors/images/photo2.jpg')}}" alt="Picture">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Update" class="btn btn-primary">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-center">{{Auth::user()->name}}</h5>
                    <p class="text-center text-muted">@if(Auth::user()->verified == 1) <span class="text-success">verified account</span> @endif</p>
                    <div class="profile-info">
                        <h5 class="mb-20 weight-500">User Information</h5>
                        <ul>
                            <li>
                                <span>Email Address:</span>
                                {{Auth::user()->email}}
                            </li>
                            <li>
                                <span>Username:</span>
                                {{Auth::user()->username}}
                            </li>
                            <li>
                                <span>Major:</span>
                                Informatics and Computer Engineering Education
                            </li>
                            <li>
                                <span>College:</span>
                                Universitas Sebelas Maret<br>
                                Surakarta
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 mb-30">
                <div class="bg-white border-radius-4 box-shadow height-100-p">
                    <div class="profile-tab height-100-p">
                        <div class="tab height-100-p">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">By Unit</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">By Course</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Timeline Tab start -->
                                <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                                    <div class="pd-20">
                                        <div class="profile-timeline">
                                            <div class="timeline-month">
                                                <h5>August, 2017</h5>
                                            </div>
                                            <div class="profile-timeline-list">
                                                <ul>
                                                    <li>
                                                        <div class="date">12 Aug</div>
                                                        <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 Aug</div>
                                                        <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 Aug</div>
                                                        <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 Aug</div>
                                                        <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="timeline-month">
                                                <h5>July, 2017</h5>
                                            </div>
                                            <div class="profile-timeline-list">
                                                <ul>
                                                    <li>
                                                        <div class="date">12 July</div>
                                                        <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 July</div>
                                                        <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 July</div>
                                                        <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 July</div>
                                                        <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">12 July</div>
                                                        <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 July</div>
                                                        <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="timeline-month">
                                                <h5>June, 2017</h5>
                                            </div>
                                            <div class="profile-timeline-list">
                                                <ul>
                                                    <li>
                                                        <div class="date">12 June</div>
                                                        <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 June</div>
                                                        <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 June</div>
                                                        <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 June</div>
                                                        <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 June</div>
                                                        <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 June</div>
                                                        <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                    <li>
                                                        <div class="date">10 June</div>
                                                        <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        <div class="task-time">09:30 am</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Timeline Tab End -->
                                <!-- Tasks Tab start -->
                                <div class="tab-pane fade" id="tasks" role="tabpanel">
                                    <div class="pd-20 profile-task-wrap">
                                        <div class="container pd-0">
                                            <!-- Open Task start -->
                                            <div class="task-title row align-items-center">
                                                <div class="col-md-8 col-sm-12">
                                                    <h5>Open Tasks (4 Left)</h5>
                                                </div>
                                                <div class="col-md-4 col-sm-12 text-right">
                                                    <a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Add</a>
                                                </div>
                                            </div>
                                            <div class="profile-task-list pb-30">
                                                <ul>
                                                    <li>
                                                        <div class="custom-control custom-checkbox mb-5">
                                                            <input type="checkbox" class="custom-control-input" id="task-1">
                                                            <label class="custom-control-label" for="task-1"></label>
                                                        </div>
                                                        <div class="task-type">Email</div>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id ea earum.
                                                        <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox mb-5">
                                                            <input type="checkbox" class="custom-control-input" id="task-2">
                                                            <label class="custom-control-label" for="task-2"></label>
                                                        </div>
                                                        <div class="task-type">Email</div>
                                                        Lorem ipsum dolor sit amet.
                                                        <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox mb-5">
                                                            <input type="checkbox" class="custom-control-input" id="task-3">
                                                            <label class="custom-control-label" for="task-3"></label>
                                                        </div>
                                                        <div class="task-type">Email</div>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox mb-5">
                                                            <input type="checkbox" class="custom-control-input" id="task-4">
                                                            <label class="custom-control-label" for="task-4"></label>
                                                        </div>
                                                        <div class="task-type">Email</div>
                                                        Lorem ipsum dolor sit amet. Id ea earum.
                                                        <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Open Task End -->
                                            <!-- Close Task start -->
                                            <div class="task-title row align-items-center">
                                                <div class="col-md-12 col-sm-12">
                                                    <h5>Closed Tasks</h5>
                                                </div>
                                            </div>
                                            <div class="profile-task-list close-tasks">
                                                <ul>
                                                    <li>
                                                        <div class="custom-control custom-checkbox mb-5">
                                                            <input type="checkbox" class="custom-control-input" id="task-close-1" checked="" disabled="">
                                                            <label class="custom-control-label" for="task-close-1"></label>
                                                        </div>
                                                        <div class="task-type">Email</div>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id ea earum.
                                                        <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox mb-5">
                                                            <input type="checkbox" class="custom-control-input" id="task-close-2" checked="" disabled="">
                                                            <label class="custom-control-label" for="task-close-2"></label>
                                                        </div>
                                                        <div class="task-type">Email</div>
                                                        Lorem ipsum dolor sit amet.
                                                        <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox mb-5">
                                                            <input type="checkbox" class="custom-control-input" id="task-close-3" checked="" disabled="">
                                                            <label class="custom-control-label" for="task-close-3"></label>
                                                        </div>
                                                        <div class="task-type">Email</div>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox mb-5">
                                                            <input type="checkbox" class="custom-control-input" id="task-close-4" checked="" disabled="">
                                                            <label class="custom-control-label" for="task-close-4"></label>
                                                        </div>
                                                        <div class="task-type">Email</div>
                                                        Lorem ipsum dolor sit amet. Id ea earum.
                                                        <div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Close Task start -->
                                            <!-- add task popup start -->
                                            <div class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Tasks Add</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body pd-0">
                                                            <div class="task-list-form">
                                                                <ul>
                                                                    <li>
                                                                        <form>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-4">Task Type</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-4">Task Message</label>
                                                                                <div class="col-md-8">
                                                                                    <textarea class="form-control"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-4">Assigned to</label>
                                                                                <div class="col-md-8">
                                                                                    <select class="selectpicker form-control" data-style="btn-outline-primary" title="Not Chosen" multiple="" data-selected-text-format="count" data-count-selected-text= "{0} people selected">
                                                                                        <option>Ferdinand M.</option>
                                                                                        <option>Don H. Rabon</option>
                                                                                        <option>Ann P. Harris</option>
                                                                                        <option>Katie D. Verdin</option>
                                                                                        <option>Christopher S. Fulghum</option>
                                                                                        <option>Matthew C. Porter</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row mb-0">
                                                                                <label class="col-md-4">Due Date</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control date-picker">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;" class="remove-task"  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Remove Task"><i class="ion-minus-circled"></i></a>
                                                                        <form>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-4">Task Type</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-4">Task Message</label>
                                                                                <div class="col-md-8">
                                                                                    <textarea class="form-control"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-4">Assigned to</label>
                                                                                <div class="col-md-8">
                                                                                    <select class="selectpicker form-control" data-style="btn-outline-primary" title="Not Chosen" multiple="" data-selected-text-format="count" data-count-selected-text= "{0} people selected">
                                                                                        <option>Ferdinand M.</option>
                                                                                        <option>Don H. Rabon</option>
                                                                                        <option>Ann P. Harris</option>
                                                                                        <option>Katie D. Verdin</option>
                                                                                        <option>Christopher S. Fulghum</option>
                                                                                        <option>Matthew C. Porter</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row mb-0">
                                                                                <label class="col-md-4">Due Date</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control date-picker">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="add-more-task">
                                                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary">Add</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- add task popup End -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Tasks Tab End -->
                                <!-- Setting Tab start -->
                                <!--gaada-->
                                <!-- Setting Tab End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
