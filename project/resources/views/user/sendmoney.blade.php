@extends('user.includes.masterpage')

@section('content')


    <!-- Starting of send area -->
    <div class="send-area-wrapper text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    @if($user->email_verified == 'yes')
                    <div class="section-title">
                        <h2>{{$language->send}}</h2>
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
                    <form class="form-horizontal" method="POST" action="{{ route('account.send.submit') }}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <input type="email" name="email" id="reqemail" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" required>
                                <div id="recieverError" class="errorMsg"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <input type="text" name="amount" value="{{ old('amount') }}" class="form-control" placeholder="Send Amount" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <textarea name="reference" class="form-control" cols="30" rows="10" style="resize: vertical;" placeholder="Referance(Optional)">{{ old('reference') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <input type="submit" id="sbmtbtn" name="send_amount" class="btn btn-block send-btn" value="Send">
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
                                <h4><a href="javascript:;" id="resend-verify">Resend Verification Email</a></h4>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of send area -->

@stop

@section('footer')

@stop