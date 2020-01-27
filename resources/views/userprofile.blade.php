@extends('layout.masterdashboard')
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Profile</h4>
                <p class="mb-30 font-14 text-danger">*caution: Unique data such as role, username or email can not be changed</p>
            </div>
        </div>
        <form>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{{Auth::user()->name}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{{Auth::user()->username}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">E-mail Address</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{{Auth::user()->email}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Role Type</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{{Auth::user()->roles[0]['description']}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Avatar</label>
                <div class="col-sm-12 col-md-10">
                    <input type="file" onchange="readURL(this);" class="form-control-file form-control height-auto">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"></label>
                <div class="col-sm-12 col-md-10">
                    <img src="@if(Auth::user()->photo_name === NULL) {{asset('theme/vendors/images/default_avatar.jpg')}} @endif" id="create" alt="" width="200" height="250">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"></label>
                <div class="col-sm-12 col-md-10 text-right">
                    <button class="btn btn-primary btn-lg" type="submit">
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
