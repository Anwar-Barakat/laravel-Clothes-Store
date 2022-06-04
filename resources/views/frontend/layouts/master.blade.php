<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('frontend.layouts.head')
</head>

<body class="home-page home-01 ">

    <!-- mobile menu -->
    <div id="navbar__link">
        <ul>
            <li>
                <a href="{{ route('frontend.home') }}"
                    class=" {{ request()->routeIs('frontend.home') ? 'button-30' : '' }}">
                    {{ __('frontend.home') }}
                </a>
            </li>
            <li>
                <a href="{{ route('frontend.about-us') }}"
                    class="link-term mercado-item-title {{ request()->routeIs('frontend.about-us') ? 'button-30' : '' }}">
                    {{ __('frontend.about_us') }}
                </a>
            </li>
            <li>
                @php
                    $cat = App\Models\Category::inRandomOrder()->first();
                @endphp
                <a href="{{ route('frontend.url', $cat->url) }}"
                    class="link-term mercado-item-title {{ request()->routeIs('frontend.url') ? 'button-30' : '' }} ">
                    {{ __('frontend.shop') }}
                </a>
            </li>
            <li>
                <a href="{{ route('frontend.cart') }}"
                    class="link-term mercado-item-title {{ request()->routeIs('frontend.cart') ? 'button-30' : '' }}">
                    {{ __('frontend.cart') }}
                </a>
            </li>
            <li>
                <a href="{{ route('frontend.checkout.index') }}"
                    class="link-term mercado-item-title {{ request()->routeIs('frontend.checkout.index') ? 'button-30' : '' }}">
                    {{ __('frontend.checkout') }}
                </a>
            </li>
            <li>
                <a href="contact-us.html" class="link-term mercado-item-title">
                    {{ __('frontend.contact_us') }}
                </a>
            </li>
        </ul>
    </div>


    <!--header-->
    @include('frontend.layouts.main-header')

    @yield('content')

    @include('frontend.layouts.footer')

    @include('frontend.layouts.footer-scripts')
    @yield('scripts')


</body>

</html>
