@extends('patient.layouts.master')
@section('title', 'Login')
@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg2">
        <div class="container">
            <div class="inner-title">
                <h3>Sign In</h3>
                <ul>
                    <li>
                        <a href="{{ route('patient.home') }}">Home</a>
                    </li>
                    <li>Sign In</li>
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

    <!-- Sign In Area -->
    <div class="sign-in-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span>Sign In</span>
                                <h2>Sign In to Your Account!</h2>
                                <x-jet-validation-errors style="color: red" class="mb-4" />

                            </div>
                            <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                            <x-jet-label for="email" value="{{ __('Email') }}" />
                                            <x-jet-input id="email" class="form-control" type="email" name="email"
                                                :value="old('email')" required autofocus placeholder="Email" />
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <x-jet-label for="password" value="{{ __('Password') }}" />
                                            <x-jet-input id="password" class="form-control" type="password"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Password" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 form-condition">
                                        <div class="agree-label">
                                            <x-jet-checkbox id="remember_me" name="remember" />
                                            <label>{{ __('Remember me') }}</label>

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        @if (Route::has('password.request'))
                                            <a class="forget" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </div>

                                    <div class="col-lg-12 col-md-12 text-center">
                                        <x-jet-button class="default-btn">
                                            {{ __('Log in') }}
                                        </x-jet-button>

                                    </div>

                                    <div class="col-12">
                                        <p class="account-desc">
                                            Not a member?
                                            <a href="{{ route('register') }}">Sign Up</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
