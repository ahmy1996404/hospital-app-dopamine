@extends('patient.layouts.master')
@section('title', 'Doctors Details')
@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner  ">
        <div class="container">
            <div class="inner-title">
                <h3>{{ $doctor->user->name }}</h3>
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>Doctors Details</li>
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
    <!-- Doctors Details Area -->
    <div class="doctors-details-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="doctors-details-img">
                        @if ($doctor->user->profile_photo_path != null)
                            <img src="{{ asset('/upload/doctor/' . $doctor->user->profile_photo_path) }}">
                        @else
                            <img src="{{ asset('upload/noimagejpg.jpg') }}">
                        @endif
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="doctors-details-content">
                        <h3>{{ $doctor->user->name }}</h3>
                        <span>{{ $doctor->clinic_address }}</span>
                        <ul class="doctors-details-list">
                            <li>Speciality: {{ $doctor->speciality->name }}</li>
                            {{-- <li>Experience: 5 years</li> --}}
                            {{-- <li>Certifications: American Board of Neurological Surgery</li> --}}
                            {{-- <li>Practice Areas: Medizo Health Center, New Jercy, America.</li> --}}
                            <li>Phone: <a href="tel:{{ $doctor->user->phone }}">{{ $doctor->user->phone }}</a></li>
                            <li>Email: <a href="mailto:{{ $doctor->user->email }}">{{ $doctor->user->email }}</a></li>
                            {{-- <li>Fax: 321-345-45621</a></li> --}}
                        </ul>

                        {{-- <ul class="social-link">
                                <li class="title">Follow On :</li>
                                <li>
                                    <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                                </li> 
                                <li>
                                    <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                                </li> 
                                <li>
                                    <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                                </li> 
                                <li>
                                    <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                                </li> 
                            </ul> --}}
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="doctors-details-text">
                        <p>
                            {{ $doctor->doctor_info }}
                        </p>

                        <h5>Voice Appointment Working Hours</h5>
                        <ul class="doctors-details-list">
                            @foreach ($doctor->workingHours as $availability)
                                <li><strong>{{ $availability->day }}</strong> : {{ $availability->from }} -
                                    {{ $availability->to }}</li>
                            @endforeach

                        </ul>
                        <h5>Video Appointment Working Hours</h5>
                        <ul class="doctors-details-list">
                            @foreach ($doctor->workingHoursVideo as $availability)
                                <li><strong>{{ $availability->day }}</strong> : {{ $availability->from }} -
                                    {{ $availability->to }}</li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="doctors-details-shape">
            <img src="{{ asset('patient/assets/img/doctors/doctors-shape4.png') }}" alt="Images">
        </div>
    </div>
    <!-- Doctors Details Area End -->
    <!-- Appointment Area -->
    <div class="appointment-area appointment-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="appointment-from-area">
                        <div class="appointment-from ">
                            <h2>Get Your Appointment</h2>
                            <p>Online Easily During This Corona Pandemic</p>
                            <form>
                                <div class="row">
                                   

                                    <div class="col-lg-12 col-md-12">
                                        <a href="{{ route('patient.doctor.appointoment',['id'=>$doctor->id]) }}" type="submit" class="default-btn">
                                            Book An Voice Call Appointment
                                        </a>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <a href="{{ route('patient.doctor.video.appointoment',['id'=>$doctor->id]) }}" type="submit" class="default-btn">
                                            Book An Video Call Appointment
                                        </a>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <a href="{{ route('patient.chat.index',['id'=>$doctor->user->id]) }}" type="submit" class="default-btn">
                                            Chat With Doctor
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="appointment-img-2">
        </div>
        <div class="appointment-shape">
            <img src="{{ asset('patient/assets/img/appointment/appointment-shape.png') }}" alt="Images">
        </div>
    </div>
    <!-- Appointment Area End -->
@endsection
