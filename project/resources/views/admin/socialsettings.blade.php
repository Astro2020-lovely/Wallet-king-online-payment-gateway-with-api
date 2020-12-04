@extends('admin.includes.masterpage-admin')

@section('content')


    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Social Links area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Social Links</h2>
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
                                    <form method="POST" action="{!! action('SocialLinkController@update',['id' => $social->id]) !!}" class="form-horizontal">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="facebook">Facebook *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="facebook" value="{{$social->facebook}}" id="facebook" placeholder="http://facebook.com/" required>
                                            </div>
                                            <div class="col-sm-3">
                                                @if($social->f_status == "enable")
                                                    <label class="switch">
                                                        <input type="checkbox" name="f_status" value="enable" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" name="f_status" value="enable">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="google-Plus">Google Plus *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="g_plus" value="{{$social->g_plus}}" id="google-Plus" placeholder="http://google.com/" required>
                                            </div>
                                            <div class="col-sm-3">
                                                @if($social->g_status == "enable")
                                                    <label class="switch">
                                                        <input type="checkbox" name="g_status" value="enable" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" name="g_status" value="enable">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="twiter">Twiter *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="twiter" value="{{$social->twiter}}" id="twiter" placeholder="http://twitter.com/" required>
                                            </div>
                                            <div class="col-sm-3">
                                                @if($social->t_status == "enable")
                                                    <label class="switch">
                                                        <input type="checkbox" name="t_status" value="enable" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" name="t_status" value="enable">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="linkedin">Linkedin *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="linkedin" value="{{$social->linkedin}}" id="linkedin" placeholder="http://linkedin.com/" required>
                                            </div>
                                            <div class="col-sm-3">
                                                @if($social->link_status == "enable")
                                                    <label class="switch">
                                                        <input type="checkbox" name="link_status" value="enable" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" name="link_status" value="enable">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update social settings</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Social Links area -->


                </div>
            </div>
        </div>
    </div>



    {{--<div id="page-wrapper">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row" id="main">--}}

                {{--<!-- Page Heading -->--}}
                {{--<div class="go-title">--}}

                    {{--<h3>Social Links</h3>--}}
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
                        {{--<form method="POST" action="{!! action('SocialLinkController@update',['id' => $social->id]) !!}" class="form-horizontal form-label-left">--}}
                            {{--{{csrf_field()}}--}}
                            {{--<input type="hidden" name="_method" value="PATCH">--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Facebook <span class="required">*</span>--}}
                                {{--</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                    {{--<input id="name" class="form-control col-md-7 col-xs-12" name="facebook" placeholder="Phone Number" required="required" type="text" value="{{$social->facebook}}">--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                                    {{--@if($social->f_status == "enable")--}}
                                        {{--<input type="checkbox" data-toggle="toggle" data-on="Enabled" name="f_status" value="enable" data-off="Disabled" checked>--}}
                                    {{--@else--}}
                                        {{--<input type="checkbox" data-toggle="toggle" data-on="Enabled" name="f_status" value="enable" data-off="Disabled">--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="g_plus">Google Plus <span class="required">*</span>--}}
                                {{--</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                    {{--<input class="form-control col-md-7 col-xs-12" name="g_plus" placeholder="Phone Number" required="required" type="text" value="{{$social->g_plus}}">--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                                    {{--@if($social->g_status == "enable")--}}
                                        {{--<input type="checkbox" data-toggle="toggle" data-on="Enabled" name="g_status" value="enable" data-off="Disabled" checked>--}}
                                    {{--@else--}}
                                        {{--<input type="checkbox" data-toggle="toggle" data-on="Enabled" name="g_status" value="enable" data-off="Disabled">--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="twiter"> Twiter <span class="required">*</span>--}}
                                {{--</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                    {{--<input class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="twiter" placeholder="Twitter Link" required="required" type="text" value="{{$social->twiter}}">--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                                    {{--@if($social->t_status == "enable")--}}
                                        {{--<input type="checkbox" data-toggle="toggle" data-on="Enabled" name="t_status" value="enable" data-off="Disabled" checked>--}}
                                    {{--@else--}}
                                        {{--<input type="checkbox" data-toggle="toggle" data-on="Enabled" name="t_status" value="enable" data-off="Disabled">--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rss_feed"> Linkedin <span class="required">*</span>--}}
                                {{--</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                    {{--<input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="linkedin" placeholder="Linkedin Link" required="required" type="text" value="{{$social->linkedin}}">--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                                    {{--@if($social->link_status == "enable")--}}
                                        {{--<input type="checkbox" data-toggle="toggle" data-on="Enabled" name="link_status" value="enable" data-off="Disabled" checked>--}}
                                    {{--@else--}}
                                        {{--<input type="checkbox" data-toggle="toggle" data-on="Enabled" name="link_status" value="enable" data-off="Disabled">--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="ln_solid"></div>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-3">--}}
                                    {{--<!--  <button type="submit" class="btn btn-primary">Cancel</button> -->--}}
                                    {{--<button type="submit" class="btn btn-success btn-block">Update Social Settings</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
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