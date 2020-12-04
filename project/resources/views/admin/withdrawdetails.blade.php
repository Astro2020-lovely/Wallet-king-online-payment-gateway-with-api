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
                                        <h2>Withdraw Details</h2>
                                        <a href="{!! url('admin/withdraws') !!}" class="add-newProduct-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive order-details-table">
                                        <table class="table">
                                            <tr>
                                                <th>Customer ID#</th>
                                                <td>{{$withdraw->id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Withdraw Amount:</th>
                                                <td>{{$settings[0]->currency_sign}}{{$withdraw->amount}}</td>
                                            </tr>
                                            <tr>
                                                <th>Withdraw Process Date:</th>
                                                <td>{{$withdraw->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <th>Withdraw Status:</th>
                                                <td><strong>{{ucfirst($withdraw->status)}}</strong></td>
                                            </tr>
                                            <tr>
                                                <th>Customer Name:</th>
                                                <td>{{$withdraw->acc->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Customer Email:</th>
                                                <td>{{$withdraw->acc->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Customer Phone:</th>
                                                <td>{{$withdraw->acc->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th>Withdraw Method:</th>
                                                <td>{{$withdraw->method}}</td>
                                            </tr>
                                            @if($withdraw->method != "Bank")
                                            <tr>
                                                <th>{{$withdraw->method}} Email:</th>
                                                <td>{{$withdraw->acc_email}}</td>
                                            </tr>
                                            @else
                                            <tr>
                                                <th>{{$withdraw->method}} Account:</th>
                                                <td>{{$withdraw->iban}}</td>
                                            </tr>
                                            <tr>
                                                <th>Account Name:</th>
                                                <td>{{$withdraw->acc_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Country:</th>
                                                <td>{{ucfirst(strtolower($withdraw->country))}}</td>
                                            </tr>
                                            <tr>
                                                <th>Address:</th>
                                                <td>{{$withdraw->address}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{$withdraw->method}} Swift Code:</th>
                                                <td>{{$withdraw->swift}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td>
                                                    <a href="accept/{{$withdraw->id}}" class="btn btn-success product-btn"><i class="fa fa-check-circle"></i> Accept</a>
                                                    <a href="reject/{{$withdraw->id}}" class="btn btn-danger product-btn"><i class="fa fa-times-circle"></i> Reject</a>
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