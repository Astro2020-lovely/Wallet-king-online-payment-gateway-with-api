@extends('includes.master')

@section('content')

    <section class="go-section">
        <div class="row">
            <div class="container">
                <h2 class="text-center">{{$pagename}}</h2>
                <hr>
                @foreach($services as $service)
                <div class="col-md-4 text-center services">
                    <div class="single-box">
                        <h1>{{$service->cost}}$</h1>
                        <p>{!! $service->details !!}</p>

                        <a href="{{url('/services/order')}}/{{$service->id}}" class="genius-btn">
                            Order Now
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@stop

@section('footer')

@stop