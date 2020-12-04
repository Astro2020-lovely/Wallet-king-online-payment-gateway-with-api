@extends('includes.master')

@section('content')

    <section class="go-section">
        <div class="row">
            <div class="container">
                <div class="col-md-offset-2 col-md-8">
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-12 text-center services">
                    <div class="col-md-offset-2 col-md-8 order-div">

                        <div class="col-md-8 order-left">
                            <h4>ENTER YOUR DETAILS</h4>
                            <form action="{{route('payment.submit')}}" method="post" id="payment_form">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="city" placeholder="City" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="zip" placeholder="Postal Code" required>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" onChange="meThods(this)" id="formac" name="method" required>
                                        <option value="Paypal" selected>Paypal</option>
                                        <option value="Stripe">Credit Card</option>
                                        <option value="Cash">Pay After Service</option>
                                    </select>
                                </div>
                                <div id="stripes" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="card" placeholder="Card">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cvv" placeholder="Cvv">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="month" placeholder="Month">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="year" placeholder="Year">
                                    </div>
                                </div>
                                <div id="paypals">

                                <input type="hidden" name="cmd" value="_xclick" />
                                <input type="hidden" name="no_note" value="1" />
                                <input type="hidden" name="lc" value="UK" />
                                <input type="hidden" name="currency_code" value="USD" />
                                <input type="hidden" name="service" value="{{$pricing->id}}" />
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                <button type="submit" class="genius-btn"> Checkout</button>
                                </div>
                            </form>


                        </div>
                        <div class="col-md-4 order-right">
                            <h4>ORDER DETAILS</h4>
                            <h3>{{$pricing->title}}</h3>
                            <h3 class="pricing-count" style="margin: 0">${{$pricing->cost}} USD</h3>
                            <div class="pricing-list">
                                <ul>
                                    @foreach($pricing->options as $option)
                                        @if($option != "")
                                            <li><i class="fa fa-check"></i> {{$option}}</li>
                                        @else
                                            <li>&nbsp;</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@stop

@section('footer')
    <script type="text/javascript">
        function meThods(val) {
            var action1 = "{{route('payment.submit')}}";
            var action2 = "{{route('stripe.submit')}}";
            var action3 = "{{route('cash.submit')}}";
            if (val.value == "Paypal") {
                $("#payment_form").attr("action", action1);
                $("#stripes").hide();
            }
            if (val.value == "Stripe") {
                $("#payment_form").attr("action", action2);
                $("#stripes").show();
            }
            if (val.value == "Cash") {
                $("#payment_form").attr("action", action3);
                $("#stripes").hide();
            }
        }
    </script>
@stop