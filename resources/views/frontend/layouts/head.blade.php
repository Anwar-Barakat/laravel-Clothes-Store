<title>{{ __('frontend.ecommerce') }} | @yield('title')</title>
<link rel="shortcut icon" href="{{ asset('front/assets/images/favicon.png') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('front/assets/images/favicon.png') }}" type="image/x-icon">
<link
    href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
    rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
    rel="stylesheet">
{{-- toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />



@yield('css')
@if (App::getLocale() == 'ar')
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css-rtl/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css-rtl/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css-rtl/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css-rtl/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css-rtl/style.css') }}">
    <style>
        body {
            direction: rtl !important
        }

    </style>
@else
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/style.css') }}">
    <style>
        body {
            direction: ltr !important
        }

    </style>
@endif

<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/color-01.css') }}">
<link rel="stylesheet" href="{{ asset('front/assets/css/custom.css') }}">
