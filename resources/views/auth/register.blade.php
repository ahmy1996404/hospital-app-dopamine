@extends('patient.layouts.master')
@section('title', 'Register')
@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg7">
        <div class="container">
            <div class="inner-title">
                <h3>Sign Up</h3>
                <ul>
                    <li>
                        <a href="{{ route('patient.home') }}">Home</a>
                    </li>
                    <li>Sign Up</li>
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
    <!-- Sign Up Area -->
    <div class="sign-up-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span class="span-bg">Sign Up</span>
                                <h2>Create an Account!</h2>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                            <x-jet-input id="name" class="form-control" type="text" name="name"
                                                :value="old('name')"  autofocus autocomplete="name"
                                                placeholder="Username" />
                                            <x-jet-input-error for="name" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <x-jet-input id="email" class="form-control" type="email" name="email"
                                                :value="old('email')" required placeholder="Email" />
                                            <x-jet-input-error for="email" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <x-jet-input id="password" class="form-control" type="password"
                                                name="password" required autocomplete="new-password"
                                                placeholder="Password" />
                                            <x-jet-input-error for="password" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <x-jet-input id="password_confirmation" class="form-control" type="password"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Confirm Password" />
                                            <x-jet-input-error for="password_confirmation" class="mt-2" />

                                        </div>
                                    </div>
                                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                        <div class="mt-4">
                                            <x-jet-label for="terms">
                                                <div class="flex items-center">
                                                    <x-jet-checkbox name="terms" id="terms" />

                                                    <div class="ml-2">
                                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                                                    </div>
                                                </div>
                                            </x-jet-label>
                                        </div>
                                    @endif
                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" class="default-btn">
                                            Sign Up
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <p class="account-desc">
                                            Already have an account?
                                            <a href="{{ route('login') }}">Sign In</a>
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
