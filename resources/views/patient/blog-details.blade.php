@extends('patient.layouts.master')
@section('title', 'Blog')
@section('content')
    <!-- Inner Banner -->
        <div class="inner-banner inner-bg3">
            <div class="container">
                <div class="inner-title">
                    <h3>Blog Details </h3>
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>Blog Details </li>
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

        <!-- Blog Details Area -->
        <div class="blog-details-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-article">
                            <div class="blog-article-img">
                                <img src="{{ asset('upload/article/'.$article->header_img) }}" alt="Images">
                            </div>
                            <div class="blog-status">
                                <ul>
                                    <li><i class="flaticon-calendar"></i> {{ $article->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>

                            <div class="article-content">
                                <h2>{{  $article->header }}</h2>
                                <p>
                                    {{  $article->content }}
                                </p>
                            </div>

                         

                            <div class="blog-article-share">
								<div class="row align-items-center">
									<div class="col-lg-7 col-md-7">
										<div class="blog-tag">
											<ul>
                                                <li>Tags:</li>
												<li><a href="#">{{ $article->category->name }}</a></li>
											</ul>
										</div>
                                    </div>
                                    
									<div class="col-lg-5 col-md-5">
										<ul class="social-icon">
                                            <li class="title">Share:</li>
											<li>
												<a href="#">
													<i class="bx bxl-facebook"></i>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="bx bxl-twitter"></i>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="bx bxl-instagram"></i>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="bx bxl-linkedin"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>
                            </div>

                           
                        </div>
                    </div>

                    <div class="col-lg-4">
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Details Area End -->


    <!-- Doctors Area End -->

@endsection
