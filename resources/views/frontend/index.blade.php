@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.home') }}
@stop

@section('content')
    <div class="home-page home-01">
        <main id="main">
            <div class="container">
                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link">
                            <a href="{{ route('frontend.home') }}" class="link">{{ __('frontend.home') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <!--MAIN SLIDE-->
                @include('frontend.banners.index')

                <a href="{{ route('frontend.orders.index') }}">order</a>
                <!--On Sale-->
                <div class="wrap-show-advance-info-box style-1 has-countdown">
                    <h3 class="title-box">{{ __('frontend.on_sale') }}</h3>
                    <div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                        data-loop="false" data-nav="true" data-dots="false"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img
                                            src="{{ asset('front/assets/images/products/tools/tools_equipment_7.jpg') }}"
                                            width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('front/assets/images/products/digitals/digital_18.jpg') }}"
                                            width="800" height="800" alt=""></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('front/assets/images/products/fashions/fashion_08.jpg') }}"
                                            width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('front/assets/images/products/digitals/digital_17.jpg') }}"
                                            width="800" height="800" alt=""></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img
                                            src="{{ asset('front/assets/images/products/tools/tools_equipment_3.jpg') }}"
                                            width="800" height="800" alt=""></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img
                                            src="{{ asset('front/assets/images/products/fashions/fashion_05.jpg') }}"
                                            width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img
                                            src="{{ asset('front/assets/images/products/digitals/digital_04.jpg') }}"
                                            width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('front/assets/images/products/kidtoys/kidtoy_05.jpg') }}"
                                            width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                    </div>
                </div>

                <!--Latest Products-->
                @if ($latestProducts->count() > 0)
                    <div class="wrap-show-advance-info-box style-1">
                        <h3 class="title-box">
                            {{ __('frontend.latest_products') }} ({{ $latestProducts->count() }})
                        </h3>
                        <div class="wrap-products">
                            <div class="wrap-product-tab tab-style-1">
                                <div class="tab-contents">
                                    <div class="tab-content-item active" id="digital_1a"
                                        @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                                        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                            data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                            @foreach ($latestProducts as $latestProduct)
                                                <div class="product product-style-2 equal-elem ">
                                                    <div class="product-thumnail">
                                                        <a href="{{ route('frontend.details', $latestProduct->id) }}"
                                                            title="{{ $latestProduct->name }}">
                                                            @if ($latestProduct->getFirstMediaUrl('image_products', 'small'))
                                                                <figure>
                                                                    <img src="{{ $latestProduct->getFirstMediaUrl('image_products', 'small') }}"
                                                                        width="800" height="800"
                                                                        alt="{{ $latestProduct->name }}">
                                                                </figure>
                                                            @else
                                                                <figure>
                                                                    <img src="{{ asset('assets/img/1.jpg') }}"
                                                                        width="800" height="800"
                                                                        alt="{{ $latestProduct->name }}">
                                                                </figure>
                                                            @endif
                                                        </a>

                                                        <div class="wrap-btn">
                                                            <a href="{{ route('frontend.details', $latestProduct->id) }}"
                                                                class="function-link">{{ __('frontend.quick_view') }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{ route('frontend.details', $latestProduct->id) }}"
                                                            class="product-name"><span>{{ $latestProduct->name }}</span></a>
                                                        <div class="wrap-price">
                                                            @php
                                                                $discount = App\Models\Product::getDiscountedPrice($latestProduct->id);
                                                            @endphp
                                                            @if ($discount > 0)
                                                                <ins>
                                                                    <p class="product-price"
                                                                        id="productPriceWithDiscAfter">
                                                                        ${{ $discount }}
                                                                    </p>
                                                                </ins>
                                                                <del>
                                                                    <p class="product-price"
                                                                        id="productPriceWithDiscBefore">
                                                                        ${{ $latestProduct->price }}
                                                                    </p>
                                                                </del>
                                                            @else
                                                                <span class="product-price"
                                                                    id="productPriceWithoutDisc">${{ $latestProduct->price }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!--Product Categories-->
                <div class="wrap-show-advance-info-box style-1">
                    <h3 class="title-box">{{ __('frontend.products_categories') }}</h3>
                    <div class="wrap-top-banner">
                        <a href="#" class="link-banner banner-effect-2">
                            <figure><img src="{{ asset('front/assets/images/fashion-accesories-banner.jpg') }}"
                                    width="1170" height="240" alt="">
                            </figure>
                        </a>
                    </div>
                    <div class="wrap-products">
                        <div class="wrap-product-tab tab-style-1">
                            <div class="tab-control">
                                <a href="#fashion_1a" class="tab-control-item active">Smartphone</a>
                                <a href="#fashion_1b" class="tab-control-item">Watch</a>
                                <a href="#fashion_1c" class="tab-control-item">Laptop</a>
                                <a href="#fashion_1d" class="tab-control-item">Tablet</a>
                            </div>
                            <div class="tab-contents">

                                <div class="tab-content-item active" id="fashion_1a">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                        data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_01.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Lois Caron LCS-4027 Analog Watch -
                                                        For Men</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_02.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item sale-label">sale</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Business Men Leather Laptop Tote
                                                        Bags Man Crossbody </span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_09.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Alberto Torresi Borgo Yellow Shoes
                                                        - Alberto Torresi</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_03.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                    <span class="flash-item sale-label">sale</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Alberto Torresi Borgo Yellow Shoes
                                                        - Alberto Torresi</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_07.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_08.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item sale-label">sale</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_06.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_05.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-content-item" id="fashion_1b">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container "
                                        data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_03.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_07.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_08.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_09.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quic view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_02.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_05.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_08.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_04.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-content-item" id="fashion_1c">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                        data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_02.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_03.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                    <span class="flash-item sale-label">sale</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_04.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_05.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                    <span class="flash-item sale-label">sale</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_06.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_07.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                    <span class="flash-item sale-label">sale</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_08.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quic view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_09.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                    <span class="flash-item sale-label">sale</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quic view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-content-item" id="fashion_1d">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                        data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_05.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="product-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_04.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item sale-label">sale</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quic view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="product-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_03.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                    <span class="flash-item sale-label">sale</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quic view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="product-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_02.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quic view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="product-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_01.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quic view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="product-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_06.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item sale-label">sale</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quic view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="product-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_08.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quic view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="product-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-price"><span class="product-price">$250.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/fashions/fashion_09.jpg') }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item bestseller-label">Bestseller</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quic view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker [White]</span></a>
                                                <div class="product-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">$168.00</p>
                                                    </ins> <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
