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
                            <li><a href="{{url('account/support')}}">All Tickets</a></li>
                            <li><a href="{{url('account/support/running')}}">Running Tickets</a></li>
                            <li class="active"><a href="{{url('account/support/create')}}">Create New Ticket</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="support-area">
                        <div class="all-tickets-header">
                            <h3>Create New Ticket</h3>
                        </div>
                        <hr/>
                        <form method="POST" action="{!! action('UserTicketController@store') !!}" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="support_subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="support_msg" class="form-control" rows="5" style="resize: vertical;" placeholder="Message" required></textarea>
                            </div>
                            <div class="form-group">
                                <button name="support_btn" class="btn btn-primary support-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Support area -->

@stop

@section('footer')

@stop