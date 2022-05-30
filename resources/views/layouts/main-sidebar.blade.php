<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'index')) }}">
            <img src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    @if (Auth::guard('admin')->user()->getFirstMediaUrl('avatars', 'thumb'))
                        <img alt="user-img" class="avatar avatar-xl brround" style="object-fit: cover"
                            src="{{ Auth::guard('admin')->user()->getFirstMediaUrl('avatars', 'thumb') }}"><span
                            class="avatar-status profile-status bg-green"></span>
                    @else
                        <img alt="user-img" class="avatar avatar-xl brround" style="object-fit: cover"
                            src="{{ asset('admin/images/avatars/admin.png') }}"><span
                            class="avatar-status profile-status bg-green"></span>
                    @endif

                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::guard('admin')->user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::guard('admin')->user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">{{ __('translation.main') }}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-chart-line icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.dashboard') }}</span>
                </a>
            </li>

            {{-- settings --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="javascript:void(0);">
                    <i class="fas fa-cogs icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.settings') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.settings') }}">
                            {{ __('translation.change_password') }}
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.update.details') }}">
                            {{ __('translation.change_admin_detail') }}
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.settings.index') }}">
                            {{ __('translation.website_settings') }}
                        </a>
                    </li>
                </ul>
            </li>

            @if (auth()->guard('admin')->user()->type == 'super-admin' ||
                auth()->guard('admin')->user()->type == 'admin')
                {{-- admin - sub admins --}}
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="javascript:void(0);">
                        <i class="fas fa-user-shield icon_sidebar side-menu__icon"></i>
                        <span class="side-menu__label">{{ __('translation.admins') }}</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a class="slide-item" href="{{ route('admin.admins.index') }}">
                                {{ __('translation.display_admins') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endif


            <li class="side-item side-item-category">{{ __('translation.general') }}</li>



            {{-- sections --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.sections.index') }}">
                    <i class="fas fa-bars icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.sections') }}</span>
                </a>
            </li>


            {{-- categories --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="javascript:void(0);">
                    <i class="fas fa-ellipsis-h icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.categories') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="{{ route('admin.categories.index') }}">{{ __('translation.all_categories') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.categories.create') }}">{{ __('translation.add_category') }}</a>
                    </li>
                </ul>
            </li>

            {{-- Products --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="javascript:void(0);">
                    <i class="fas fa-tags icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.products') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.products.index') }}">
                            {{ __('translation.all_products') }}
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.products.create') }}">
                            {{ __('translation.add_product') }}
                        </a>
                    </li>
                </ul>
            </li>


            {{-- Orders --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="javascript:void(0);">
                    <i class="fas fa-shopping-bag icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.orders') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.orders.index') }}">
                            {{ __('translation.all_orders') }}
                        </a>
                    </li>
                </ul>
            </li>


            {{-- order returning --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.return.orders.index') }}">
                    <i class="fas fa-trash-restore-alt icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.return_orders') }}</span>
                </a>
            </li>

            {{-- order exchanging --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.exchange.orders.index') }}">
                    <i class="fas fa-exchange-alt icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.exchange_orders') }}</span>
                </a>
            </li>


            {{-- Shipping charges --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.shipping-charges.index') }}">
                    <i class="fas fa-shipping-fast icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.shipping_charges') }}</span>
                </a>
            </li>


            {{-- Coupons --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="javascript:void(0);">
                    <i class="fas fa-coins icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.coupons') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.coupons.index') }}">
                            {{ __('translation.all_coupons') }}
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.coupons.create') }}">
                            {{ __('translation.add_coupon') }}
                        </a>
                    </li>
                </ul>
            </li>


            {{-- Currencies --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.currencies.index') }}">
                    <i class="fas fa-money-bill-alt icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.currencies') }}</span>
                </a>
            </li>


            {{-- Brands --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.brands.index') }}">
                    <i class="fas fa-sign icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.brands') }}</span>
                </a>
            </li>

            {{-- Banners --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.banners.index') }}">
                    <i class="fab fa-buffer icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.banners') }}</span>
                </a>
            </li>


            {{-- users --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.users') }}</span>
                </a>
            </li>


            {{-- ratings --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.ratings.index') }}">
                    <i class="fas fa-bookmark icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.products_evaluations') }}</span>
                </a>
            </li>


            {{-- Contact Us --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.contact-us.index') }}">
                    <i class="far fa-comments icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.contact_us_messages') }}</span>
                </a>
            </li>


            {{-- Subscriptions --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.newslatter-subscribers.index') }}">
                    <i class="fas fa-check icon_sidebar side-menu__icon" aria-hidden="true"></i>
                    <span class="side-menu__label">{{ __('translation.subscriber') }}</span>
                </a>
            </li>

            {{-- CMS Pages --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.cms-pages.index') }}">
                    <i class="fas fa-paste icon_sidebar side-menu__icon"></i>
                    <span class="side-menu__label">{{ __('translation.cms_pages') }}</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
