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
                                        <h2>Add New Staff</h2>
                                        <a href="{!! url('admin/staffs') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <div id="response">
                                        @if($errors->has('photo'))
                                            <div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ $errors->first('photo') }}
                                            </div>
                                        @endif
                                        @if($errors->has('email'))
                                            <div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                        @if($errors->has('password'))
                                            <div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form method="POST" action="{!! action('StaffController@store') !!}" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_title">Staff Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="name" id="service_title" placeholder="e.g John Doe" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_icon">Staff Photo*</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="photo" id="service_icon" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_text">Staff Email* <span>(Will be used for login)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="email" placeholder="Enter Staffs Phone Number" id="service_title" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_title3">Phone Number* </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="phone" autocomplete="off" placeholder="Enter Staffs Phone Number" id="service_title3">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_title2">Password* <span>(Will be used for login)</span></label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Enter Staffs Password" id="service_title2" required>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Add New Staff</button>
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
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true}).panelInstance('content1');
        });
    </script>
@stop