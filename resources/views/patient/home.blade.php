@extends('patient.layouts.master')
@section('title', 'Home')
@section('content')
    <!-- Banner Area -->
    <div class="banner-area banner-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="banner-content">
                        <span>The Home of Your Hope</span>
                        <h1>Your Good Health is Our Responsibility</h1>
                        <p>Get your appointment through online and remain safe at your home. Because your safety is our
                            first priority.</p>
                        <div class="banner-btn">
                            <a href="{{ route('patient.doctors') }}" class="appointment-btn">Our Doctors</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-img">
            <img src="{{ asset('patient/assets/img/home-one/home-one-img.png') }}" alt="Images">
        </div>
        <div class="banner-shape">
            <div class="shape1">
                <img src="{{ asset('patient/assets/img/home-one/shape1.png') }}" alt="Images">
            </div>
            <div class="shape2">
                <img src="{{ asset('patient/assets/img/home-one/shape2.png') }}" alt="Images">
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Banner Bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-bottom-card">
                        <i class='flaticon-call'></i>
                        <div class="content">
                            <span>Get Emergency Service At 24/7</span>
                            <h3><a href="tel:+8-(123)-456-789-12">+8 (123) 456 789 12</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Bottom End -->

    <!-- About Area -->
    <div class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{ asset('patient/assets/img/about-img/about-img.png') }}" alt="Images">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>{{ $aboutUs->header }}</h2>
                            <p>{{ $aboutUs->content }} </p>
                             
                        </div>
                        @foreach ($aboutUs->service as  $service)
                            <div class="about-card">
                            <i class='{{ $service->icon }} bg-one'></i>
                            <div class="content">
                                <span>{{ $service->header }}</span>
                                <p>{{ $service->content }} </p>
                            </div>
                        </div>
                        @endforeach
                        
 

                        <div class="about-btn">
                            <a href="{{ route('patient.about') }}" class="default-btn">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    
   

    <!-- Consultancy Area -->
    <div class="consultancy-area" style="    margin-top: -20px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="consultancy-img">
                        <img src="{{ asset('patient/assets/img/consultancy/consultancy-img.png') }}" alt="Images">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="consultancy-content">
                        <h2>Need Online Consultancy?</h2>
                        <p>Just fill up the form and get consultation with the expert doctors of the world in a few minutes.
                        </p>

                        <div class="consultancy-form">
                            <div>
                                <div class="row">
                                     
                                    <div class="col-lg-12 col-md-12">
                                        <a href="{{ route('patient.chat.index') }}" class="default-btn">
                                            Get Online Consultancy
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Consultancy Area End -->

    <!-- Doctors Area -->
    <div class="doctors-area ptb-100">
        <div class="container">
            <div class="section-title text-center">
                <h2>Meet Our Experts</h2>
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
            <div class="doctors-slider owl-carousel owl-theme pt-45">
                @foreach ($doctors as $doctor )
                <div class="doctors-item">
                    <div class="doctors-img">
                        <a href="{{ route('patient.doctor.details',['id'=>$doctor->doctor->id]) }}">
                            @if ($doctor->profile_photo_path != null)
                                    <img src="{{ asset('/upload/doctor/' . $doctor->profile_photo_path) }}" >
                                @else
                                    <img src="{{ asset('upload/noimagejpg.jpg') }}" >
                                @endif
                        </a>
                    </div>
                    
                        
                    <div class="content">
                        <h3><a href="doctors-details.html">{{ $doctor->name }}</a></h3>
                        <span>{{ $doctor->doctor->speciality->name }}</span>
                         
                    </div>
                </div>
                    @endforeach

            </div>
        </div>

        <div class="doctors-shape">
            <div class="doctors-shape-1">
                <img src="{{ asset('patient/assets/img/doctors/doctors-shape1.png') }}" alt="Images">
            </div>
            <div class="doctors-shape-2">
                <img src="{{ asset('patient/assets/img/doctors/doctors-shape2.png') }}" alt="Images">
            </div>
        </div>
    </div>
    <!-- Doctors Area End -->
 
   
@endsection
