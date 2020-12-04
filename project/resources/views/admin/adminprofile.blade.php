@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard add-product-1 area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Admin Profile</h2>
                                    </div>
                                    <hr/>
                                    <div id="response" class="col-md-12">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form method="POST" action="{!! action('AdminProfileController@update',['id' => $admin->id]) !!}" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="admin_current_photo">Current Photo *</label>
                                            <div class="col-sm-3">
                                                <img id="adminimg" src="{{url('/')}}/assets/images/admin/{{$admin->photo}}" alt="">
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="hidden" onchange="readURL(this)" id="uploadFile" name="photo" type="file">
                                                <button name="admin_image_btn" id="uploadTrigger" onclick="uploadclick()" type="button" class="btn btn-block add-product_btn adminImg-btn"><i class="fa fa-upload"></i> Change Photo</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="admin_name">Admin Name *</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="name" value="{{$admin->name}}" id="admin_name" placeholder="Admin Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="admin_email_address">Email Address *</label>
                                            <div class="col-sm-8">
                                                @if($admin->role == "administrator")
                                                    <input type="email" class="form-control" name="email" value="{{$admin->email}}" id="admin_email_address" placeholder="Email Address" required>
                                                @else
                                                    <input type="email" class="form-control" name="email" value="{{$admin->email}}" id="admin_email_address" placeholder="Email Address" required disabled>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="admin_phone_number">Phone Number *</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="phone" value="{{$admin->phone}}" id="admin_phone_number" placeholder="Phone Number" required>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Update Profile</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard add-product-1 area -->


                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')
<script>
    function uploadclick(){
        $("#uploadFile").click();
        $("#uploadFile").change(function(event) {
            $("#uploadTrigger").html($("#uploadFile").val());
        });
    }

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#adminimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@stop