@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard services data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header products">
                                        <h2>Portfolios</h2>
                                        <a href="{!! url('admin/portfolio/create') !!}" class="add-newProduct-btn"><i class="fa fa-plus"></i> add Portfolio</a>
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
                                        <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Portfolio Image</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($portfolios as $portfolio)
                                                <tr>
                                                    <td><img src="{{url('/assets/images/portfolio')}}/{{$portfolio->image}}" alt="" class="service-icon"></td>

                                                    <td>
                                                        <form method="POST" action="{!! action('PortfolioController@destroy',['id' => $portfolio->id]) !!}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            {{--<a href="service/{{$portfolio->id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit </a>--}}
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
                    <!-- Ending of Dashboard services data-table area -->

                </div>
            </div>
        </div>
    </div>



    {{--<div id="page-wrapper">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row" id="main">--}}

                {{--<!-- Page Heading -->--}}
                {{--<div class="go-title">--}}
                    {{--<h3>Portfolio Section</h3>--}}
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
                                {{--<li class="active"><a href="#sectioncontent" data-toggle="tab" aria-expanded="false"><strong>Portfolio Section Content</strong></a>--}}
                                {{--<li><a href="#sectiontitle" data-toggle="tab" aria-expanded="true"><strong>Portfolio Section Title</strong></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}

                        {{--<div class="col-xs-12" style="padding: 0">--}}
                            {{--<!-- Tab panes -->--}}
                            {{--<div class="tab-content">--}}
                                {{--<div class="tab-pane" id="sectiontitle">--}}
                                    {{--<div class="go-title">--}}
                                        {{--<h3>Portfolio Section Title Text</h3>--}}
                                        {{--<div class="go-line"></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="panel panel-default">--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<form method="POST" action="portfolio/titles" class="form-horizontal form-label-left" id="website_form">--}}
                                                {{--{{csrf_field()}}--}}
                                                {{--<div class="item form-group">--}}
                                                    {{--<label class="control-label col-md-4 col-sm-4 col-xs-12" for="title"> Service Secttion Title <span class="required">*</span>--}}
                                                    {{--</label>--}}
                                                    {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                                        {{--<input class="form-control col-md-7 col-xs-12" name="portfolio_title" placeholder="Service Title" required="required" type="text" value="{{$language->portfolio_title}}">--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="item form-group">--}}
                                                    {{--<label class="control-label col-md-4 col-sm-4 col-xs-12" for="title"> Service Secttion Text <span class="required">*</span>--}}
                                                    {{--</label>--}}
                                                    {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                                        {{--<textarea rows="6" class="form-control" name="portfolio_text">{{$language->portfolio_text}}</textarea>--}}
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
                                            {{--<a href="{!! url('admin/portfolio/create') !!}" class="btn btn-primary btn-add"><i class="fa fa-plus"></i> Add Portfolio</a>--}}
                                        {{--</div>--}}
                                        {{--<h3>Portfolios</h3>--}}
                                        {{--<div class="go-line"></div>--}}
                                    {{--</div>--}}
                                    {{--<!-- Page Content -->--}}
                                    {{--<div class="panel panel-default">--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<table class="table table-striped table-bordered" cellspacing="0" id="example" width="100%">--}}
                                                {{--<thead>--}}
                                                {{--<tr>--}}
                                                    {{--<th>Portfolio Image</th>--}}
                                                    {{--<th>Actions</th>--}}
                                                {{--</tr>--}}
                                                {{--</thead>--}}
                                                {{--<tbody>--}}
                                                {{--@foreach($portfolios as $portfolio)--}}
                                                    {{--<tr>--}}
                                                        {{--<td><img src="{{url('/assets/images/portfolio')}}/{{$portfolio->image}}" alt="" class="service-icon"></td>--}}

                                                        {{--<td>--}}
                                                            {{--<form method="POST" action="{!! action('PortfolioController@destroy',['id' => $portfolio->id]) !!}">--}}
                                                                {{--{{csrf_field()}}--}}
                                                                {{--<input type="hidden" name="_method" value="DELETE">--}}
                                                                {{--<a href="service/{{$portfolio->id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit </a>--}}
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