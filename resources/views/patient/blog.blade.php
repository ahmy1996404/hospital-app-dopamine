@extends('patient.layouts.master')
@section('title', 'Blog')
@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg4">
        <div class="container">
            <div class="inner-title">
                <h3> Blog </h3>
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li> Blog </li>
                </ul>
            </div>
        </div>
        <div class="inner-banner-shape">
            <div class="shape1">
                <img src="{{ asset('patient/assets/img/inner-banner/inner-banner-shape1.png') }}" alt="Images">
            </div>
            <div class="shape2">
                <img src="{{ asset('patient/assets/img/inner-banner/inner-banner-shape2.png') }}" alt="Images">
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Blog Area -->
    <div class="blog-area blog-area-item pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Our News & Updates</h2>
                <div class="section-icon">
                    <div class="icon">
                        <i class="flaticon-dna"></i>
                    </div>
                </div>
                <p>
                    We provide excellent services for your ultimate good health. Here some of the services are included
                    for your better understand that we are always at your side.
                </p>
            </div>
            <div class="row pt-45">
                @foreach ($articles as $article)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-item-img">
                                <a href="blog-details.html">
                                    <img style="
        width: 28vw;
        height: 50vh;
    " src="{{ asset('upload/article/thumb/' . $article->thumbnail_img) }}" alt="Images">
                                </a>
                                <div class="date">
                                    <ul>
                                        <li>{{ $article->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <span class="topic">
                                    <a href="{{ route('patient.blog.details',['id'=>$article->id]) }}">{{ $article->category->name }}</a>
                                </span>
                                <h3>
                                    <a href="{{ route('patient.blog.details',['id'=>$article->id]) }}"> {{ $article->header }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <div class="blog-shape-icon">
            <i class="flaticon-dna"></i>
        </div>
    </div>
    <!-- Blog Area End -->


    <!-- Doctors Area End -->

@endsection
