@extends('admin.includes.masterpage-admin')

@section('content')
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Website Logo -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Website Contents</h2>
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
                                    <form method="POST" action="title" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title">Website Title *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="title" value="{{$setting[0]->title}}" id="website_title" class="form-control" placeholder="Website Title" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title1">Currency Sign *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="currency_sign" value="{{$setting[0]->currency_sign}}" id="website_title1" class="form-control" placeholder="Currency Sign" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title2">Currency Code *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="currency_code" value="{{$setting[0]->currency_code}}" id="website_title2" class="form-control" placeholder="Currency Code" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="add-product-header">
                                                <h3 style="margin-bottom: 0">Home Page Contents</h3>
                                            </div>
                                            <hr/>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Slider Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->slider_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="slider_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="slider_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Service Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->service_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="service_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="service_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Counter Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->counter_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="counter_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="counter_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Portfolio Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->portfolio_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="portfolio_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="portfolio_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Testimonial Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->testimonial_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="testimonial_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="testimonial_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Blog Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->blog_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="blog_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="blog_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update setting</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Website Logo -->


                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop