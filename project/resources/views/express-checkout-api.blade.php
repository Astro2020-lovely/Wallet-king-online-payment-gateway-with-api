<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wallet Pro</title>

    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/slicknav.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/responsive.css')}}" rel="stylesheet">
    <style>
        #resp{
            color: #ff0000;
        }
        .freeloader {
            position: fixed;
            left: 0;
            top: 0;
            z-index: 999;
            width: 100%;
            height: 100%;
            overflow: visible;
            background: rgba(0,0,0,.4) url('{{url('assets')}}/images/freeload.gif') no-repeat center center;
        }
    </style>
</head>
<body>

<!-- Starting of paypal login area -->
<div class="section-padding paypal-login-area-wrapper">
    <div class="freeloader"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="paypal-login-header">
                    <h2> Express Payment </h2>
                </div>
                <div class="paypal-login-area">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <div class="paypal-logo-header">
                                <img src="{{url('assets/images/logo')}}/{{$settings[0]->logo}}" alt="paypal logo">
                                <p class="paypal-addToCart pull-right">
                                    <i class="fa fa-cart-arrow-down"></i>
                                    <span>${{Session::get('amount')}} USD</span>
                                </p>
                            </div>
                            <div id="e-payment">
                                @if(Auth::guard('profile')->guest())
                                <form class="form-horizontal paypal-login" id="LoginForm" method="POST" action="{{ route('api.login') }}">
                                    <h2>Log In to {{$settings[0]->title}} </h2>
                                    {{ csrf_field() }}
                                    <p id="resp"></p>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <input type="submit" name="paypal_btn" class="btn btn-block paypal_btn" value="Log In">
                                        </div>
                                    </div>
                                </form>
                                @else
                                    <form id="payNow" method="POST" action="{{ route('api.payment') }}">
                                        {{ csrf_field() }}
                                        <p id="resp"></p>
                                        <div class="paypal-pay-area">
                                            <h3>Hi, {{Auth::guard('profile')->user()->name}}</h3>
                                            <div class="paypal-ship-area">
                                                <p>You are paying ${{Session::get('amount')}} to {{Session::get('payee')}} account.</p>
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="form-group">
                                                <button type="submit" onclick="CompletePayNow(this)" class="btn btn-block paypal_btn" id="ConfirmButton"><strong>Confirm Payment</strong></button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="paypal-login-rightside">
                                <h3>
                                    @if(\App\UserAccount::where('email',Session::get('payee'))->first()->business_name != null)
                                        {{\App\UserAccount::where('email',Session::get('payee'))->first()->business_name}}'s Store
                                    @else
                                        {{Session::get('payee')}}
                                    @endif
                                </h3>
                                <div class="paypal-single-div">
                                    <div class="pull-left">
                                        <strong>Iten Name: </strong>{{Session::get('item_name')}}
                                    </div>

                                </div>
                                <div class="paypal-single-div">
                                    <div class="pull-left">
                                        <strong>Item Code: </strong>{{Session::get('item_number')}}
                                    </div>

                                </div>
                                <div class="paypal-single-div">
                                    <div class="pull-left"><strong>Total</strong></div>
                                    <div class="pull-right">${{Session::get('amount')}} USD</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="paypal-login-footer">
                    <a href="{!!Session::get('cancel_return')!!}" target="_self"> Cancel and Return</a>
                    <ul class="pull-right">
                        <li><a href="">Policies</a></li>
                        <li><a href="">Terms</a></li>
                        <li><a href="">Privacy</a></li>
                        <li><a href="">Feedback</a></li>
                        <li><a href="">© 1999-2017
                                <i class="fa fa-lock"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ending of paypal login area -->


<script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/wow.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.slicknav.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/responsive.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/user-main.js')}}"></script>
<script>


    $(window).load(function(){
        setTimeout(function(){
            $('.freeloader').fadeOut(1000);
        },1000)
    });

    function ChangeUrl(page, url) {
        if (typeof (history.pushState) != "undefined") {
            var obj = { Page: page, Url: url };
            history.pushState(obj, obj.Page, obj.Url);
        } else {
            alert("Browser does not support HTML5.");
        }
    }

    $('#LoginForm').submit(function (go) {

        $(".freeloader").fadeIn();
        var postData = $(this).serializeArray();
        var formURL = $(this).attr('action');

        $.ajax({
            url: formURL,
            type: 'POST',
            data: postData,
            success: function(response,status,xhr) {
                setTimeout(function(){

                    if (response.status === "Success"){
                        $(".freeloader").fadeOut();
                        $("#e-payment").html(response.data);
                        ChangeUrl('EXpress Payment', '{{url('/')}}/express/web/pay?token={{\Illuminate\Support\Facades\Input::get('token')}}');
                    }else{
                        $(".freeloader").fadeOut();
                        $("#resp").html(response.message);
                    }

                }, 1000);

            },
            error: function(jqXHR, textStatus, errorThrown) {

            },
            complete: function() {

            }
        });

        go.preventDefault();	//STOP default action
        go.unbind();
    });

    //function CompletePayNow(pay) {
    //$(pay).parents('form:first').submit(function (go) {
    $(document.body).on('submit', '#payNow' ,function(go){
        $(".freeloader").fadeIn();
        var postData = $(this).serializeArray();
        var formURL = $(this).attr('action');

        $.ajax({
            url: formURL,
            type: 'POST',
            data: postData,
            success: function(response,status,xhr) {
                setTimeout(function(){

                    if (response.status === "completed"){
                        $(".freeloader").fadeOut();
                        $("#e-payment").html(response.data);
                        setTimeout(function() {
                            window.location.href = response.redirect_url;
                        },5000);
                    }else{
                        $(".freeloader").fadeOut();
                        $("#resp").html(response.message);
                    }

                }, 1000);

            },
            error: function(jqXHR, textStatus, errorThrown) {

            },
            complete: function() {

            }
        });

        go.preventDefault();	//STOP default action
        go.unbind();
    });
    //}

</script>
</body>
</html>
