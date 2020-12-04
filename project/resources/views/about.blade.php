@extends('includes.masterpage')

@section('content')

    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row page-row">

            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>{{$language->about_us}}</h1>
                </div>
            </div>

        </div>
    </section>

    <!-- Starting of about us area -->
    <div class="section-padding about-area-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    {!! $pagedata->about !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of about us area -->

@stop

@section('footer')

@stop