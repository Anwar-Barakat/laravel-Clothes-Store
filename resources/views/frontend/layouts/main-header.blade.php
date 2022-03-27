<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>
                            <li class="menu-item">
                                <a title="{{ __('frontend.phone') }}" href="javascript:void(0)">
                                    <span class="icon label-before fa fa-mobile"></span>
                                    {{ __('frontend.phone') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>
                            <li class="menu-item">
                                <a title="{{ __('frontend.login') }}"
                                    href="login.html">{{ __('frontend.login') }}</a>
                            </li>
                            <li class="menu-item">
                                <a title="{{ __('frontend.register') }}"
                                    href="register.html">{{ __('frontend.register') }}</a>
                            </li>
                            <li class="menu-item lang-menu menu-item-has-children parent">
                                <a title="{{ __('frontend.laguages') }}" href="javascript:void(0);">
                                    {{ __('frontend.laguages') }}
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="submenu lang">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li class="menu-item">
                                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                                class="p-2 d-flex border-bottom" style="width: 100%">
                                                <p class="time mb-0 text-left float-right mr-2 mt-2 display-5">
                                                    {{ $properties['native'] }}
                                                </p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children parent">
                                <a title="{{ __('frontend.currency') }}" href="#">{{ __('frontend.currency') }}<i
                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu curency">
                                    <li class="menu-item">
                                        <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="Euro (EUR)" href="#">Euro (EUR)</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="index.html" class="link-to-home">
                            <img src="{{ asset('front/assets/images/logo.jpg') }}" alt="mercado">
                        </a>
                    </div>

                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="#" id="form-search-top" name="form-search-top">
                                @csrf
                                {{-- <div class="wrap-list-cate">
                                    <input type="hidden" name="product-cate" value="0" id="product-cate">
                                    <a href="javascript:void(0);"
                                        class="link-control">{{ __('frontend.all_categories') }}</a>
                                    <ul class="list-cate">
                                        @foreach ($sections as $section)
                                            <li class="level-0">
                                                <a href=""> {{ $section->name }}</a>
                                            </li>
                                            @foreach ($section->categories ?? [] as $category)
                                                <li class="level-2">
                                                    <a href="">&nbsp;&raquo;&nbsp; {{ $category->name }}</a>
                                                </li>
                                                @foreach ($category->subCategories ?? [] as $subcategory)
                                                    <li class="level-2">
                                                        <a href="">&nbsp;&raquo;&nbsp;
                                                            &nbsp;&raquo;&nbsp;{{ $subcategory->name }}</a>
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div> --}}
                                <a href="javascript:void(0);"
                                    class="all_categories">{{ __('frontend.all_categories') }}</a>
                                <div class="mega-box">
                                    <div class="content">
                                        @foreach ($sections as $section)
                                            <div class="main">
                                                <p>{{ $section->name }}</p>
                                                <ul class="mega-links">
                                                    @foreach ($section->categories ?? [] as $category)
                                                        <li>
                                                            <a href="">{{ $category->name }}</a>
                                                        </li>
                                                        <ul class="sub__mega-links">
                                                            @foreach ($category->subCategories ?? [] as $subcategory)
                                                                <li>
                                                                    <a href="">
                                                                        &nbsp;&raquo;&nbsp;{{ $subcategory->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section wishlist">
                            <a href="#" class="link-direction">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">0 {{ __('frontend.items') }}</span>
                                    <span class="title"> {{ __('frontend.wishlist') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section minicart">
                            <a href="#" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">4 {{ __('frontend.items') }}</span>
                                    <span class="title">{{ __('frontend.cart') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky">
                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                            <li class="menu-item home-icon">
                                <a href="{{ route('frontend.home') }}" class="link-term mercado-item-title">
                                    <span class="home-link">
                                        {{ __('frontend.home') }}
                                    </span>
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('frontend.shop') }}" class="link-term mercado-item-title">
                                    {{ __('frontend.about_us') }}
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('frontend.shop') }}" class="link-term mercado-item-title">
                                    {{ __('frontend.shop') }}
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('frontend.cart') }}" class="link-term mercado-item-title">
                                    {{ __('frontend.cart') }}
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="checkout.html" class="link-term mercado-item-title">
                                    {{ __('frontend.checkout') }}
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="contact-us.html" class="link-term mercado-item-title">
                                    {{ __('frontend.contact_us') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


@section('js')
    <script>
        $(document).ready(function() {
            $(".all_categories").click(function(e) {
                e.preventDefault();
                $(".mega-box").toggleClass("active");
            });
        });
    </script>
@endsection
