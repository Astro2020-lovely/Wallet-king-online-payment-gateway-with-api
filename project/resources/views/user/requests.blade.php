@extends('user.includes.masterpage')

@section('content')

    <!-- Starting of user dashboard area -->
    <div class="user-panel-wrapper">
        <div class="container">
            <div class="row">
                <div class="dashboard-header">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h1>{{$language->request}}</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                        <h4>{{$user->name}}</h4>
                        <p>{{$user->email}}</p>
                    </div>
                    <hr/>
                </div>
            </div>
            <hr/>
            <div class="row">

                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </div>
                @if($user->email_verified == 'yes')
                <div class="dashboard-transaction-area">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="transaction-left-side">
                            <div class="panel panel-default">
                                <div class="panel-body transaction">
                                    {{$language->current_balance}}
                                    <h1>{{number_format((float)$user->current_balance, 2, '.', '')}} </h1>
                                    <h3>{{ $settings[0]->currency_code }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="transaction-right-side">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4>Pending Requests</h4>
                                    <div id="resp">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                        @if(Session::has('error'))
                                            <div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ Session::get('error') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>Requester Name</th>
                                                <th>Requester Email</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($requests as $request)
                                                <tr>
                                                    <td>{{$request->accfrom->name}}</td>
                                                    <td>{{$request->accfrom->email}}</td>
                                                    <td>{{ $settings[0]->currency_sign }}{{$request->amount}}</td>
                                                    <td>
                                                        <a class="btn btn-danger pending-req-btn" href="{{url('/account/rejectrequest')}}/{{$request->id}}">Reject</a>
                                                        <button class="btn btn-success pending-req-btn" onclick="accept({{$request->id}})" data-toggle="modal" data-target="#myModal">Accept</button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">No Request Pending.</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="panel panel-default verify-waring-panel">
                        <div class="panel-body text-center verify-warning">
                            <i class="fa fa-exclamation-circle fa-5x"></i>
                            <h3 class="text-center">Please Verify Your Email.</h3>
                            <p id="resendverify">A Verification Link Send to your Email. Please Check Your Email.</p>
                            <img id="load" src="{{url('assets/images')}}/loading.gif" style="display: none;">
                            <h4><a href="javascript:;" id="resend-verify">Resend Verification Email</a></h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Ending of user dashboard area -->


    <!-- Starting of Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Accept Payment Request</h4>
                </div>
                <div class="modal-body">
                    <div class="transition-details">
                        <div class="table-responsive" id="reqdetails">

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                        <form class="form-horizontal" id="accept-form" method="POST" action="">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <textarea class="form-control" name="reference" rows="4" placeholder="Referance(Optional)">{{ old('reference') }}</textarea>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    <button type="submit" class="btn btn-block send-btn"><strong>Accept</strong></button>
                                </div>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default modal-btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Modal -->


@stop

@section('footer')
<script>
    function accept(id){
        $.get('{{url('/')}}/account/requestsdetails/'+id, function(response){
            $("#accept-form").attr('action','{{url('/')}}/account/acceptrequest/'+id);
            $("#reqdetails").html(response);
        });
    }
</script>
@stop