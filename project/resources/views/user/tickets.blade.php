@extends('user.includes.masterpage')

@section('content')
    <!-- Starting of Support area -->
    <div class="section-padding support-area-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="support-header text-center">
                        <h2>Support Center</h2>
                    </div>
                    <hr/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="support-menu">
                        <ul>
                            <li class="active"><a href="{{url('account/support')}}">All Tickets</a></li>
                            <li><a href="{{url('account/support/running')}}">Running Tickets</a></li>
                            <li><a href="{{url('account/support/create')}}">Create New Ticket</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="support-area">
                        <div class="all-tickets-area">
                            <div class="all-tickets-header">
                                <h3>All Tickets</h3>
                            </div>
                            <hr/>
                            <div class="table-responsive">
                                <table id="transaction-table" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Ticket ID</th>
                                        <th width="35%">Subject</th>
                                        <th>Date</th>
                                        <th>status</th>
                                        <th>View</th>
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
                                                <td>{{$ticket->subject}}</td>
                                                <td>{{$ticket->created_at}}</td>
                                                <td>{{ucfirst($ticket->status)}}</td>
                                                <td>
                                                    <a href="{{url('account')}}/support/{{$ticket->id}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View  </a>
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
        </div>
    </div>
    <!-- Ending of Support area -->

@stop

@section('footer')

@stop