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
                                        <h2>Pending Deposits</h2>
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
                                                <th>Amount</th>
                                                <th width="10%">Method</th>
                                                <th>Deposit Date</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($deposits as $deposit)
                                                <tr>
                                                    <td>{{$deposit->accid->name}}</td>
                                                    <td>{{$deposit->accid->email}}</td>
                                                    <td>{{$settings[0]->currency_sign}}{{$deposit->amount}}</td>
                                                    <td>{{$deposit->deposit_method}}</td>
                                                    <td>{{$deposit->created_at}}</td>
                                                    <td>
                                                        <a href="deposits/{{$deposit->id}}" class="btn btn-primary product-btn"><i class="fa fa-check"></i> View Details </a>

                                                        <a href="deposits/accept/{{$deposit->id}}" class="btn btn-success product-btn"><i class="fa fa-check-circle"></i> Accept</a>

                                                        <a href="deposits/reject/{{$deposit->id}}" class="btn btn-danger product-btn"><i class="fa fa-times-circle"></i> Reject</a>

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

@stop

@section('footer')

@stop