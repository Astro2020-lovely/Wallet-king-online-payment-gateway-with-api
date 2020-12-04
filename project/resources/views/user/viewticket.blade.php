@extends('user.includes.masterpage')

@section('content')

    <!-- Starting of Support area -->
    <div class="section-padding support-area-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="support-header">
                        <h2>Support Center</h2>
                        <span  class="pull-right">
                            <a href="{{url('account/support')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        </span>
                    </div>
                    <hr/>
                </div>
            </div>
            <div class="support-ticket-wrapper">
                <div class="row">
                    <div id="response" class="col-md-12">
                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4 col-lg-push-8 col-md-4 col-md-push-8 col-sm-4 col-sm-push-8 col-xs-12 col-xs-pull-0">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>Ticket ID</td>
                                        <td>
                                            <strong>#{{$ticket->id}}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Created On</td>
                                        <td>
                                            <strong>{{$ticket->created_at}}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Created By</td>
                                        <td>
                                            <strong>{{\App\UserAccount::findOrFail($ticket->userid)->name}}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <strong>{{ucfirst($ticket->status)}}</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-lg-pull-4 col-md-8 col-md-pull-4 col-sm-8 col-sm-pull-4 col-xs-12 col-xs-push-0">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                {{$ticket->subject}}
                                {{--<span class="pull-right">by Jijin P</span>--}}
                            </div>
                            <div class="panel-body">
                                <div class="single-reply-area">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
                                            <img src="{{url('/')}}/assets/images/download.jpg" alt="">
                                            <p class="ticket-date">{{$ticket->created_at}}</p>
                                        </div>
                                        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-8">
                                            <p>{{$ticket->description}}</p>
                                        </div>
                                    </div>
                                </div>

                                @foreach($replies as $reply)
                                    @if($reply->reply_by != 'admin')
                                        <div class="single-reply-area other">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
                                                    <img src="{{url('/')}}/assets/images/download.jpg" alt="">
                                                    <p class="ticket-date">{{$reply->reply_time}}</p>
                                                </div>
                                                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-8">
                                                    <p>{{$reply->message}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="single-reply-area user">
                                            <div class="row">
                                                <div class="col-lg-2 col-lg-push-10 col-md-3 col-md-push-9 col-sm-3 col-sm-push-9 col-xs-4 col-xs-push-8">
                                                    <img src="{{url('/')}}/assets/images/download.jpg" alt="">
                                                    <p class="ticket-date">{{$reply->reply_time}}<br>By Staff</p>
                                                </div>
                                                <div class="col-lg-10 col-lg-pull-2 col-md-9 col-md-pull-3 col-sm-9 col-sm-pull-3 col-xs-8 col-xs-pull-4">
                                                    <p>{{$reply->message}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @if($ticket->status != "closed")
                            <div class="panel-footer">
                                <form action="{!! action('UserTicketController@submitreply',['id' => $ticket->id]) !!}" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <textarea class="form-control" name="reply" id="wrong-invoice" rows="5" style="resize: vertical;" required placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary invoice-btn">
                                            Add Reply
                                        </button>
                                    </div>
                                </form>
                            </div>
                            @endif
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