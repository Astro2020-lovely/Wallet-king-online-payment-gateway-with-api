@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Website Logo -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Payment Information's</h2>
                                    </div>
                                    <hr/>
                                    <div id="response" class="col-md-12">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form method="POST" action="payment" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="paypal_business_account">Paypal Business Account *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="paypal" value="{{$setting->paypal_business}}" id="paypal_business_account" class="form-control" placeholder="Paypal Business Account">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="paypal_business_account1">PerfectMoney Account *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="pm_account" value="{{$setting->pm_account}}" id="paypal_business_account1" class="form-control" placeholder="PerfectMoney Account">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="stripe_key">Stripe Key *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="stripe_key" value="{{$setting->stripe_key}}" id="stripe_key" class="form-control" placeholder="Stripe key">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="stripe_secret_key">Stripe Secret Key *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="stripe_secret" value="{{$setting->stripe_secret}}" id="stripe_secret_key" class="form-control" placeholder="Stripe Secret">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="paypal_business_account">BlockChain Transaction Secret *<span>(Any Secret String to Verify Transaction)</span></label>
                                            <div class="col-sm-8">
                                                <input type="password" name="secret_string" value="{{$setting->secret_string}}" id="paypal_business_account" class="form-control" placeholder="Paypal Business Account">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="stripe_key4">BlockChain API key *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="blockchain_api" value="{{$setting->blockchain_api}}" id="stripe_key4" class="form-control" placeholder="BlockTrail API Key">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="stripe_secret_key3">BlockChain xPub *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="blockchain_xpub" value="{{$setting->blockchain_xpub}}" id="stripe_secret_key3" class="form-control" placeholder="BlockTrail API Key Secret">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="bank_deposit">Bank Deposit Information *</label>
                                            <div class="col-sm-8">
                                                <textarea name="bank_info" id="bank_deposit" class="form-control" style="resize: vertical;">{{$setting->bank_info}}</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="mobile_deposit">Mobile Deposit Information *</label>
                                            <div class="col-sm-8">
                                                <textarea name="mobile_info" id="mobile_deposit" class="form-control" style="resize: vertical;">{{$setting->mobile_info}}</textarea>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="transaction_fee">Transaction Fee *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="transfer_charge" value="{{$setting->transfer_charge}}" id="transaction_fee" class="form-control" placeholder="Transaction Fee" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="transaction_extra_charge">Transaction Extra Charge(%) *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="extra_charge" value="{{$setting->extra_charge}}" id="transaction_extra_charge" class="form-control" placeholder="Transaction Extra Charge" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="withdraw_charge">Withdraw Charge *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="withdraw_fee" value="{{$setting->withdraw_fee}}" id="withdraw_charge" class="form-control" placeholder="Withdraw Charge" required>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="add-product-header">
                                                    <h3 style="margin-bottom: 0">Deposit Options</h3>
                                                </div>
                                                <hr/>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Paypal Deposit *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->paypal_deposit == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="paypal_deposit" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="paypal_deposit" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Stripe Deposit *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->stripe_deposit == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="stripe_deposit" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="stripe_deposit" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable PerfectMoney Deposit *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->pm_deposit == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="pm_deposit" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="pm_deposit" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable BitCoin Deposit *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->blocktrail_deposit == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="blocktrail_deposit" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="blocktrail_deposit" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Mobile Money Deposit *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->mobile_deposit == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="mobile_deposit" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="mobile_deposit" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Bank Deposit *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->bank_deposit == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="bank_deposit" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="bank_deposit" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="add-product-header">
                                                    <h3 style="margin-bottom: 0">Withdraw Options</h3>
                                                </div>
                                                <hr/>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Paypal Withdraw *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->paypal_withdraw == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="paypal_withdraw" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="paypal_withdraw" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Bank Withdraw *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->bank_withdraw == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="bank_withdraw" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="bank_withdraw" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Skrill Withdraw *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->skrill_withdraw == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="skrill_withdraw" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="skrill_withdraw" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Payoneer Withdraw *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->payoneer_withdraw == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="payoneer_withdraw" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="payoneer_withdraw" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update setting</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Website Logo -->


                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')
<script>

    $('#use-adds').click(function () {
        if($(this).is(":checked")){
            $("#adds").show();
            $("#acc").hide();
            $("#adds").find('input[name="wallet_address"]').attr('required',true);
        }else{
            $("#adds").hide();
            $("#acc").show();
            $("#adds").find('input').attr('required',false);
        }
    });
    bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('bank_deposit');
            new nicEditor().panelInstance('mobile_deposit');
        });
</script>
@stop