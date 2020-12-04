@extends('user.includes.masterpage')

@section('content')

    <!-- Starting of Deposit area -->
    <div class="send-area-wrapper text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if($user->email_verified == 'yes')
                    <div class="section-title">
                        <h2>{{$language->deposit}}</h2>
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
                    <form class="form-horizontal" method="POST" id="payment_form" action="{{route('payment.submit')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <select name="methods" onChange="meThods(this)" class="form-control" required>
                                    @if($settings[0]->paypal_deposit == 1)
                                        <option value="Paypal">Paypal</option>
                                    @endif
                                    @if($settings[0]->pm_deposit == 1)
                                        <option value="PM">Perfect Money</option>
                                    @endif
                                    @if($settings[0]->blocktrail_deposit == 1)
                                        <option value="BITcoin">BitCoin</option>
                                    @endif
                                    @if($settings[0]->stripe_deposit == 1)
                                        <option value="Stripe">Credit card</option>
                                    @endif
                                    @if($settings[0]->bank_deposit == 1)
                                        <option value="Bank">Bank Transfer</option>
                                    @endif
                                    @if($settings[0]->mobile_deposit == 1)
                                        <option value="Mobile">Mobile Money</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <input type="text" id="dep_amount" name="total" class="form-control" placeholder="Deposit Amount" required>
                            </div>
                        </div>

                        <div id="stripes" style="display: none;">
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <input type="text" class="form-control" name="card" placeholder="Card Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <input type="text" class="form-control" name="cvv" placeholder="CVV">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <input type="text" class="form-control" name="month" placeholder="Month">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <input type="text" class="form-control" name="year" placeholder="Year">
                                </div>
                            </div>
                        </div>

                        <div id="bank" style="display: none;text-align: left;">

                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <strong>{!!$settings[0]->bank_info!!}</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <input type="text" class="form-control" name="bank_info" placeholder="Transaction Information">
                                </div>
                            </div>
                        </div>

                        <div id="mobile" style="display: none;text-align: left;">
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <strong>{!!$settings[0]->mobile_info!!}</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                    <input type="text" class="form-control" name="mobile_info" placeholder="Transaction Information">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="acc" value="{{$user->id}}" />

                        <div id="paypals">
                            <input type="hidden" name="cmd" value="_xclick" />
                            <input type="hidden" name="no_note" value="1" />
                            <input type="hidden" name="lc" value="UK" />
                            <input type="hidden" name="currency_code" value="USD" />
                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                        </div>

                        <div id="perfects" style="display: none;text-align: left;">
                            <input type="hidden" name="PAYEE_ACCOUNT" value="{{$settings[0]->pm_account}}">
                            <input type="hidden" name="PAYEE_NAME" value="{{$settings[0]->title}}">
                            <input type="hidden" name="PAYMENT_ID" value="{{str_random(2).time().str_random(2)}}">
                            <input type="hidden" name="PAYMENT_UNITS" value="USD">
                            <input type="hidden" name="STATUS_URL" value="{{route('payment.perfect')}}">
                            <input type="hidden" name="PAYMENT_URL" value="{{route('payment.return')}}">
                            <input type="hidden" name="PAYMENT_URL_METHOD" value="LINK">
                            <input type="hidden" name="NOPAYMENT_URL" value="{{route('nopayment.return')}}">
                            <input type="hidden" name="NOPAYMENT_URL_METHOD" value="LINK">
                            <input type="hidden" name="SUGGESTED_MEMO" value="">
                            <input type="hidden" name="BAGGAGE_FIELDS" value="CUST_NUM">
                            <input type="hidden" name="CUST_NUM" value="{{$user->id}}">
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <input type="submit" name="request_amount" class="btn btn-block send-btn" value="Deposit">
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
                                <p><a href="javascript:;" id="resend-verify">Resend Verification Email</a></p>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Deposit area -->

@stop

@section('footer')
    <script type="text/javascript">
        function meThods(val) {
            var action1 = "{{route('payment.submit')}}";
            var action2 = "{{route('stripe.submit')}}";
            var action3 = "{{route('account.deposit.submit')}}";
            var action4 = "https://perfectmoney.is/api/step1.asp";
            var action5 = "{{action('BlockChainController@deposit')}}";
            if (val.value == "Paypal") {
                $("#payment_form").attr("action", action1);
                $("#dep_amount").attr('name', 'total');
                $("#stripes").hide();
                $("#bank").hide();
                $("#mobile").hide();
            }
            if (val.value == "Stripe") {
                $("#payment_form").attr("action", action2);
                $("#dep_amount").attr('name', 'total');
                $("#stripes").show();
                $("#bank").hide();
                $("#mobile").hide();
            }
            if (val.value == "Bank") {
                $("#payment_form").attr("action", action3);
                $("#dep_amount").attr('name', 'total');
                $("#stripes").hide();
                $("#mobile").hide();
                $("#bank").show();
            }
            if (val.value == "Mobile") {
                $("#payment_form").attr("action", action3);
                $("#dep_amount").attr('name', 'total');
                $("#stripes").hide();
                $("#bank").hide();
                $("#mobile").show();
            }
            if (val.value == "PM") {
                $("#payment_form").attr("action", action4);
                $("#dep_amount").attr('name', 'PAYMENT_AMOUNT');
                $("#stripes").hide();
                $("#bank").hide();
                $("#mobile").hide();
            }
            if (val.value == "BITcoin") {
                $("#payment_form").attr("action", action5);
                $("#dep_amount").attr('name', 'total');
                $("#stripes").hide();
                $("#bank").hide();
                $("#mobile").hide();
            }
        }
    </script>
@stop