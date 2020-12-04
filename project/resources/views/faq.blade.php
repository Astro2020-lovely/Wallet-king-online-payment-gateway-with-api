@extends('includes.masterpage')

@section('content')


    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row page-row">

            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>{{$language->faq}}</h1>
                </div>
            </div>

        </div>


    </section>

    <!-- Starting of faq area -->
    <div class="section-padding wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{--<h3>Most Asked Questions</h3>--}}
                    <div class="panel-group product-faq" id="asked-questions">
                        @foreach($faqs as $faq)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a href="#asked-questions-{{$faq->id}}" data-parent="#asked-questions" data-toggle="collapse" aria-expanded="false">
                                        {{$faq->question}}
                                    </a>
                                </div>
                                <div id="asked-questions-{{$faq->id}}" class="panel-collapse collapse" aria-expanded="false">
                                    <div class="panel-body">
                                        <p>{!! $faq->answer !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of faq area -->

@stop

@section('footer')

@stop