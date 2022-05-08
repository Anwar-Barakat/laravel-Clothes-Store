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
                            @if (Auth::check())
                                <li class="menu-item">
                                    <a title="{{ __('frontend.logout') }}"
                                        href="{{ route('frontend.logout') }}">{{ __('frontend.logout') }}</a>
                                </li>
                                <li class="menu-item">
                                    <a title="{{ __('frontend.account') }}"
                                        href="{{ route('frontend.user.account') }}">{{ __('frontend.account') }}</a>
                                </li>
                            @else
                                <li class="menu-item">
                                    <a title="{{ __('frontend.login') }}"
                                        href="{{ route('frontend.form.login') }}">{{ __('frontend.login') }}</a>
                                </li>
                                <li class="menu-item">
                                    <a title="{{ __('frontend.register') }}"
                                        href="{{ route('frontend.form.register') }}">{{ __('frontend.register') }}</a>
                                </li>
                            @endif
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
                                <a href="javascript:void(0);" id="allCats"
                                    class="all_categories">{{ __('frontend.all_categories') }}</a>
                                <div class="mega-box" id="megaBox">
                                    <div class="content">
                                        @foreach ($sections as $section)
                                            <div class="main">
                                                @if ($section->getTranslation('name', 'en') == 'Children')
                                                    <div>
                                                        <img src="{{ asset('assets/img/cats_mega_menu/chidren.jpg') }}"
                                                            alt="" class="mega__menu__image">
                                                    </div>
                                                @elseif ($section->getTranslation('name', 'en') == 'Men')
                                                    <div>
                                                        <img src="{{ asset('assets/img/cats_mega_menu/men.jpg') }}"
                                                            alt="" class="mega__menu__image">
                                                    </div>
                                                @elseif ($section->getTranslation('name', 'en') == 'Women')
                                                    <div>
                                                        <img src="{{ asset('assets/img/cats_mega_menu/women.png') }}"
                                                            alt="" class="mega__menu__image">
                                                    </div>
                                                @endif
                                                <p>{{ $section->name }}</p>
                                                <ul class="mega-links">
                                                    @foreach ($section->categories ?? [] as $category)
                                                        <li>
                                                            <a href="{{ $category->url }}">
                                                                {{ $category->name }}
                                                            </a>
                                                        </li>
                                                        <ul class="sub__mega-links">
                                                            @foreach ($category->subCategories ?? [] as $subcategory)
                                                                <li>
                                                                    <a href="{{ $subcategory->url }}">
                                                                        &nbsp;&raquo;&nbsp;{{ $subcategory->name }}
                                                                    </a>
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
                                <i class="fas fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index wishlistItemsCount">
                                        @if (Auth::check())
                                            {{ App\Models\Wishlist::where('user_id', Auth::user()->id)->get()->count() }}
                                        @else
                                            0
                                        @endif
                                        {{ __('frontend.items') }}
                                    </span>
                                    <span class="title"> {{ __('frontend.wishlist') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section minicart">
                            <a href="{{ route('frontend.cart') }}" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">
                                        <span id="totalProducts">{{ totalProducts() }}</span>
                                        {{ __('frontend.items') }}
                                    </span>
                                    <span class="title">{{ __('frontend.cart') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024" id="menu__toggle">
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
                                <a href="{{ route('frontend.home') }}"
                                    class="link-term mercado-item-title {{ request()->routeIs('frontend.home') ? 'active' : '' }}">
                                    <span class="home-link">
                                        {{ __('frontend.home') }} <i class="fas fa-home" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('frontend.about-us') }}"
                                    class="link-term mercado-item-title {{ request()->routeIs('frontend.about-us') ? 'active' : '' }}">
                                    {{ __('frontend.about_us') }}
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('frontend.url', 'men-shoes') }}"
                                    class="link-term mercado-item-title {{ request()->routeIs('frontend.url') ? 'active' : '' }} ">
                                    {{ __('frontend.shop') }}
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('frontend.cart') }}"
                                    class="link-term mercado-item-title {{ request()->routeIs('frontend.cart') ? 'active' : '' }}">
                                    {{ __('frontend.cart') }}
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('frontend.checkout.index') }}"
                                    class="link-term mercado-item-title  {{ request()->routeIs('frontend.checkout.index') ? 'active' : '' }}">
                                    {{ __('frontend.checkout') }}
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('frontend.contact-us.index') }}"
                                    class="link-term mercado-item-title {{ request()->routeIs('frontend.contact-us.index') ? 'active' : '' }}">
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
@endsection
