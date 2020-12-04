@extends('includes.masterpage')

@section('content')

    <div class="send-area-wrapper text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default verify-success-panel">
                        <div class="panel-body text-center verify-success">
                            <i class="fa fa-check-circle fa-5x"></i>
                            <h3 class="text-center">Amount Deposited Successfully.</h3>
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