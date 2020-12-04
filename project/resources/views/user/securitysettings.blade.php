@extends('user.includes.masterpage')

@section('content')

    <!-- Starting of settings -->
    <div class="setting-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="setting-menu">
                        <li>
                            <a href="{{route('account.settings')}}">account setting</a>
                        </li>
                        <li class="active">
                            <a href="{{route('account.security')}}">security setting</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of settings -->

    <!-- Starting of Security settings -->
    <div class="accounting-settings-wraper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="setting-title text-center">
                        <h2>Change Password</h2>
                    </div>
                    <form class="form-horizontal" method="POST" action="{{ action('UserAccountController@passchange',['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="security_current_password">Current Password:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="password" name="cpass" id="security_current_password" placeholder="Current Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="security_new_password">New Password:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="password" name="newpass" id="security_new_password" placeholder="New Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="security_confirm_password">Confirm New Password:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="password" name="renewpass" id="security_confirm_password" placeholder="Confirm New Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                        <div id="resp" class="col-md-6 col-md-offset-3">
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
                        <div id="resp" class="col-md-6 col-md-offset-3">
                            @if ($errors->has('error'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-6">
                                <input name="security_btn" type="submit" class="btn btn-block settings_btn" value="Update Password" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Security settings -->





    {{--<div id="wrapper" class="go-section">--}}
    {{--<div class="row">--}}
        {{--<div class="container">--}}
            {{--<div class="container">--}}
                {{--<!-- Form Name -->--}}
                {{--<h2 class="text-center">Account Settings</h2>--}}
                {{--<ul class="nav nav-tabs">--}}
                    {{--<li><a href="{{route('account.settings')}}">Account Settings</a></li>--}}
                    {{--<li class="active"><a href="{{route('account.security')}}">Security Settings</a></li>--}}
                {{--</ul>--}}

                        {{--<h3 class="text-center">Change Password</h3>--}}
                        {{--<form method="POST" action="{{ action('UserAccountController@passchange',['id' => $user->id]) }}">--}}
                            {{--{{ csrf_field() }}--}}

                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">Current Password: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<input name="cpass" placeholder="Current Password" class="form-control" type="password" required>--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- Text input-->--}}
                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">New Password: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<input name="newpass" placeholder="New Password" class="form-control"  type="password" required>--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<!-- Text input-->--}}
                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">Confirm Password: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<input name="renewpass" placeholder="Confirm New Password" class="form-control"  type="password" required>--}}

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
                            {{--</div>--}}
                            {{--<div id="resp" class="col-md-6 col-md-offset-3">--}}
                                {{--@if ($errors->has('error'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                            {{--<!-- Button -->--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-5 control-label"></label>--}}
                                    {{--<div class="col-md-2">--}}
                                        {{--<button type="submit" class="btn btn-ocean btn-block"><strong>Update Password</strong></button>--}}
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