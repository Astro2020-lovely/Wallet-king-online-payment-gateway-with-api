@extends('includes.master')

@section('content')

<div id="wrapper" class="go-section">
    <div class="row">
        <div class="container">
            <div class="container">
                <!-- Form Name -->
                <h2 class="text-center">eXpress Payment API</h2>
                <hr>
                <div class="col-md-6">
                    <p>Name: {{Session::get('item_name')}} </p>
                    <p>Item Code: {{Session::get('item_number')}}</p>
                    <p>Amount: {{Session::get('amount')}}</p>
                </div>
                <div class="col-md-6">
                    <div id="e-payment">

                        @if(Auth::guard('profile')->guest())
                            <form id="LoginForm" method="POST" action="{{ route('api.login') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" type="email" required>
                                            <p id="emailError" class="errorMsg"></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="password" placeholder="Password" class="form-control"  type="password" required>
                                            <p id="passError" class="errorMsg"></p>
                                        </div>
                                    </div>
                                </div>
                                <p id="resp"></p>
                                <!-- Button -->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-ocean btn-block" id="LoginButton"><strong>Login</strong></button>
                                    </div>
                                </div>
                            </form>
                        @else
                        <form id="payNow" method="POST" action="{{ route('api.payment') }}">
                            {{ csrf_field() }}
                            Logged In As : {{Auth::guard('profile')->user()->name}}
                            <p id="resp"></p>
                        <!-- Button -->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <button type="submit" onclick="CompletePayNow(this)" class="btn btn-ocean btn-block" id="ConfirmButton"><strong>Confirm Payment</strong></button>
                                </div>
                            </div>
                        </form>
                        @endif

                </div>
                </div>

            </div>
        </div>
    </div>
</div>

@stop

@section('footer')
<script>

    function ChangeUrl(page, url) {
        if (typeof (history.pushState) != "undefined") {
            var obj = { Page: page, Url: url };
            history.pushState(obj, obj.Page, obj.Url);
        } else {
            alert("Browser does not support HTML5.");
        }
    }


    $('#LoginForm').submit(function (go) {

        $("#resp").html('Working..........');
        var postData = $(this).serializeArray();
        var formURL = $(this).attr('action');

        $.ajax({
            url: formURL,
            type: 'POST',
            data: postData,
            success: function(response,status,xhr) {
                setTimeout(function(){

                    if (response.status === "Success"){
                        $("#e-payment").html(response.data);
                        ChangeUrl('EXpress Payment', '{{url('/')}}/express/v1.0/pay?token={{\Illuminate\Support\Facades\Input::get('token')}}');
                    }else{
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

            $("#resp").html('Please Waiting......');
            var postData = $(this).serializeArray();
            var formURL = $(this).attr('action');

            $.ajax({
                url: formURL,
                type: 'POST',
                data: postData,
                success: function(response,status,xhr) {
                    setTimeout(function(){

                        if (response.status === "completed"){
                            $("#resp").html(response.status);
                            setTimeout(function() {
                                window.location = response.redirect_url;
                            },2000);
                        }else{
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
@stop