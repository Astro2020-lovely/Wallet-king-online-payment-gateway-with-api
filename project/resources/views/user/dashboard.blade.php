@extends('user.includes.masterpage')

@section('content')

    <!-- Starting of user dashboard area -->
    <div class="user-panel-wrapper">
        <div class="container">
            <div class="row">
                @if($user->email_verified != 'yes')
                    <div class="col-md-12 verify-waring-panel">
                        <div class="alert alert-danger text-center" role="alert">
                            <i class="fa fa-exclamation-circle fa-3x"></i>
                            <h4 class="alert-heading">Please Verify Your Email!</h4>
                            <p id="resendverify">A Verification Link Send to your Email. Please Check Your Email.</p>
                            <img id="load" src="{{url('assets/images')}}/loading.gif" style="display: none;">
                            <p><a href="javascript:;" id="resend-verify"><strong>Resend Verification Email</strong></a></p>
                        </div>
                    </div>
                @endif

                <div class="dashboard-header">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h1>{{$language->dashboard}}</h1>
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
                <div class="dashboard-transaction-area">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="transaction-left-side">
                            <div class="panel panel-default">
                                <div class="panel-body transaction">
                                    {{$language->current_balance}}
                                    <h1>{{number_format((float)$user->current_balance, 2, '.', '')}}</h1>
                                    <h3>{{ $settings[0]->currency_code }}</h3>
                                </div>
                            </div>

                            @if(count($requests) > 0)
                                <a href="{{route('account.requests')}}">
                                    <div class="alert alert-success">
                                        <strong>{{$language->pending_requests}}</strong>
                                        <span class="label label-success pull-right">{{count($requests)}}</span>
                                    </div>
                                </a>
                            @endif

                            @if(count($withdraws) > 0)
                                <a href="{{route('account.withdraws')}}">
                                    <div class="alert alert-info">
                                        <strong>{{$language->pending_withdraws}}</strong>
                                        <span class="label label-primary pull-right">{{count($withdraws)}}</span>
                                    </div>
                                </a>
                            @endif
                            @if(count($deposits) > 0)
                                <a href="{{route('account.deposits')}}">
                                    <div class="alert alert-info">
                                        <strong>{{$language->pending_deposits}}</strong>
                                        <span class="label label-primary pull-right">{{count($deposits)}}</span>
                                    </div>
                                </a>
                            @endif
                            @if(count($atickets) > 0)
                                <a href="{{url('account/support')}}">
                                    <div class="alert alert-info">
                                        <strong>{{$language->notification}}</strong>
                                        <span class="label label-primary pull-right">{{count($atickets)}}</span>
                                    </div>
                                </a>
                            @endif

                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="transaction-right-side">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4>{{$language->recent_transaction}}</h4>
                                    <div class="transaction-panel-header">
                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-2 text-center">{{$language->dates}}</div>
                                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">{{$language->action}}</div>
                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 pull-right">{{$language->amount}}</div>
                                    </div>
                                    <div class="panel-group transaction-faq" id="transaction">
                                        @forelse($transactions as $transaction)
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a href="#transaction-{{$transaction->transid}}" data-parent="#transaction" data-toggle="collapse">
                                                    <div class="row">
                                                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-2 text-center">
                                                            <strong>{{strtoupper(date('M d',strtotime($transaction->trans_date)))}}</strong>
                                                        </div>
                                                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-4">
                                                            {{$transaction->reason}}
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 pull-right">
                                                            <strong class="colored-{{$transaction->type}}">{{$transaction->sign}}{{ $settings[0]->currency_sign }}{{$transaction->amount}}</strong>
                                                        @if($transaction->fee != 0)
                                                            <span class="fee">Fee {{ $settings[0]->currency_sign }}{{$transaction->fee}}</span>
                                                        @endif
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div id="transaction-{{$transaction->transid}}" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 info">
                                                            @if($transaction->type == "credit")

                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>From:</strong>
                                                                    </div>
                                                                    <div class="col-xs-12">{{$transaction->accfrom->email}}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>Name:</strong>
                                                                    </div>
                                                                    <div class="col-xs-12">
                                                                        {{$transaction->accfrom->name}}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>Date: </strong>
                                                                    </div>
                                                                    <div class="col-xs-12">{{date('d F Y h:i:sa',strtotime($transaction->trans_date))}}</div>
                                                                </div>

                                                            @elseif($transaction->type == "debit")
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>To:</strong>
                                                                    </div>
                                                                    <div class="col-xs-12">{{$transaction->accto->email}}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>Name:</strong>
                                                                    </div>
                                                                    <div class="col-xs-12">
                                                                        {{$transaction->accto->name}}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>Date: </strong>
                                                                    </div>
                                                                    <div class="col-xs-12">{{date('d F Y h:i:sa',strtotime($transaction->trans_date))}}</div>
                                                                </div>

                                                            @elseif($transaction->type == "withdraw")

                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>Withdraw Method:</strong>
                                                                    </div>
                                                                    <div class="col-xs-12">{{$transaction->withdrawid->method}}</div>
                                                                </div>

                                                                @if($transaction->withdrawid->method != "By Admin")
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>{{$transaction->withdrawid->method}} Account:</strong>
                                                                    </div>
                                                                    <div class="col-xs-12">
                                                                        {{($transaction->withdrawid->method == "Bank"? $transaction->withdrawid->iban : $transaction->withdrawid->email)}}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>Date: </strong>
                                                                    </div>
                                                                    <div class="col-xs-12">{{date('d F Y h:i:sa',strtotime($transaction->trans_date))}}</div>
                                                                </div>
                                                                @endif

                                                            @elseif($transaction->type == "deposit")

                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>Deposit Method:</strong>
                                                                    </div>
                                                                    <div class="col-xs-12">{{$transaction->deposit_method}}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>{{$transaction->deposit_method}} Transaction:</strong>
                                                                    </div>
                                                                    <div class="col-xs-12" style="word-wrap: break-word;display: inline-block;">
                                                                        {{$transaction->deposit_transid}}
                                                                    </div>
                                                                </div>
                                                                @if($transaction->deposit_method == "Stripe")
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>{{$transaction->deposit_method}} Charge ID:</strong>
                                                                    </div>
                                                                    <div class="col-xs-12">{{$transaction->deposit_chargeid}}</div>
                                                                </div>
                                                                @endif
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <strong>Date: </strong>
                                                                    </div>
                                                                    <div class="col-xs-12">{{date('d F Y h:i:sa',strtotime($transaction->trans_date))}}</div>
                                                                </div>

                                                            @endif

                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <strong>Transaction#:</strong>
                                                                </div>
                                                                <div class="col-xs-12">{{$transaction->transid}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 info">

                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="pull-left">
                                                                        <strong>{{$transaction->reason}} Amount:</strong>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <span>{{ $settings[0]->currency_sign }}{{$transaction->amount}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="pull-left">
                                                                        <strong>Charge:</strong>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <span>{{ $settings[0]->currency_sign }}{{$transaction->fee}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="pull-left">
                                                                        <strong>Total:</strong>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <span>{{ $settings[0]->currency_sign }}{{$transaction->amount + $transaction->fee}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <strong>Reference: </strong>
                                                                </div>
                                                                <div class="col-xs-12">
                                                                    <span>{{$transaction->reference}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            <div class="panel panel-default">
                                                <div class="panel-body">No Transactions Made yet.</div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Ending of user dashboard area -->

@stop

@section('footer')
<script>

</script>
@stop