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
                                <div class="add-product-box">
                                    <div class="add-product-header orders">
                                        <h2>All Transactions</h2>
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
                                                <th>Date</th>
                                                <th width="15%">Transaction ID#</th>
                                                <th>Reason</th>
                                                <th width="10%">Amount</th>
                                                <th>Account</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($transactions as $transaction)
                                                <tr>
                                                    <td>{{date('d F Y h:i:sa',strtotime($transaction->trans_date))}}</td>
                                                    <td>{{$transaction->transid}}</td>
                                                    <td>{{$transaction->reason}}</td>
                                                    <td>{{$settings[0]->currency_sign}}{!! $transaction->amount !!}</td>
                                                    <td>{!!$transaction->mainacc->email!!}</td>

                                                    <td>
                                                        <a href="transactions/{{$transaction->id}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details </a>
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