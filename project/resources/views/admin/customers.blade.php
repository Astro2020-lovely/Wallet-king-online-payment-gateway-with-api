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
                                <div class="add-product-box customers">
                                    <div class="add-product-header">
                                        <h2>Customers</h2>
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
                                                <th>Phone</th>
                                                <th width="10%">Balance</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($customers as $customer)
                                                <tr>
                                                    <td>{{$customer->name}}</td>
                                                    <td>{{$customer->email}}</td>
                                                    <td>{{$customer->phone}}</td>
                                                    <td>${{$customer->current_balance}}</td>
                                                    <td>
                                                        @if($customer->status != 0)
                                                            Active
                                                        @else
                                                            Banned
                                                        @endif
                                                    </td>

                                                    <td>

                                                        <form method="POST" action="{!! action('CustomerController@destroy',['id' => $customer->id]) !!}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="customers/{{$customer->id}}" class="btn btn-primary product-btn"><i class="fa fa-check"></i> View Details </a>
                                                            @if($customer->status != 0)
                                                                <a href="customers/status/{{$customer->id}}/0" class="btn btn-danger product-btn"><i class="fa fa-toggle-off"></i> Ban</a>
                                                            @else
                                                                <a href="customers/status/{{$customer->id}}/1" class="btn btn-success product-btn"><i class="fa fa-toggle-on"></i> Activate</a>
                                                            @endif

                                                            <button type="submit" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove </button>
                                                        </form>

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