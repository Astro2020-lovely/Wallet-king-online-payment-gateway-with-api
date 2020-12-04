@extends('includes.masterpage')

@section('content')


    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row page-row">

            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>{{$language->contact_us}}</h1>
                </div>
            </div>

        </div>
    </section>


    <!-- Starting of contact us area -->
    <div class="section-padding contact-area-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <h3>{{$language->contact_us_today}}</h3>
                    {{--<p>Sifting through teaspoons of clay and sand scraped from the floors of caves, German researchers have to bemanaged to isolate ancient human DNA without turning up a single bone.</p>--}}
                    <div class="comments-area">
                        <div class="comments-form">
                            <form action="{{action('FrontEndController@contactmail')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="to" value="{{$pagedata->contact_email}}">
                                <!-- Success message -->
                                @if(Session::has('cmail'))
                                    <div class="alert alert-success" role="alert" id="success_message">
                                        {{ Session::get('cmail') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <input name="name" type="text" placeholder="Your Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="phone" type="tel" placeholder="Your Phone">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input name="email" type="email" placeholder="Your Email" required>
                                    </div>
                                </div>
                                <p><textarea name="message" id="comment" placeholder="Write a Replay" cols="30" rows="10" required></textarea></p>
                                <input name="contact_btn" type="submit" value="Send Message">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-5">
                    <div class="contact-info padding-top-100">
                        <p class="contact-info">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            {{$settings[0]->address}}
                        </p>
                        @if($settings[0]->phone != null)
                            <p class="contact-info">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                Phone :  <a href="tel:{{$settings[0]->phone}}">{{$settings[0]->phone}}</a><br/>
                            </p>
                        @endif
                        @if($settings[0]->fax != null)
                            <p class="contact-info">
                                <i class="fa fa-fax" aria-hidden="true"></i>
                                Fax :  <a href="tel:{{$settings[0]->fax}}">{{$settings[0]->fax}}</a><br/>
                            </p>
                        @endif
                        <p class="contact-info">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                            Site :  <a href="{{url('/')}}">{{$_SERVER['SERVER_NAME']}}</a><br/>
                        </p>
                        <p class="contact-info">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            Email :  <a href="mailto:{{$settings[0]->email}}">{{$settings[0]->email}}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of contact us area -->

@stop

@section('footer')

@stop