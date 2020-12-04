@extends('user.includes.masterpage')

@section('content')

    <!-- Starting of user dashboard area -->
    <div class="user-panel-wrapper">
        <div class="container">
            <div class="row">
                <div class="dashboard-header">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h1>{{$language->deposit}}</h1>
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
                                    <h4>Pending Deposits</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>Deposit Method</th>
                                                <th>Deposit Information</th>
                                                <th>Amount</th>
                                                <th>Deposit Date</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($deposits as $deposit)
                                                <tr>
                                                    <td>{{$deposit->deposit_method}}</td>
                                                    @if($deposit->deposit_method == "Bank")
                                                        <td>{{$deposit->bank_information}}</td>
                                                    @elseif($deposit->deposit_method == "BitCoin")
                                                        <td>{{$deposit->bchain_address}}</td>
                                                    @else
                                                        <td>{{$deposit->acc_email}}</td>
                                                    @endif
                                                    <td>{{ $settings[0]->currency_sign }}{{$deposit->amount}}</td>
                                                    <td>{{date('Y-m-d',strtotime($deposit->created_at))}}</td>
                                                    <td>{{ucfirst($deposit->status)}}</td>
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
            </div>
        </div>
    </div>
    <!-- Ending of user dashboard area -->


<!-- Modal -->
<div class="modal fade-scale" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg modal-request">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Accept Payment Request</h4>
            </div>
            <div class="modal-body">
                <div class="row" id="reqdetails">

                </div>
                <div class="row">
                    <form role="form" id="accept-form" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <textarea class="form-control" name="reference" rows="4" placeholder="Referance(Optional)">{{ old('reference') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success btn-block"><strong>Accept</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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