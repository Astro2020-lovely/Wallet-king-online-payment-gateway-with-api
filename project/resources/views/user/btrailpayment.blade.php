@extends('user.includes.masterpage')

@section('content')

    <div class="send-area-wrapper text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-default verify-success-panel">
                            <div class="panel-body text-center verify-success">
                                <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:{{ Session::get('address') }}?amount={{ Session::get('amount') }}">
                                <br>
                                <br>
                                <h3 class="text-center">Address: {{ Session::get('address') }}</h3>
                                <p>Please send approximately {{ Session::get('amount') }} BTC to this address. You will receive ${{ Session::get('usd') }} to your account after transaction is complete. This Process may take some time for confirmations. Thank you.</p>
                                <h4><a href="{{url('/account/dashboard')}}">Back</a></h4>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop