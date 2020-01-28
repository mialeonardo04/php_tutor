@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Profile</h4>
                <p></p>
            </div>
        </div>
        <form method="POST" action="/update/{{Auth::user()->id}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="name" type="text" value="{{Auth::user()->name}}" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Username<span class="text-danger"> *</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{{Auth::user()->username}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">E-mail Address<span class="text-danger"> *</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{{Auth::user()->email}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Role Type<span class="text-danger"> *</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{{Auth::user()->roles[0]['description']}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Avatar<span class="text-danger"> **</span></label>
                <div class="col-sm-12 col-md-10">
                    <input type="file" name="fileku" onchange="readURL(this);" required class="form-control-file form-control height-auto">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"></label>
                <div class="col-sm-12 col-md-10">
                    <img src="@if(Auth::user()->photo_name === NULL) {{asset('theme/vendors/images/default_avatar.jpg')}} @endif" id="create" alt="" width="200" height="250">
                </div>
            </div>
            <div class="form-group row">
            </div>
            <p class="margin-5 text-danger font-12">*caution: Unique data, can not be changed</p>
            <p class="text-danger font-12">**caution: file extension allowed: jpeg, jpg, or png</p>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"></label>
                <div class="col-sm-12 col-md-10 text-right">
                    <button class="btn btn-primary btn-lg" name="submit" type="submit">
                        Update
                    </button>
                    <a href="/" class="btn btn-danger btn-lg">
                        Cancel
                    </a>
                </div>

            </div>
        </form>
        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#create')
                            .attr('src', e.target.result)
                            .width(200)
                            .height(250);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </div>
@endsection
