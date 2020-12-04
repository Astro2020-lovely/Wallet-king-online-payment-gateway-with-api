@extends('admin.includes.master-admin')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">

                <!-- Page Heading -->
                <div class="go-title">
                    <h3>Page Settings</h3>
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
                                <li class="active"><a href="#about" data-toggle="tab" aria-expanded="true">About Us Page</a>
                                <li><a href="#faq" data-toggle="tab" aria-expanded="false">FAQ Page</a>
                                </li>
                                <li><a href="#contact" data-toggle="tab" aria-expanded="false">Contact Us Page</a>
                                </li>

                            </ul>
                        </div>

                        <div class="col-xs-12">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="about">
                                    <p class="lead">About Us Page</p>
                                    <div class="ln_solid"></div>
                                    <form method="POST" action="{{action('PageSettingsController@about')}}" class="form-horizontal form-label-left">
                                        {{csrf_field()}}
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Disable/Enable About Page <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-3 col-xs-9">
                                                @if($pagedata->a_status == 1)
                                                    <input type="checkbox" data-toggle="toggle" data-on="Enabled" name="a_status" value="1" data-off="Disabled" checked>
                                                @else
                                                    <input type="checkbox" data-toggle="toggle" data-on="Enabled" name="a_status" value="1" data-off="Disabled">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> About Us Page Content <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea rows="10" class="form-control" name="about" id="content1" placeholder="About Page Contents" required="required">{{$pagedata->about}}</textarea>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button id="about_page_update" type="submit" class="btn btn-success btn-block">Update About Page</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="contact">
                                    <p class="lead">Contact Page Content</p>
                                    <div class="ln_solid"></div>
                                    <form method="POST" action="{{action('PageSettingsController@contact')}}" class="form-horizontal form-label-left">
                                        {{csrf_field()}}
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Disable/Enable Contact Page <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-3 col-xs-9">
                                                @if($pagedata->c_status == 1)
                                                    <input type="checkbox" data-toggle="toggle" data-on="Enabled" name="c_status" value="1" data-off="Disabled" checked>
                                                @else
                                                    <input type="checkbox" data-toggle="toggle" data-on="Enabled" name="c_status" value="1" data-off="Disabled">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Form Success Text <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea rows="3" class="form-control" name="contact" placeholder="Contact Page Content" required="required">{{$pagedata->contact}}</textarea>
                                            </div>

                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Us Email Address <span class="required">*</span>
                                                <p class="small-label">Separate by Comma(,) for Multiple Email</p>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea rows="3" class="form-control" name="contact_email" placeholder="Contact Us Email Address" required="required">{{$pagedata->contact_email}}</textarea>
                                            </div>

                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button id="contact_page_update" type="submit" class="btn btn-success btn-block">Update Contact Page</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="faq">
                                    <p class="lead">FAQ Page</p>
                                    <div class="ln_solid"></div>
                                    <form method="POST" action="{{action('PageSettingsController@faq')}}" class="form-horizontal form-label-left">
                                        {{csrf_field()}}
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Disable/Enable FAQ Page <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-3 col-xs-9">
                                                @if($pagedata->f_status == 1)
                                                    <input type="checkbox" data-toggle="toggle" data-on="Enabled" name="f_status" value="1" data-off="Disabled" checked>
                                                @else
                                                    <input type="checkbox" data-toggle="toggle" data-on="Enabled" name="f_status" value="1" data-off="Disabled">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> FAQ Page Content <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <textarea rows="10" style="height: 200px;" class="form-control" name="faq" id="content3" placeholder="FAQ Page Content" required="required">{{$pagedata->faq}}</textarea>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button id="faq_page_update" type="submit" class="btn btn-success btn-block">Update FAQ Page</button>
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
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true}).panelInstance('content1');
            new nicEditor({fullPanel : true}).panelInstance('content3');
        });
    </script>
@stop