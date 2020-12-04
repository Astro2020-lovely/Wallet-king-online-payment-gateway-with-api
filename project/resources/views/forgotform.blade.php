@extends('includes.masterpage')

@section('content')


    <div class="section-padding login-area-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="login-header text-center">
                        <h2>Forgot Password</h2>
                    </div>
                    <hr/>
                    <form class="form-horizontal" method="POST" action="{{ route('user.forgotpass.submit') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                                <input name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" type="email" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                                <input type="submit" name="login_btn" class="btn login_btn btn" value="Submit">
                                <a href="{{route('user.login')}}" class="forgot-password pull-right">Login Now</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    {{--<div id="wrapper" class="go-section">--}}
    {{--<div class="row">--}}
        {{--<div class="container">--}}
            {{--<div class="container">--}}
                {{--<!-- Form Name -->--}}
                {{--<h2 class="text-center">Forgot Password</h2>--}}
                {{--<hr>--}}

                {{--<form role="form" method="POST" action="{{ route('user.forgotpass.submit') }}">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6 col-md-offset-3">--}}
                            {{--<div class="form-group">--}}
                                {{--<input name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" type="email" required>--}}
                                {{--<p id="emailError" class="errorMsg"></p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div id="resp" class="col-md-6 col-md-offset-3">--}}
                        {{--@if(Session::has('success'))--}}
                            {{--<div class="alert alert-success alert-dismissable">--}}
                                {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                                {{--{{ Session::get('success') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--@if(Session::has('error'))--}}
                            {{--<div class="alert alert-danger alert-dismissable">--}}
                                {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                                {{--{{ Session::get('error') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}

                    {{--</div>--}}
                    {{--<!-- Button -->--}}
                    {{--<div class="form-group">--}}
                        {{--<label class="col-md-5 control-label"></label>--}}
                        {{--<div class="col-md-2">--}}
                            {{--<button type="submit" class="btn btn-ocean btn-block" id="LoginButton"><strong>Submit</strong></button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

@stop

@section('footer')

@stop