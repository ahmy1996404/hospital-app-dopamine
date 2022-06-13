@extends('patient.layouts.master')
@section('content')

  <!-- Inner Banner -->
    <div class="inner-banner inner-bg2 mt-5">
        <div class="container">

            <div class="inner-title">
                <h3>@yield('bannerTitle')</h3>
                <ul>
                    <li>
                        <a href="{{ route('patient.home') }}">Home</a>
                    </li>
                    <li>@yield('bannerTitle')</li>
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
    <div class="container mt-5 mb-5">
        
        <div class="row">
          
            <div class="col-12">
                <!-- :::::::::: Start My Account Section :::::::::: -->
                <div class="my-account-area">
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            @include('patient.layouts.partials.dashboardHeader')

                        </div>
                        <div class="col-xl-8 col-md-8">

                            @yield('dashboardContent')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div><!-- :::::::::: End My Account Section :::::::::: -->
    </div>
    </div>
    </div>
 
@endsection
