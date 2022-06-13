@extends('patient.layouts.master')
@section('title', 'Doctors')
@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg9">
        <div class="container">
            <div class="inner-title">
                <h3>Meet Our Experts</h3>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Doctors</li>
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

    <!-- Doctor Tab Area -->
    <div class="doctor-tab-area pt-100 pb-70">
        <div class="container">

            <div class="tab doctor-tab text-center">
                <div class="row">
                     <ul class="taby">
                         <li class="{{ request()->is('doctors') ? 'current' : '' }}">
                            <a href="{{ route('patient.doctors') }}">all</a>
                        </li>
                         @foreach ($specialities as $speciality)
                             
                        <li class="{{ request()->is('doctors/'.$speciality->name) ? 'current' : '' }}">
                            <a href="{{ route('patient.doctors',['speciality'=>$speciality->name]) }}">{{ $speciality->name }}</a>
                        </li>

                         @endforeach
                         
                    </ul>
                    
                </div>

            </div>

            <div class="tab_content current active pt-45">
                <div class="tabs_item current">
                    <div class="doctor-tab-item">
                        <div class="row">
                            @foreach ($doctors as $doctor)
                                <div class="col-lg-4 col-md-6">
                                    <div class="doctors-item">
                                        <div class="doctors-img">
                                            <a href="{{ route('patient.doctor.details',['id'=>$doctor->id]) }}">
                                                @if ($doctor->user->profile_photo_path != null)
                                                    <img
                                                        src="{{ asset('/upload/doctor/' . $doctor->user->profile_photo_path) }}">
                                                @else
                                                    <img src="{{ asset('upload/noimagejpg.jpg') }}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h3><a href="{{ route('patient.doctor.details',['id'=>$doctor->id]) }}">{{ $doctor->user->name }}</a></h3>
                                            <span>{{ $doctor->speciality->name }}</span>
                                          
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="doctor-tab-shape">
            <div class="shape1">
                <img src="{{ asset('patient/assets/img/doctors/doctors-shape3.png') }}" alt="Images">
            </div>

            <div class="shape2">
                <img src="{{ asset('patient/assets/img/doctors/doctors-shape4.png') }}" alt="Images">
            </div>
        </div>
    </div>
    <!-- Doctor Tab Area End -->


@endsection
