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
                                        <h2>Transaction Details</h2>
                                        <a href="{!! url('admin/transactions') !!}" class="add-newProduct-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive order-details-table">
                                        <table class="table">
                                            <tr>
                                                <th>Transaction ID#</th>
                                                <td>{{$transaction->transid}}</td>
                                            </tr>
                                            <tr>
                                                <th>Action:</th>
                                                <td>{{$transaction->reason}}</td>
                                            </tr>
                                            <tr>
                                                <th>Transaction Amount:</th>
                                                <td>{{$settings[0]->currency_sign}}{{$transaction->amount}}</td>
                                            </tr>
                                            <tr>
                                                <th>Fee:</th>
                                                <td>{{$settings[0]->currency_sign}}{{$transaction->fee}}</td>
                                            </tr>
                                            <tr>
                                                <th>Total Amount:</th>
                                                <td>{{$settings[0]->currency_sign}}{{$transaction->amount + $transaction->fee}}</td>
                                            </tr>
                                            <tr>
                                                <th>Account:</th>
                                                <td>{!! $transaction->mainacc->email !!}</td>
                                            </tr>
                                            <tr>
                                                <th>Account Holder Name:</th>
                                                <td>{!! $transaction->mainacc->name !!}</td>
                                            </tr>
                                            <tr>
                                                <th>Account Holder Phone:</th>
                                                <td>{!! $transaction->mainacc->phone !!}</td>
                                            </tr>
                                            @if($transaction->type == "credit")
                                            <tr>
                                                <th>{{$transaction->reason}} From:</th>
                                                <td>{!! $transaction->accfrom->email !!}</td>
                                            </tr>
                                            @elseif($transaction->type == "debit")
                                            <tr>
                                                <th>{{$transaction->reason}} To:</th>
                                                <td>{!! $transaction->accto->email !!}</td>
                                            </tr>
                                            @elseif($transaction->type == "deposit")
                                            <tr>
                                                <th>Deposit Method:</th>
                                                <td>{{$transaction->deposit_method}}</td>
                                            </tr>
                                                @if($transaction->deposit_method=="Stripe")
                                                    <tr>
                                                        <th>{{$transaction->deposit_method}} Charge ID:</th>
                                                        <td>{{$transaction->deposit_chargeid}}</td>
                                                    </tr>
                                                @endif
                                            <tr>
                                                <th>{{$transaction->deposit_method}} Transection ID:</th>
                                                <td>{{$transaction->deposit_transid}}</td>
                                            </tr>
                                            @elseif($transaction->type == "withdraw")
                                                <tr>
                                                    <th>{{$transaction->reason}} Method:</th>
                                                    <td>{{$transaction->withdrawid->method}}</td>
                                                </tr>
                                                @if($transaction->withdrawid->method != "By Admin")
                                                    @if($transaction->withdrawid->method != "Bank")
                                                    <tr>
                                                        <th>{{$transaction->withdrawid->method}} Email:</th>
                                                        <td>{{$transaction->withdrawid->acc_email}}</td>
                                                    </tr>
                                                    @else
                                                    <tr>
                                                        <th>{{$transaction->withdrawid->method}} Account:</th>
                                                        <td>{{$transaction->withdrawid->iban}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Account Name:</th>
                                                        <td>{{$transaction->withdrawid->acc_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country:</th>
                                                        <td>{{ucfirst(strtolower($transaction->withdrawid->country))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td>{{$transaction->withdrawid->address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{$transaction->withdrawid->method}} Swift Code:</th>
                                                        <td>{{$transaction->withdrawid->swift}}</td>
                                                    </tr>
                                                    @endif
                                                @endif
                                            @endif
                                            <tr>
                                                <th>Transaction Date:</th>
                                                <td>{{$transaction->trans_date}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <hr/>
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