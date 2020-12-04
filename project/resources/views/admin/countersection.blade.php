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
                                <div class="add-product-box vendors">
                                    <div class="add-product-header">
                                        <h2>Counters</h2>
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
                                                <th>Counter Icon</th>
                                                <th>Counter Title</th>
                                                <th width="20%">Count Number</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($counters as $service)
                                                <tr>
                                                    <td style="background-color: #1a242f"><img src="{{url('/assets/images/counter')}}/{{$service->icon}}" alt="" class="service-icon"></td>
                                                    <td>{{$service->title}}</td>
                                                    <td>{{$service->number}}</td>
                                                    <td>

                                                        <a href="counter/{{$service->id}}/edit" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit </a>

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

            {{--<div class="go-title">--}}
                {{--<div class="pull-right">--}}
                    {{--<a href="{!! url('admin/counter/create') !!}" class="btn btn-primary btn-add"><i class="fa fa-plus"></i> Add Service</a>--}}
                {{--</div>--}}
                {{--<h3>Counters</h3>--}}
                {{--<div class="go-line"></div>--}}
            {{--</div>--}}
            {{--<!-- Page Content -->--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-body">--}}
                    {{--@if(Session::has('message'))--}}
                        {{--<div class="alert alert-success alert-dismissable">--}}
                            {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                            {{--{{ Session::get('message') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--<table class="table table-striped table-bordered" cellspacing="0" id="example" width="100%">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>Counter Icon</th>--}}
                            {{--<th>Counter Title</th>--}}
                            {{--<th width="20%">Count Number</th>--}}
                            {{--<th>Actions</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@foreach($counters as $service)--}}
                            {{--<tr>--}}
                                {{--<td style="background-color: #1a242f"><img src="{{url('/assets/images/counter')}}/{{$service->icon}}" alt="" class="service-icon"></td>--}}
                                {{--<td>{{$service->title}}</td>--}}
                                {{--<td>{{$service->number}}</td>--}}
                                {{--<td>--}}

                                    {{--<a href="counter/{{$service->id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit </a>--}}

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


@stop

@section('footer')

@stop