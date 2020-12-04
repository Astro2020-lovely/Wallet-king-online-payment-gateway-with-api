@extends('includes.masterpage')

@section('content')

    <!-- Starting of Register area -->
    <div class="section-padding registration-area-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="login-header text-center">
                        <h2>{{$language->sign_up}}</h2>
                    </div>
                    <hr/>
                    <form class="form-horizontal" action="{{route('user.typereg')}}" method="get"  id="registration_form">

                    <!-- Text input-->

                        <div class="col-md-4 col-md-offset-4 acctype">
                            <div class="radio">
                                <input type="radio" class="big" id="radio-1" name="type" value="basic" required>
                                <label for="radio-1">{{$language->personal}}</label>
                                <p>{{$language->personal_details}}</p>
                            </div>
                            <div class="radio">
                                <input type="radio" class="big" id="radio-2" name="type" value="business" required>
                                <label for="radio-2">{{$language->business}}</label>
                                <p>{{$language->business_details}}</p>
                            </div>
                        </div>

                        <div id="resp" class="col-md-6 col-md-offset-3">
                            @if ($errors->has('name'))
                                <div class="alert alert-danger alert-dismissable">
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>* {{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                            @if ($errors->has('email'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>* {{ $errors->first('email') }}</strong>
                                    </div>
                            @endif
                            @if ($errors->has('password'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>* {{ $errors->first('password') }}</strong>
                                    </div>
                            @endif
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-5 control-label"></label>
                            <div class="col-md-2">
                                <button type="submit" class="btn login_btn btn-block" >{{$language->next}}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Register area -->

@stop

@section('footer')

@stop