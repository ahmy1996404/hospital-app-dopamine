@extends('patient.layouts.master')
@section('title', 'About')
@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg1">
        <div class="container">
            <div class="inner-title">
                <h3>About Us</h3>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>About Us</li>
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
    <!-- About Area -->
    <div class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-right-img">
                        <img src="{{ asset('patient/assets/img/about-img/about-img2.jpeg') }}" alt="Images">
                         
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
                        
 
 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->
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
