@extends('user.includes.masterpage')

@section('content')

    <!-- Starting of Transaction area -->
    <div class="transaction-area-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="add-transaction-box">
                        <div class="add-transaction-header">
                            <h2>{{$language->transactions}}</h2>
                        </div>
                        <form action="" method="POST" class="datepeaker-form">
                            <div class="input-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="min" placeholder="Select Date" required>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="input-group-addon">To</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="max" placeholder="Select Date" required>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="transaction-table" class="table table-striped table-hover transaction dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Transaction ID#</th>
                                    <th>Action</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($transactions as $transaction)
                                    <tr style="cursor: pointer" onclick="transdetail({{$transaction->id}})" data-toggle="modal" data-target="#myModal">
                                        <td>{{date('Y-m-d',strtotime($transaction->trans_date))}}</td>
                                        <td>{{$transaction->transid}}</td>
                                        <td>{{$transaction->reason}}</td>
                                        <td><strong class="{{$transaction->type}}">{{$transaction->sign}}{{ $settings[0]->currency_sign }}{{$transaction->amount}}</strong></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Transactions.</td>
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
    <!-- Ending of Transaction area -->


    <!-- Starting of Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Transection Details</h4>
                </div>
                <div class="modal-body">
                    <div class="transition-details">
                        <div class="table-responsive" id="transdetail">

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

        function transdetail(id){
            $.get(mainurl+'/account/transdetail/'+id, function(response){
                $("#transdetail").html(response);
            });
        }

    </script>
@stop