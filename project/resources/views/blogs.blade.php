@extends('includes.masterpage')

@section('content')

    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row page-row">

            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>{{$language->blog}}</h1>
                </div>
            </div>

        </div>
    </section>


    <div class="section-padding wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach($blogs as $blog)
                        <div class="col-sm-6 col-md-4 col-lg-4 single-blog">
                            <a href="{{url('/')}}/blog/{{$blog->id}}">
                                <div class="blog-thumb-wrapper">
                                    <img src="assets/images/blog/{{$blog->featured_image}}" alt="Blog Image">
                                </div>
                                <div class="blog-text">
                                    <p class="blog-meta">{{date('d M Y',strtotime($blog->created_at))}}</p>
                                    <h4>{{$blog->title}}</h4>
                                    <p>{{substr(strip_tags($blog->details),0,125)}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop