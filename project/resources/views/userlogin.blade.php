@extends('includes.masterpage')

@section('content')


    <section class="login-area">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12">
                    <div class="login-form">
                        <div class="login-icon"><i class="fa fa-user"></i></div>

                        <div class="section-borders">
                            <span></span>
                            <span class="black-border"></span>
                            <span></span>
                        </div>

                        <div class="login-title">{{$language->log_in}}</div>

                        <form method="POST" action="{{ route('user.login.submit') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Type Your Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-unlock-alt"></i>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Type Your Password">
                                </div>
                            </div>
                            <div>
                                @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ Session::get('error') }}
                                    </div>
                                @endif

                                @if ($errors->has('password'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif

                                @if ($errors->has('email'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn login-btn" name="button">LOGIN</button>

                            </div>
                            <div class="form-group text-center">
                                <a href="{{route('user.forgotpass')}}" class="forgot-password">Forgot Password?</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>




    {{--<!-- Starting of login area -->--}}
    {{--<div class="section-padding login-area-wrapper">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                    {{--<div class="login-header text-center">--}}
                        {{--<h2>{{$language->log_in}}</h2>--}}
                    {{--</div>--}}
                    {{--<hr/>--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('user.login.submit') }}">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<div class="form-group">--}}
                            {{--<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">--}}
                                {{--<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">--}}
                                {{--<input type="password" name="password" class="form-control" placeholder="Password" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">--}}
                            {{--@if(Session::has('error'))--}}
                                {{--<div class="alert alert-danger alert-dismissable">--}}
                                    {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                                    {{--{{ Session::get('error') }}--}}
                                {{--</div>--}}
                            {{--@endif--}}

                            {{--@if ($errors->has('password'))--}}
                                    {{--<div class="alert alert-danger alert-dismissable">--}}
                                        {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</div>--}}
                            {{--@endif--}}
                            {{--@if ($errors->has('email'))--}}
                                    {{--<div class="alert alert-danger alert-dismissable">--}}
                                        {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</div>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">--}}
                                {{--<input type="submit" name="login_btn" class="btn login_btn btn" value="{{$language->log_in}}">--}}
                                {{--<a href="{{route('user.forgotpass')}}" class="forgot-password pull-right">Forgot Password?</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- Ending of login area -->--}}




@stop

@section('footer')

@stop