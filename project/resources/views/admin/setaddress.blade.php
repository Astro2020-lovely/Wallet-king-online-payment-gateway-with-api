@extends('admin.includes.masterpage-admin')

@section('content')
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Office Address -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Office Address</h2>
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
                                    <form method="POST" action="address" class="form-horizontal" id="about_form">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="street_address">Street Address *</label>
                                            <div class="col-sm-8">
                                                <textarea name="address" id="street_address" class="form-control" placeholder="Address" style="resize: vertical;">{{$setting[0]->address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="phone">Phone *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="phone" value="{{$setting[0]->phone}}" id="phone" class="form-control" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="fax">Fax *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fax" value="{{$setting[0]->fax}}" id="fax" class="form-control" placeholder="Fax">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="email">Email *</label>
                                            <div class="col-sm-8">
                                                <input type="email" name="email" value="{{$setting[0]->email}}" id="email" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update setting</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Office Address -->


                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('about_us_text');
        });
    </script>
@stop