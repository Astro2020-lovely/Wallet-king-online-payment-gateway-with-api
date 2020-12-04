@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard About Us Page -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>About Us Page</h2>
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
                                    <form method="POST" action="{{action('PageSettingsController@about')}}" class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="disable/enable_about_page">Disable/Enable About Page *</label>
                                            <div class="col-sm-3">
                                                @if($pagedata->a_status == 1)
                                                    <label class="switch">
                                                        <input type="checkbox" name="a_status" value="1"  checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" name="a_status" value="1" >
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="about_page_content">About Us Page Content *</label>
                                            <div class="col-sm-8">
                                                <textarea name="about" id="about_page_content" class="form-control" style="resize: vertical;" placeholder="Brief Description of About Us." required>{{$pagedata->about}}</textarea>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Update About Page</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard About Us Page -->


                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true}).panelInstance('about_page_content');
        });
    </script>
@stop