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
                                        <h2>Send Email to {{$customer->name}}</h2>
                                        <a href="{!! url('admin/customers') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <form method="POST" action="{!! action('CustomerController@sendemail') !!}" class="form-horizontal">
                                        {{csrf_field()}}
                                        <input type="hidden" value="{{$customer->email}}" name="to">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="subject_customer">Subject*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="subject" id="subject_customer" placeholder="e.g subject" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="message_customer">Message*</label>
                                            <div class="col-sm-8">
                                                <textarea name="message" id="message_customer" class="form-control" rows="10" style="resize: vertical;" required></textarea>
                                            </div>
                                        </div>

                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">send email</button>
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


@stop

@section('footer')

@stop