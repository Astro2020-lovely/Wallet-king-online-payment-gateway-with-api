@extends('user.includes.masterpage')

@section('content')
    <!-- Starting of Withdraw area -->
    <div class="send-area-wrapper text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if($user->email_verified == 'yes')
                    <div class="section-title">
                        <h2>{{$language->withdraw}}</h2>
                    </div>
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
                    <form class="form-horizontal" method="POST" action="{{ route('account.withdraw.submit') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <select class="form-control" name="methods" id="withmethod" required>
                                    <option value="">Select Withdraw Method</option>
                                    @if($settings[0]->paypal_withdraw == 1)
                                        <option value="Paypal">Paypal</option>
                                    @endif
                                    @if($settings[0]->skrill_withdraw == 1)
                                        <option value="Skrill">Skrill</option>
                                    @endif
                                    @if($settings[0]->payoneer_withdraw == 1)
                                        <option value="Payoneer">Payoneer</option>
                                    @endif
                                    @if($settings[0]->bank_withdraw == 1)
                                        <option value="Bank">Bank</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div id="paypal" style="display: none;">
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <input name="acc_email" value="{{ old('email') }}" placeholder="Enter Account Email" class="form-control" type="email">
                                    <p id="recieverError" class="errorMsg"></p>
                                </div>
                            </div>
                        </div>
                        <div id="bank" style="display: none;">
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <select class="form-control" name="acc_country">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->name}}">{{$country->nicename}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <input name="iban" value="{{ old('iban') }}" placeholder="Enter IBAN/Account No" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <input name="acc_name" value="{{ old('accname') }}" placeholder="Enter Account Name" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <input name="address" value="{{ old('address') }}" placeholder="Enter Address" class="form-control" type="text">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <input name="swift" value="{{ old('swift') }}" placeholder="Enter Swift Code" class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <input type="text" name="amount" value="{{ old('amount') }}" class="form-control" placeholder="Withdraw Amount" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <textarea name="reference" class="form-control" cols="30" rows="10" style="resize: vertical;" placeholder="Referance(Optional)">{{ old('reference') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <p class="colored-text">
                                    Withdraw Fee {{ $settings[0]->currency_sign }}{{ $settings[0]->withdraw_fee }} will deduct from your account.
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <input type="submit" class="btn btn-block send-btn" value="Withdraw">
                            </div>
                        </div>
                    </form>
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
    </div>
    <!-- Ending of Withdraw area -->

{{--<div id="wrapper" class="go-section">--}}
    {{--<div class="row">--}}
        {{--<div class="container">--}}
            {{--<div class="container">--}}
                {{--<!-- Form Name -->--}}
                {{--<h2 class="text-center">Withdraw Money</h2>--}}

                {{--<form role="form" method="POST" action="{{ route('account.withdraw.submit') }}">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6 col-md-offset-3">--}}
                            {{--<div class="form-group">--}}
                                {{--<select class="form-control" name="methods" id="withmethod" required>--}}
                                    {{--<option value="">Select Withdraw Method</option>--}}
                                    {{--<option value="Paypal">Paypal</option>--}}
                                    {{--<option value="Skrill">Skrill</option>--}}
                                    {{--<option value="Payoneer">Payoneer</option>--}}
                                    {{--<option value="Bank">Bank</option>--}}
                                {{--</select>--}}
                                {{--<p id="methodError" class="errorMsg"></p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<!-- Text input-->--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6 col-md-offset-3">--}}
                            {{--<div class="form-group">--}}
                                {{--<input name="amount" placeholder="Withdraw Amount" value="{{ old('amount') }}" class="form-control"  type="text" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div id="paypal" style="display: none;">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6 col-md-offset-3">--}}
                                {{--<div class="form-group">--}}
                                    {{--<input name="acc_email" value="{{ old('email') }}" placeholder="Enter Account Email" class="form-control" type="email">--}}
                                    {{--<p id="recieverError" class="errorMsg"></p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="bank" style="display: none;">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6 col-md-offset-3">--}}
                                {{--<div class="form-group">--}}
                                    {{--<select class="form-control" name="acc_country">--}}
                                        {{--<option value="">Select Country</option>--}}
                                        {{--@foreach($countries as $country)--}}
                                            {{--<option value="{{$country->name}}">{{$country->nicename}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6 col-md-offset-3">--}}
                                {{--<div class="form-group">--}}
                                    {{--<input name="iban" value="{{ old('iban') }}" placeholder="Enter IBAN/Account No" class="form-control" type="text">--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6 col-md-offset-3">--}}
                                {{--<div class="form-group">--}}
                                    {{--<input name="acc_name" value="{{ old('accname') }}" placeholder="Enter Account Name" class="form-control" type="text">--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6 col-md-offset-3">--}}
                                {{--<div class="form-group">--}}
                                    {{--<input name="address" value="{{ old('address') }}" placeholder="Enter Address" class="form-control" type="text">--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6 col-md-offset-3">--}}
                                {{--<div class="form-group">--}}
                                    {{--<input name="swift" value="{{ old('swift') }}" placeholder="Enter Swift Code" class="form-control" type="text">--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="row">--}}
                        {{--<div class="col-md-6 col-md-offset-3">--}}
                            {{--<div class="form-group">--}}
                                {{--<textarea class="form-control" name="reference" rows="6" placeholder="Additional Referance(Optional)">{{ old('reference') }}</textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div id="resp" class="col-md-6 col-md-offset-3">--}}
                        {{--@if(Session::has('message'))--}}
                            {{--<div class="alert alert-success alert-dismissable">--}}
                                {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                                {{--{{ Session::get('message') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--@if(Session::has('error'))--}}
                            {{--<div class="alert alert-danger alert-dismissable">--}}
                                {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                                {{--{{ Session::get('error') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--@if($settings[0]->withdraw_fee > 0)--}}
                            {{--<span class="help-block">--}}
                                {{--<strong>Withdraw Fee ${{ $settings[0]->withdraw_fee }} will deduct from your account.</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{--<!-- Button -->--}}
                    {{--<div class="form-group">--}}
                        {{--<label class="col-md-5 control-label"></label>--}}
                        {{--<div class="col-md-2">--}}
                            {{--<button type="submit" id="sbmtbtn" class="btn btn-ocean btn-block"><strong>Withdraw</strong></button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

@stop

@section('footer')
    <script>

        $("#withmethod").change(function(){
            var method = $(this).val();
            if(method == "Bank"){

                $("#bank").show();
                $("#bank").find('input, select').attr('required',true);

                $("#paypal").hide();
                $("#paypal").find('input').attr('required',false);

            }
            if(method != "Bank"){
                $("#bank").hide();
                $("#bank").find('input, select').attr('required',false);

                $("#paypal").show();
                $("#paypal").find('input').attr('required',true);
            }
            if(method == ""){
                $("#bank").hide();
                $("#paypal").hide();
            }

        })


    </script>
@stop