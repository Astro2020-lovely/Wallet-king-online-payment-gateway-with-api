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
                                        <h2>Update Counter Section</h2>
                                        <a href="{!! url('admin/counter') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <form method="POST" action="{!! action('CounterController@update',['id' => $counter->id]) !!}" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="current_icon">Current Icon* </label>
                                            <div class="col-sm-8">
                                                <img src="{{url('/assets/images/counter')}}/{{$counter->icon}}" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="change_icon">Change Icon*</label>
                                            <div class="col-sm-8">
                                                <input type="file"  name="image" id="change_icon" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="counter_title">Counter Title* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="{{$counter->title}}" name="title" id="counter_title" placeholder="Satisfied Clients" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="count_number">Count Number* <span>(Must Be Number)</span></label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" value="{{$counter->number}}" name="number" id="count_number" placeholder="800" required>
                                            </div>
                                        </div>

                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update counter</button>
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

    {{--<div id="page-wrapper">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row" id="main">--}}

                {{--<!-- Page Heading -->--}}
                {{--<div class="go-title">--}}
                    {{--<div class="pull-right">--}}
                        {{--<a href="{!! url('admin/counter') !!}" class="btn btn-default btn-back"><i class="fa fa-arrow-left"></i> Back</a>--}}
                    {{--</div>--}}
                    {{--<h3>Update Counter Section</h3>--}}
                    {{--<div class="go-line"></div>--}}
                {{--</div>--}}
                {{--<!-- Page Content -->--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-body">--}}
                        {{--<div id="response"></div>--}}
                        {{--<form method="POST" action="{!! action('CounterController@update',['id' => $counter->id]) !!}" class="form-horizontal form-label-left" enctype="multipart/form-data">--}}
                            {{--{{csrf_field()}}--}}
                            {{--<input type="hidden" name="_method" value="PATCH">--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Current Icon<span class="required">*</span>--}}

                                {{--</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12 text-center" style="background-color: #1a242f;padding: 8px;">--}}
                                    {{--<img src="{{url('/assets/images/counter')}}/{{$counter->icon}}" alt="" style="max-height: 150px">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Change Icon<span class="required">*</span>--}}

                                {{--</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                    {{--<input type="file" accept="image/*" name="image">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Counter Title<span class="required">*</span>--}}
                                    {{--<p class="small-label">(In Any Language)</p>--}}
                                {{--</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                    {{--<input id="name" class="form-control col-md-7 col-xs-12" value="{{$counter->title}}" name="title" placeholder="e.g Sports" required="required" type="text">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Count Number<span class="required">*</span>--}}
                                    {{--<p class="small-label">(Must Be Number)</p>--}}
                                {{--</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                    {{--<input id="slug" class="form-control col-md-7 col-xs-12" value="{{$counter->number}}" name="number" placeholder="e.g sports" required="required" type="number">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="ln_solid"></div>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-3">--}}
                                    {{--<button type="submit" class="btn btn-success btn-block">Update Counter</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
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