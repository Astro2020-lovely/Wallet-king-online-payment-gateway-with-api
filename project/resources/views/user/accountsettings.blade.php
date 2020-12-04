@extends('user.includes.masterpage')

@section('content')

    <!-- Starting of settings -->
    <div class="setting-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="setting-menu">
                        <li class="active">
                            <a href="{{route('account.settings')}}">account setting</a>
                        </li>
                        <li>
                            <a href="{{route('account.security')}}">security setting</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!-- Ending of settings -->

    <!-- Starting of accounting settings -->
    <div class="accounting-settings-wraper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="setting-title text-center">
                        <h2>Update Account</h2>
                    </div>
                    <div class="row">
                        <div id="response" class="col-md-offset-3 col-md-6  col-sm-12  col-xs-12">
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <form class="form-horizontal" method="POST" action="{{ route('account.update',['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-6">
                                <h4>{{ucfirst($user->acctype)}} Account Details</h4>
                            </div>
                        </div>
                        @if($user->acctype == "business")
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="api">Business API Key:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" id="api" value="{{ $user->api_key }}" placeholder="Your API" readonly>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="account_email">Account Email:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="{{ $user->email }}" id="account_email" placeholder="user@gmail.com" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="full_name">Full Name:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="name" value="{{ $user->name }}" id="full_name" placeholder="user1" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="account_gender">Gender:</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="gender">
                                    <option value="">Select Gender</option>
                                    @if($user->gender == "Male")
                                        <option value="Male" selected>Male</option>
                                    @else
                                        <option value="Male">Male</option>
                                    @endif
                                    @if($user->gender == "Female")
                                        <option value="Female" selected>Female</option>
                                    @else
                                        <option value="Female">Female</option>
                                    @endif
                                    @if($user->gender == "Other")
                                        <option value="Other" selected>Other</option>
                                    @else
                                        <option value="Other">Other</option>
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="account_phone">Phone:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="phone" value="{{ $user->phone }}" id="account_phone" placeholder="Phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="account_fax">Fax:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="fax" value="{{ $user->fax }}" id="account_fax" placeholder="Fax">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="account_country">Country:</label>
                            <div class="col-sm-6">

                                <select class="form-control" name="country">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        @if($user->country == $country->name)
                                            <option value="{{$country->name}}" selected>{{$country->nicename}}</option>
                                        @else
                                            <option value="{{$country->name}}">{{$country->nicename}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="account_address">Address:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="address" value="{{ $user->address }}" id="account_address" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="account_city">City:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="city" value="{{ $user->city }}" id="account_city" placeholder="City">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="account_postalCode">Postal Code:</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="zip" value="{{ $user->zip }}" id="account_postalCode" placeholder="ZIP">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-6">
                                <input name="settings_btn" type="submit" class="btn btn-block settings_btn" value="Update Settings" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of accounting settings -->






    {{--<div id="wrapper" class="go-section">--}}
    {{--<div class="row">--}}
        {{--<div class="container">--}}
            {{--<div class="container">--}}
                {{--<!-- Form Name -->--}}
                {{--<ul class="nav nav-tabs">--}}
                    {{--<li class="active"><a href="{{route('account.settings')}}">Account Settings</a></li>--}}
                    {{--<li><a href="{{route('account.security')}}">Security Settings</a></li>--}}
                {{--</ul>--}}

                        {{--<h3 class="text-center">Update Account</h3>--}}
                        {{--<form role="form" method="POST" action="{{ route('account.update',['id' => $user->id]) }}">--}}
                            {{--{{ csrf_field() }}--}}

                            {{--<div class="row">--}}
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
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">Account Email: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<input name="email" value="{{ $user->email }}" placeholder="Enter Email" class="form-control" type="email" disabled>--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">Full Name: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<input name="name" value="{{ $user->name }}" placeholder="Full Name" class="form-control" type="text">--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">Gender: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<select class="form-control" name="gender">--}}
                                            {{--<option value="">Select Gender</option>--}}
                                            {{--@if($user->gender == "Male")--}}
                                                {{--<option value="Male" selected>Male</option>--}}
                                            {{--@else--}}
                                                {{--<option value="Male">Male</option>--}}
                                            {{--@endif--}}
                                            {{--@if($user->gender == "Female")--}}
                                                {{--<option value="Female" selected>Female</option>--}}
                                            {{--@else--}}
                                                {{--<option value="Female">Female</option>--}}
                                            {{--@endif--}}
                                            {{--@if($user->gender == "Other")--}}
                                                {{--<option value="Other" selected>Other</option>--}}
                                            {{--@else--}}
                                                {{--<option value="Other">Other</option>--}}
                                            {{--@endif--}}

                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">Phone: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<input name="phone" value="{{ $user->phone }}" placeholder="Phone Number" class="form-control" type="text">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">Fax: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<input name="fax" value="{{ $user->fax }}" placeholder="Fax Number" class="form-control" type="text">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">Country: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<select class="form-control" name="country">--}}
                                            {{--<option value="">Select Country</option>--}}
                                            {{--@foreach($countries as $country)--}}
                                                {{--@if($user->country == $country->name)--}}
                                                    {{--<option value="{{$country->name}}" selected>{{$country->nicename}}</option>--}}
                                                {{--@else--}}
                                                    {{--<option value="{{$country->name}}">{{$country->nicename}}</option>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">Address: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<input name="address" value="{{ $user->address }}" placeholder="Address" class="form-control" type="text">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">City: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<input name="city" value="{{ $user->city }}" placeholder="City" class="form-control" type="text">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                                {{--<label class="col-md-3"><span class="pull-right">Postal Code: </span></label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<input name="zip" value="{{ $user->zip }}" placeholder="Postal Code" class="form-control" type="text">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<!-- Button -->--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label"></label>--}}
                                {{--<div class="col-md-2">--}}
                                    {{--<button type="submit" class="btn btn-ocean btn-block"><strong>Update Settings</strong></button>--}}
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