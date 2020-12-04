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
                                        <h2>Support Tickets</h2>
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
                                        <table id="product-table_wrapper" class="table products table-sm dt-responsive" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th width="10%">Ticket ID</th>
                                                <th width="15%">Customer</th>
                                                <th width="25%">Subject</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($tickets as $ticket)
                                                @if($ticket->status == "open")
                                                <tr>
                                                @elseif($ticket->status == "closed")
                                                <tr style="background-color: #999999;">
                                                @else
                                                <tr style="background-color: #dddddd;">
                                                @endif
                                                    <td>#{{$ticket->id}}</td>
                                                    <td>{!!\App\UserAccount::where('id',$ticket->userid)->exists()?\App\UserAccount::findOrFail($ticket->userid)->name:"<span style='color:red;'>Account Deleted</span>"!!}</td>
                                                    <td>{{$ticket->subject}}</td>
                                                    <td>{{$ticket->created_at}}</td>
                                                    <td>{{ucfirst($ticket->status)}}</td>
                                                    <td>

                                                        <form method="POST" action="{!! action('CustomerController@destroy',['id' => $ticket->id]) !!}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="support-center/{{$ticket->id}}" class="btn btn-primary product-btn"><i class="fa fa-check"></i> View Details </a>

                                                            <button type="submit" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Delete </button>
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