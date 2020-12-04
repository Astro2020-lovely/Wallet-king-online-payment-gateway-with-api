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
                                        <h2>Deposit Details</h2>
                                        <a href="{!! url('admin/deposits') !!}" class="add-newProduct-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive order-details-table">
                                        <table class="table">
                                            <tr>
                                                <th>Customer ID#</th>
                                                <td>{{$deposit->id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Deposit Amount:</th>
                                                <td>{{$settings[0]->currency_sign}}{{$deposit->amount}}</td>
                                            </tr>
                                            <tr>
                                                <th>Deposit Process Date:</th>
                                                <td>{{$deposit->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <th>Deposit Status:</th>
                                                <td><strong>{{ucfirst($deposit->status)}}</strong></td>
                                            </tr>
                                            <tr>
                                                <th>Customer Name:</th>
                                                <td>{{$deposit->accid->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Customer Email:</th>
                                                <td>{{$deposit->accid->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Customer Phone:</th>
                                                <td>{{$deposit->accid->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th>Deposit Method:</th>
                                                <td>{{$deposit->deposit_method}}</td>
                                            </tr>
                                            @if($deposit->deposit_method == "BitCoin")
                                            <tr>
                                                <th>{{$deposit->deposit_method}} Wallet Address:</th>
                                                <td>{{$deposit->bchain_address}}</td>
                                            </tr>
                                            @elseif($deposit->deposit_method == "Bank")
                                                <tr>
                                                    <th>{{$deposit->deposit_method}} Deposit Information:</th>
                                                    <td>{{$deposit->bank_information}}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th>{{$deposit->deposit_method}} Deposit Information:</th>
                                                    <td>{{$deposit->mobile_information}}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>
                                                    <a href="accept/{{$deposit->id}}" class="btn btn-success product-btn"><i class="fa fa-check-circle"></i> Accept</a>
                                                    <a href="reject/{{$deposit->id}}" class="btn btn-danger product-btn"><i class="fa fa-times-circle"></i> Reject</a>
                                                </td>
                                                <td></td>
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