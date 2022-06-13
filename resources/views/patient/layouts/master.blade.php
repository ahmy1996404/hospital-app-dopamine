<!doctype html>
<html lang="zxx">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('patient/assets/css/bootstrap.min.css') }}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{ asset('patient/assets/css/animate.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('patient/assets/fonts/flaticon.css') }}">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{ asset('patient/assets/css/boxicons.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('patient/assets/css/boxicons.min.css') }}">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{ asset('patient/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('patient/assets/css/owl.theme.default.min.css') }}">
    <!-- Nice Select Min CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('patient/assets/css/nice-select.min.css') }}"> --}}
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('patient/assets/css/meanmenu.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('patient/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('patient/assets/css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/0dd5cd82d9.js" crossorigin="anonymous"></script>

    <title>{{ \App\Helpers\Utility::getValByName('title_text') }} | @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset(\App\Helpers\Utility::getValByName('logo')) }}">
</head>

<body>

    <!-- Pre Loader -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="spinner"></div>
            </div>
        </div>
    </div>
    <!-- End Pre Loader -->

    <!-- Top Header Start -->

    @include('patient.layouts.partials.header')

    <!-- Top Header End -->

    <!-- Start Navbar Area -->
    @include('patient.layouts.partials.navbar')

    <!-- End Navbar Area -->

    {{-- Start Content Area --}}
    @yield('content')

    {{-- End Content Area --}}

    <!-- Footer Area -->
    @include('patient.layouts.partials.footer')
    <!-- Footer Area End -->



    <!-- Jquery Min JS -->
    <script src="{{ asset('patient/assets/js/jquery-3.5.1.slim.min.js') }}"></script>
    <!-- Bootstrap Min JS -->
    <script src="{{ asset('patient/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Magnific Popup Min JS -->
    <script src="{{ asset('patient/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Owl Carousel Min JS -->
    <script src="{{ asset('patient/assets/js/owl.carousel.min.js') }}"></script>
    <!-- Nice Select Min JS -->
    {{-- <script src="{{ asset('patient/assets/js/jquery.nice-select.min.js') }}"></script> --}}
    <!-- Wow Min JS -->
    <script src="{{ asset('patient/assets/js/wow.min.js') }}"></script>
    <!-- Meanmenu JS -->
    <script src="{{ asset('patient/assets/js/meanmenu.js') }}"></script>
    <!-- Datepicker JS -->
    <script src="{{ asset('patient/assets/js/datepicker.min.js') }}"></script>
    <!-- Ajaxchimp Min JS -->
    <script src="{{ asset('patient/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Form Validator Min JS -->
    <script src="{{ asset('patient/assets/js/form-validator.min.js') }}"></script>
    <!-- Contact Form JS -->
    <script src="{{ asset('patient/assets/js/contact-form-script.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('patient/assets/js/custom.js') }}"></script>

</body>

</html>
