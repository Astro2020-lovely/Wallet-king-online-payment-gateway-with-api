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
                                <div class="add-product-box withdraws">
                                    <div class="add-product-header">
                                        <h2>Pending Withdraws</h2>
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
                                                <th>Customer Name</th>
                                                <th width="10%">Customer Email</th>
                                                <th>Phone</th>
                                                <th width="10%">Method</th>
                                                <th>Withdraw Date</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($withdraws as $withdraw)
                                                <tr>
                                                    <td>{{$withdraw->acc->name}}</td>
                                                    <td>{{$withdraw->acc->email}}</td>
                                                    <td>{{$withdraw->acc->phone}}</td>
                                                    <td>{{$withdraw->method}}</td>
                                                    <td>{{$withdraw->created_at}}</td>
                                                    <td>
                                                        <a href="withdraws/{{$withdraw->id}}" class="btn btn-primary product-btn"><i class="fa fa-check"></i> View Details </a>

                                                        <a href="withdraws/accept/{{$withdraw->id}}" class="btn btn-success product-btn"><i class="fa fa-check-circle"></i> Accept</a>

                                                        <a href="withdraws/reject/{{$withdraw->id}}" class="btn btn-danger product-btn"><i class="fa fa-times-circle"></i> Reject</a>

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

                    {{--<h3>Pending Withdraws</h3>--}}
                    {{--<div class="go-line"></div>--}}
                {{--</div>--}}
                {{--<!-- Page Content -->--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-body">--}}
                        {{--<div id="response">--}}
                            {{--@if(Session::has('message'))--}}
                                {{--<div class="alert alert-success alert-dismissable">--}}
                                    {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                                    {{--{{ Session::get('message') }}--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<table class="table table-striped table-bordered" cellspacing="0" id="example" width="100%">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>Customer Name</th>--}}
                                {{--<th width="10%">Customer Email</th>--}}
                                {{--<th>Phone</th>--}}
                                {{--<th width="10%">Method</th>--}}
                                {{--<th>Withdraw Date</th>--}}
                                {{--<th>Actions</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($withdraws as $withdraw)--}}
                                {{--<tr>--}}
                                    {{--<td>{{$withdraw->acc->name}}</td>--}}
                                    {{--<td>{{$withdraw->acc->email}}</td>--}}
                                    {{--<td>{{$withdraw->acc->phone}}</td>--}}
                                    {{--<td>{{$withdraw->method}}</td>--}}
                                    {{--<td>{{$withdraw->created_at}}</td>--}}
                                    {{--<td>--}}
                                        {{--<a href="withdraws/{{$withdraw->id}}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> View Details </a>--}}

                                        {{--<a href="withdraws/accept/{{$withdraw->id}}" class="btn btn-success btn-xs"><i class="fa fa-check-circle"></i> Accept</a>--}}

                                        {{--<a href="withdraws/reject/{{$withdraw->id}}" class="btn btn-danger btn-xs"><i class="fa fa-times-circle"></i> Reject</a>--}}

                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
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