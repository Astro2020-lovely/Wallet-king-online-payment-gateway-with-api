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
                                    <h2>System Purchase Activation</h2>
                                </div>
                                <hr/>
                                <div id="response" class="col-md-12">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif
                                </div>
                                    <form class="form-horizontal" action="{{route('admin-activate-purchase')}}" method="POST" enctype="multipart/form-data">

                                      {{csrf_field()}}

                                      <div class="form-group">
                                        <label class="control-label col-sm-4" for="admin_name">Purchase Code *</label>
                                        <div class="col-sm-6">
                                          <input class="form-control" name="pcode" id="admin_name" placeholder="Enter Purchase Code" required="" type="text" autocomplete="off">
                                        </div>
                                      </div>

                                      <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Activate Now</button>
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
@endsection

@section('scripts')
<script type="text/javascript">
  

</script>

@endsection
