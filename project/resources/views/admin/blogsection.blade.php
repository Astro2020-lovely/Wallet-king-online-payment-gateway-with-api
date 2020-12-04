@extends('admin.includes.masterpage-admin')

@section('content')


    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard orders data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box customers">
                                    <div class="add-product-header">
                                        <h2>Blog Section</h2>
                                        <a href="{!! url('admin/blog/create') !!}" class="add-newProduct-btn"><i class="fa fa-plus"></i> Add New Blog</a>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive">
                                        <div id="response" class="col-md-12">
                                            @if(Session::has('message'))
                                                <div class="alert alert-success alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    {{ Session::get('message') }}
                                                </div>
                                            @endif
                                        </div>
                                        <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Featured Image</th>
                                                <th>Blog Title</th>
                                                <th width="15%">Blog Details</th>
                                                <th>Views</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($blogs as $blog)
                                                <tr>
                                                    <td><img style="max-width: 300px;" src="{{url('/assets/images/blog')}}/{{$blog->featured_image}}" alt="" class="service-icon"></td>
                                                    <td>{{$blog->title}}</td>
                                                    <td>{{substr(strip_tags($blog->details),0,100)}}</td>
                                                    <td>{{$blog->views}}</td>
                                                    <td>
                                                        <form method="POST" action="{!! action('BlogController@destroy',['id' => $blog->id]) !!}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="blog/{{$blog->id}}/edit" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit </a>
                                                            <button type="submit" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard orders data-table area -->

                </div>
            </div>
        </div>
    </div>




    {{--<div id="page-wrapper">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row" id="main">--}}

                {{--<!-- Page Heading -->--}}
                {{--<div class="go-title">--}}
                    {{--<h3>Blog Section</h3>--}}
                    {{--<div class="go-line"></div>--}}
                {{--</div>--}}
                {{--<!-- Page Content -->--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-body">--}}
                        {{--<div id="res">--}}
                            {{--@if(Session::has('message'))--}}
                                {{--<div class="alert alert-success alert-dismissable">--}}
                                    {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                                    {{--{{ Session::get('message') }}--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<!-- /.start -->--}}
                        {{--<div class="col-md-12">--}}
                            {{--<ul class="nav nav-tabs tabs-left">--}}
                                {{--<li class="active"><a href="#sectioncontent" data-toggle="tab" aria-expanded="false"><strong>Blog Section Content</strong></a>--}}
                                {{--<li><a href="#sectiontitle" data-toggle="tab" aria-expanded="true"><strong>Blog Section Title</strong></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}

                        {{--<div class="col-xs-12" style="padding: 0">--}}
                            {{--<!-- Tab panes -->--}}
                            {{--<div class="tab-content">--}}
                                {{--<div class="tab-pane" id="sectiontitle">--}}
                                    {{--<div class="go-title">--}}
                                        {{--<h3>Blog Section Title Text</h3>--}}
                                        {{--<div class="go-line"></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="panel panel-default">--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<form method="POST" action="blog/titles" class="form-horizontal form-label-left" id="website_form">--}}
                                                {{--{{csrf_field()}}--}}
                                                {{--<div class="item form-group">--}}
                                                    {{--<label class="control-label col-md-4 col-sm-4 col-xs-12" for="title"> Blog Secttion Title <span class="required">*</span>--}}
                                                    {{--</label>--}}
                                                    {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                                        {{--<input class="form-control col-md-7 col-xs-12" name="blog_title" placeholder="Blog Title" required="required" type="text" value="{{$language->blog_title}}">--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="item form-group">--}}
                                                    {{--<label class="control-label col-md-4 col-sm-4 col-xs-12" for="title"> Blog Secttion Text <span class="required">*</span>--}}
                                                    {{--</label>--}}
                                                    {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                                        {{--<textarea rows="6" class="form-control" name="blog_text">{{$language->blog_text}}</textarea>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<div class="ln_solid"></div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<div class="col-md-6 col-md-offset-4">--}}
                                                        {{--<button type="submit" class="btn btn-primary btn-add">Update Text</button>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</form>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="tab-pane active" id="sectioncontent">--}}
                                    {{--<div class="go-title">--}}
                                        {{--<div class="pull-right">--}}
                                            {{--<a href="{!! url('admin/blog/create') !!}" class="btn btn-primary btn-add"><i class="fa fa-plus"></i> Add Blog</a>--}}
                                        {{--</div>--}}
                                        {{--<h3>Blog Members</h3>--}}
                                        {{--<div class="go-line"></div>--}}
                                    {{--</div>--}}
                                    {{--<!-- Page Content -->--}}
                                    {{--<div class="panel panel-default">--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<table class="table table-striped table-bordered" cellspacing="0" id="example" width="100%">--}}
                                                {{--<thead>--}}
                                                {{--<tr>--}}
                                                    {{--<th>Featured Image</th>--}}
                                                    {{--<th>Blog Title</th>--}}
                                                    {{--<th width="15%">Blog Details</th>--}}
                                                    {{--<th>Views</th>--}}
                                                    {{--<th>Actions</th>--}}
                                                {{--</tr>--}}
                                                {{--</thead>--}}
                                                {{--<tbody>--}}
                                                {{--@foreach($blogs as $blog)--}}
                                                    {{--<tr>--}}
                                                        {{--<td><img src="{{url('/assets/images/blog')}}/{{$blog->featured_image}}" alt="" class="service-icon"></td>--}}
                                                        {{--<td>{{$blog->title}}</td>--}}
                                                        {{--<td>{{substr(strip_tags($blog->details),0,100)}}</td>--}}
                                                        {{--<td>{{$blog->views}}</td>--}}
                                                        {{--<td>--}}
                                                            {{--<form method="POST" action="{!! action('BlogController@destroy',['id' => $blog->id]) !!}">--}}
                                                                {{--{{csrf_field()}}--}}
                                                                {{--<input type="hidden" name="_method" value="DELETE">--}}
                                                                {{--<a href="blog/{{$blog->id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit </a>--}}
                                                                {{--<button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove </button>--}}
                                                            {{--</form>--}}
                                                        {{--</td>--}}
                                                    {{--</tr>--}}
                                                {{--@endforeach--}}
                                                {{--</tbody>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- /.end -->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.row -->--}}
    {{--</div>--}}
    {{--<!-- /.container-fluid -->--}}
    {{--</div>--}}
    {{--<!-- /#page-wrapper -->--}}

@stop

@section('footer')

@stop