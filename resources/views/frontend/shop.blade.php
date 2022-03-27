@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.shop') }}
@endsection

@section('content')
    <div class="home-page home-01">
        <main id="main" class="main-site left-sidebar">
            <div class="container">
                <div class="wrap-breadcrumb">
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.shop') }}</span></li>
                        <li class="item-link">
                            <a href="{{ route('frontend.home') }}" class="link">{{ __('frontend.home') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                        <div class="banner-shop">
                            <a href="#" class="banner-link">
                                <figure><img src="{{ asset('front/assets/images/shop-banner.jpg') }}" alt=""></figure>
                            </a>
                        </div>
                        <div class="wrap-shop-control">
                            <h1 class="shop-title">{{ __('frontend.digitals') }} & {{ __('frontend.electronic') }}
                            </h1>
                            <div class="wrap-right">
                                <div class="sort-item orderby ">
                                    <select name="orderby" class="use-chosen">
                                        <option value="menu_order" selected="selected">
                                            {{ __('frontend.default_sorting') }}
                                        </option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>

                                <div class="sort-item product-per-page">
                                    <select name="post-per-page" class="use-chosen">
                                        <option value="12" selected="selected">12 {{ __('frontend.per_page') }}</option>
                                        <option value="16">16 {{ __('frontend.per_page') }}</option>
                                        <option value="18">18 {{ __('frontend.per_page') }}</option>
                                        <option value="21">21 {{ __('frontend.per_page') }}</option>
                                        <option value="24">24 {{ __('frontend.per_page') }}</option>
                                        <option value="30">30 {{ __('frontend.per_page') }}</option>
                                        <option value="32">32 {{ __('frontend.per_page') }}</option>
                                    </select>
                                </div>

                                <div class="change-display-mode">
                                    <a href="#" class="grid-mode display-mode active">
                                        <i class="fa fa-th"></i>{{ __('frontend.grid') }}
                                    </a>
                                    <a href="list.html" class="list-mode display-mode">
                                        <i class="fa fa-th-list"></i>{{ __('frontend.list') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end wrap shop control-->
                        <div class="row">
                            <ul class="product-list grid-products equal-container">
                                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img
                                                        src="{{ asset('front/assets/images/products/digitals/digital_20.jpg') }}"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                                    Speaker [White]</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                            <a href="#" class="btn add-to-cart">{{ __('frontend.add_to_cart') }}</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="wrap-pagination-info">

                        </div>
                    </div>
                    <!--end main products area-->

                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                        <div class="widget mercado-widget categories-widget">
                            <h2 class="widget-title">{{ __('frontend.all_sections') }}</h2>
                            <div class="widget-content">
                                <ul class="list-category">
                                    @foreach ($sections as $section)
                                        <h5 class="section-title">{{ $section->name }} :</h5>
                                        @foreach ($section->categories ?? [] as $category)
                                            <li class="category-item has-child-cate">
                                                <a href="#" class="cate-link">{{ $category->name }}</a>
                                                @if ($category->subCategories->count() > 0)
                                                    <span class="toggle-control">+</span>
                                                @endif
                                                <ul class="sub-cate">
                                                    @foreach ($category->subCategories ?? [] as $subcategory)
                                                        <li class="category-item">
                                                            <a href="" class="cate-link">
                                                                &nbsp;&raquo;&nbsp;{{ $subcategory->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div><!-- Categories widget-->
                        <hr>

                        <div class="widget mercado-widget filter-widget brand-widget">
                            <h2 class="widget-title">{{ __('frontend.brands') }}</h2>
                            <div class="widget-content">
                                <ul class="list-style vertical-list list-limited" data-show="6">
                                    <li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a>
                                    </li>
                                    <li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
                                    <li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
                                    <li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                                    <li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
                                    <li class="list-item"><a class="filter-link " href="#">Shop Smartphone &
                                            Tablets</a></li>
                                    <li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a>
                                    </li>
                                    <li class="list-item default-hiden"><a class="filter-link " href="#">CPUs &
                                            Prosecsors</a></li>
                                    <li class="list-item default-hiden"><a class="filter-link " href="#">Sound &
                                            Speaker</a>
                                    </li>
                                    <li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone &
                                            Tablets</a></li>
                                    <li class="list-item">
                                        <a data-label='{{ __('frontend.show_more') }}<i class="fa fa-angle-up" aria-hidden="true"></i>'
                                            class="btn-control control-show-more" href="#">
                                            {{ __('frontend.show_more') }}
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- brand widget-->

                        <div class="widget mercado-widget filter-widget price-filter">
                            <h2 class="widget-title">{{ __('frontend.price') }}</h2>
                            <div class="widget-content">
                                <div id="slider-range"></div>
                                <p>
                                    <label for="amount">{{ __('frontend.price') }}:</label>
                                    <input type="text" id="amount" readonly>
                                    <button class="filter-submit">{{ __('frontend.filter') }}</button>
                                </p>
                            </div>
                        </div><!-- Price-->

                        <div class="widget mercado-widget filter-widget">
                            <h2 class="widget-title">{{ __('frontend.color') }}</h2>
                            <div class="widget-content">
                                <ul class="list-style vertical-list has-count-index">
                                    <li class="list-item"><a class="filter-link " href="#">Red
                                            <span>(217)</span></a>
                                    </li>
                                    <li class="list-item"><a class="filter-link " href="#">Yellow
                                            <span>(179)</span></a></li>
                                    <li class="list-item"><a class="filter-link " href="#">Black
                                            <span>(79)</span></a>
                                    </li>
                                    <li class="list-item"><a class="filter-link " href="#">Blue
                                            <span>(283)</span></a>
                                    </li>
                                    <li class="list-item"><a class="filter-link " href="#">Grey
                                            <span>(116)</span></a>
                                    </li>
                                    <li class="list-item"><a class="filter-link " href="#">Pink
                                            <span>(29)</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- Color -->

                        <div class="widget mercado-widget filter-widget">
                            <h2 class="widget-title">{{ __('frontend.size') }}</h2>
                            <div class="widget-content">
                                <ul class="list-style inline-round ">
                                    <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                                    <li class="list-item"><a class="filter-link " href="#">M</a></li>
                                    <li class="list-item"><a class="filter-link " href="#">l</a></li>
                                    <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                                </ul>
                                <div class="widget-banner">
                                    <figure><img src="{{ asset('front/assets/images/size-banner-widget.jpg') }}"
                                            width="270" height="331" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div><!-- Size -->

                        <div class="widget mercado-widget widget-product">
                            <h2 class="widget-title">{{ __('frontend.popular_product') }}</h2>
                            <div class="widget-content">
                                <ul class="products">
                                    <li class="product-item">
                                        <div class="product product-widget-style">
                                            <div class="thumbnnail">
                                                <a href="detail.html"
                                                    title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/digitals/digital_01.jpg') }}"
                                                            alt=""></figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker...</span></a>
                                                <div class="wrap-price"><span class="product-price">$168.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="product-item">
                                        <div class="product product-widget-style">
                                            <div class="thumbnnail">
                                                <a href="detail.html"
                                                    title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/digitals/digital_17.jpg') }}"
                                                            alt=""></figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker...</span></a>
                                                <div class="wrap-price"><span class="product-price">$168.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="product-item">
                                        <div class="product product-widget-style">
                                            <div class="thumbnnail">
                                                <a href="detail.html"
                                                    title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/digitals/digital_18.jpg') }}"
                                                            alt=""></figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker...</span></a>
                                                <div class="wrap-price"><span class="product-price">$168.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="product-item">
                                        <div class="product product-widget-style">
                                            <div class="thumbnnail">
                                                <a href="detail.html"
                                                    title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                    <figure><img
                                                            src="{{ asset('front/assets/images/products/digitals/digital_20.jpg') }}"
                                                            alt=""></figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                        Omnidirectional Speaker...</span></a>
                                                <div class="wrap-price"><span class="product-price">$168.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div><!-- brand widget-->

                    </div>
                    <!--end sitebar-->

                </div>
                <!--end row-->

            </div>
            <!--end container-->

        </main>
    </div>
@endsection
