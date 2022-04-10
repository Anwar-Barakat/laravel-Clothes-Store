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
                    class=" {{ request()->routeIs('frontend.home') ? 'active' : '' }}">
                    {{ __('frontend.home') }}
                </a>
            </li>
            <li>
                <a href="" class="link-term mercado-item-title ">
                    {{ __('frontend.about_us') }}
                </a>
            </li>
            <li>
                <a href="{{ route('frontend.url', 'men-shoes') }}"
                    class="link-term mercado-item-title {{ request()->routeIs('frontend.url') ? 'active' : '' }} ">
                    {{ __('frontend.shop') }}
                </a>
            </li>
            <li>
                <a href="{{ route('frontend.cart') }}"
                    class="link-term mercado-item-title {{ request()->routeIs('frontend.cart') ? 'active' : '' }}">
                    {{ __('frontend.cart') }}
                </a>
            </li>
            <li>
                <a href="checkout.html" class="link-term mercado-item-title">
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

    <script>
        const toggle = document.getElementById('menu__toggle');
        const navbarLink = document.getElementById('navbar__link');
        toggle.onclick = function() {
            toggle.classList.toggle('active');
            navbarLink.classList.toggle('active');
        }
    </script>
</body>

</html>
