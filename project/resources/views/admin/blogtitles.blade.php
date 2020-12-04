@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Service Section Title Text -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Blog Section Title Text</h2>
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
                                    <form method="POST" action="{{url('admin/blog/titles')}}" class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_secttion_title">Blog Secttion Title *</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="blog_title" id="service_secttion_title" placeholder="Blog Section Titles" value="{{$languages->blog_title}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_secttion_text">Service Secttion Text *</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="blog_text" id="service_secttion_text" placeholder="Blog Sections Text" style="resize: vertical;">{{$languages->blog_text}}</textarea>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update text</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Service Section Title Text -->


                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')

@stop