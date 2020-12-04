@extends('includes.masterpage')

@section('content')

    <div class="send-area-wrapper text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default verify-success-panel">
                        <div class="panel-body text-center verify-success">

                            <form method="POST" action="{{ action('BlockTrailController@store') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input type="text" name="amount" class="form-control" placeholder="Type Your Email">
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
                                    <button type="submit" class="btn login-btn" name="button">Submit</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('footer')

@stop