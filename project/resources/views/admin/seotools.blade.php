@extends('admin.includes.master-admin')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">

                <!-- Page Heading -->
                <div class="go-title">
                    <h3>SEO Settings</h3>
                    <div class="go-line"></div>
                </div>
                <!-- Page Content -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="res">
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        </div>
                        <!-- /.start -->
                        <div class="col-md-12">
                            <ul class="nav nav-tabs tabs-left">
                                <li class="active"><a href="#analytics" data-toggle="tab" aria-expanded="true">Google Analytics</a>
                                <li><a href="#metatags" data-toggle="tab" aria-expanded="false">Website Meta Keywords</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-9">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="analytics">
                                    <p class="lead">Google Analytics</p>
                                    <div class="ln_solid"></div>
                                    <form method="POST" action="{!! action('SeoToolsController@update',['id' => $tools->id]) !!}" class="form-horizontal form-label-left" novalidate>
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="google_script"> Google Analytics Script <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea rows="10" class="form-control" name="google_analytics" placeholder="Google Analytics Script" required="required">{{$tools->google_analytics}}</textarea>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button type="submit" class="btn btn-success btn-block">Update Analytics Script</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="metatags">
                                    <p class="lead">Meta Keywords</p>
                                    <div class="ln_solid"></div>
                                    <form method="POST" action="{!! action('SeoToolsController@update',['id' => $tools->id]) !!}" id="meta_form" class="form-horizontal form-label-left" novalidate>
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_keys"> Website Meta Keywords <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea rows="10" class="form-control" name="meta_keys" placeholder="Website Meta Keywords (Seperated By Commas)" required="required">{{$tools->meta_keys}}</textarea>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button type="submit" class="btn btn-success btn-block">Update Meta Keywords</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.end -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@stop

@section('footer')

@stop