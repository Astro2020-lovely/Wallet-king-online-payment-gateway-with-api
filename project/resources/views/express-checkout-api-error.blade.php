<!DOCTYPE html>
<html lang="en">
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

</head>
<body>

<!-- Starting of paypal login area -->
<div class="section-padding paypal-login-area-wrapper">
    {{--<div class="loader">--}}
        {{--<div id="spinner">--}}
            {{--<img src="assets/img/loader.gif">--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="paypal-login-header">
                    <h2> Express Payment </h2>
                </div>
                <div class="paypal-login-area">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="paypal-logo-header">
                                <img src="{{url('assets/images/logo')}}/{{$settings[0]->logo}}" alt="paypal logo">
                            </div>
                            <h1></h1>
                            @if(Session::has('message'))
                                <h3 class="text-center">{{ Session::get('message') }}</h3>
                            @endif
                            <h3 class="text-center">Sorry some problem with your request,<br>Please Try Again Correctly.</h3>
                            <a href="{{Session::get('cancel_return')}}" class="btn btn-block paypal_btn"> Cancel and Return </a>

                        </div>

                    </div>
                </div>
                <div class="paypal-login-footer">
                    <a href="{{Session::get('cancel_return')}}"> Cancel and Return</a>
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
</body>
</html>
