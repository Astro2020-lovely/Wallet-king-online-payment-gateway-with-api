@extends('includes.masterpage')
@section('content')


    @if($pagesettings[0]->slider_status)
    <section class="go-slider">
        <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

            <!-- Indicators -->
            <ol class="carousel-indicators">
                @for ($i = 0; $i < count($sliders); $i++)
                    @if($i == 0)
                        <li data-target="#bootstrap-touch-slider" data-slide-to="{{$i}}" class="active"></li>
                    @else
                        <li data-target="#bootstrap-touch-slider" data-slide-to="{{$i}}"></li>
                    @endif
                @endfor
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

            @for ($i = 0; $i < count($sliders); $i++)
                @if($i == 0)
                    <!-- Third Slide -->
                        <div class="item active">

                            <!-- Slide Background -->
                            <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                            <div class="bs-slider-overlay"></div>

                            <div class="container">
                                <div class="row">
                                    <!-- Slide Text Layer -->
                                    <div class="slide-text {{$sliders[$i]->text_position}}">

                                        <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                                        <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End of Slide -->
                @else
                    <!-- Second Slide -->
                        <div class="item">

                            <!-- Slide Background -->
                            <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                            <div class="bs-slider-overlay"></div>
                            <!-- Slide Text Layer -->
                            <div class="slide-text {{$sliders[$i]->text_position}}">
                                <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                                <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>
                            </div>
                        </div>
                        <!-- End of Slide -->
                    @endif
                @endfor


            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div> <!-- End  bootstrap-touch-slider Slider -->

    </section>
    @endif

    @if($pagesettings[0]->service_status)
    <!-- Starting of service area -->
    <div class="section-padding service-area-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->service_title}}</h2>
                        <p>{{$languages->service_text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-md-4 col-sm-6">
                    <div class="single-service-box">
                        <div class="service-icon">
                            <img src="{{url('/assets/images/service')}}/{{$service->icon}}" alt="">
                        </div>
                        <div class="service-text">
                            <h3>{{$service->title}}</h3>
                            <p>{{$service->text}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Ending of service area -->
    @endif

    @if($pagesettings[0]->counter_status)
    <!-- Starting of counterUp area -->
    <div class="counter-up-section text-center wow fadeInUp" style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="overlay">
            <div class="container">
            <div class="row">
                <div class="conuter-up-textArea">

                    @foreach($counters as $counter)
                    <div class="col-md-3 col-sm-6">
                        <div class="single-counter-box">
                            <img src="{{url('/assets/images/counter')}}/{{$counter->icon}}">
                            <h2 class="counter-number">{{$counter->number}}</h2>
                            <p>{{$counter->title}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Ending of counterUp area -->
    @endif

    @if($pagesettings[0]->portfolio_status)
    <!-- Starting of Gallery area -->
    <div class="section-padding gallery-area-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->portfolio_title}}</h2>
                        <p>{{$languages->portfolio_text}}</p>
                    </div>
                </div>
            </div>

            <div class="row gallery-list">
                @foreach($portfilos as $portfilo)
                <div class="col-md-4 col-sm-6 col-xs-12 design">
                    <div class="single-gallery-item">
                        <img src="{{url('/')}}/assets/images/portfolio/{{$portfilo->image}}" alt="Gallery image">
                        <div class="gallery-overlay"></div>
                        <div class="gallery-icons">
                            <a class="image-popup" href="{{url('/')}}/assets/images/portfolio/{{$portfilo->image}}">
                                <i class="fa fa-search-plus"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Ending of Gallery area -->
    @endif

    @if($pagesettings[0]->slider_status)
    <!-- Starting of carousel testimonial area -->
    <div class="home-testimonial-wrapper wow fadeInUp" style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">

        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="section-title text-center">
                            <h2>{{$languages->testimonial_title}}</h2>
                            <p>{{$languages->testimonial_text}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="testimonial-section animated fadeInRight">
                            @foreach($testimonials as $testimonial)
                            <div class="single-testimonial-area">
                                <div class="testimonial-text">
                                    <p>{{$testimonial->review}}</p>
                                </div>
                                <div class="testimonial-author">
                                    <img src="assets/images/testimonial/testimonial-author-1.png" alt="Author">
                                    <h4><strong>{{$testimonial->client}}</strong> <br> {{$testimonial->designation}}</h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of carousel testimonial area -->
    @endif

    @if($pagesettings[0]->blog_status)
    <!-- Starting of blog area -->
    <div class="section-padding blog-area-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->blog_title}}</h2>
                        <p>{{$languages->blog_text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-area-slider">
                        @foreach($blogs as $blog)
                        <div class="single-blog-box">
                            <div class="blog-thumb-wrapper">
                                <img src="{{url('/')}}/assets/images/blog/{{$blog->featured_image}}" alt="Blog Image">
                            </div>
                            <div class="blog-text">
                                <p class="blog-meta">{{date('d M Y',strtotime($blog->created_at))}}</p>
                                <h4>{{$blog->title}}</h4>
                                <p>{{substr(strip_tags($blog->details),0,125)}}</p>
                                <a href="{{url('/blog')}}/{{$blog->id}}" class="blog-more-btn">{{$language->view_details}}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of blog area -->
    @endif

@stop

@section('footer')
<script>

</script>
@stop