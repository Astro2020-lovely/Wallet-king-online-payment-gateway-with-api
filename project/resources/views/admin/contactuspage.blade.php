@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Contact Page Content -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Contact Page Content</h2>
                                    </div>
                                    <hr/>
                                    @if(Session::has('message'))
                                        <div class="alert alert-success alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{action('PageSettingsController@contact')}}" class="form-horizontal form-label-left">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="disable/enable_contact_page">Disable/Enable Contact Page *</label>
                                            <div class="col-sm-3">
                                                @if($pagedata->c_status == 1)
                                                    <label class="switch">
                                                        <input type="checkbox" name="c_status" value="1"  checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" name="c_status" value="1" >
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="contact_form_success_text">Contact Form Success Text *</label>
                                            <div class="col-sm-8">
                                                <textarea name="contact" id="contact_form_success_text" class="form-control" style="resize: vertical;" placeholder="Contact Form Success Text" required>{{$pagedata->contact}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="contact_us_email_address">Contact Us Email Address * <span>Separate by Comma(,) for Multiple Email</span></label>
                                            <div class="col-sm-8">
                                                <textarea name="contact_email" id="contact_us_email_address" class="form-control" style="resize: vertical;" placeholder="Contact Us Email Address" required>{{$pagedata->contact_email}}</textarea>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update Contact Page</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard FAQ Page -->


                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop