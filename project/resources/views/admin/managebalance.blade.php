@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard FAQ Page -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Manage Customer Balance</h2>
                                        <a href="{!! url('admin/customers/'.$customer->id) !!}" class="add-newProduct-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <div class="customer-details-area">

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="customer-details-updateProfile">
                                                                    <div class="section-title">
                                                                        <h4>Add/Subtract Account Balance</h4>
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
                                                                    <form class="form-horizontal customer-details" method="POST" action="{{ action('CustomerController@manage_balance_operation',['id' => $customer->id]) }}">
                                                                        {{ csrf_field() }}

                                                                        <div class="form-group">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="customer_details_packege">Customer Type</label>
                                                                                <select name="operation" id="customer_details_packege" class="form-control" required>
                                                                                        <option value="">Select Operation Type</option>
                                                                                        <option value="add">Add Balance</option>
                                                                                        <option value="subtract">Subtract Balance</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="customer_details_firstname">Amount * <span>(In {{$settings[0]->currency_code}})</span></label>
                                                                                <input class="form-control" type="text" name="amount" placeholder="Enter Amount" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                                                <input type="submit" class="btn btn-success add-product_btn" value="Update Balance">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <div class="customer-details-profile">

                                                                    <div class="single-profile-area text-center">
                                                                        <h2 class="customer-name">{{$customer->name}}</h2>
                                                                        <p class="customer-email">{{$customer->email}}</p>
                                                                        <p class="customer-balance">
                                                                            <strong>
                                                                                CURRENT BALANCE :
                                                                            </strong>
                                                                        </p>
                                                                        <h3>{{$customer->current_balance}} {{$settings[0]->currency_code}}</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard FAQ Page -->




                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop