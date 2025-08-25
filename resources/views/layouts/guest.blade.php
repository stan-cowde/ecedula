<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>eCedula</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/E.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">--}}

    <!-- Template Main CSS File -->
    @if(Route::currentRouteName() === 'login' || Route::currentRouteName() === 'show.register')
        <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/landing-page.css') }}" rel="stylesheet">
    @endif


    @livewireStyles

    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

@hasSection('header')
    @yield('header')
@endif

@hasSection('hero-section')
    @yield('hero-section')
@endif


@hasSection('main')
    @yield('main')
@endif

@hasSection('footer')
    @yield('footer')
@endif


@livewireScripts

@hasSection('js')
    @yield('js')
@endif

@hasSection('custom-js')
    @yield('custom-js')
@endif


</body>
</html>
