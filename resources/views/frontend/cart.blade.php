@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.cart') }}
@endsection

@section('content')
    <div class="shopping-cart page">
        <main id="main" class="main-site">
            <div class="container">
                <div class="wrap-breadcrumb">
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.cart') }}</span></li>
                        <li class="item-link">
                            <a href="{{ route('frontend.home') }}" class="link">{{ __('frontend.home') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class=" main-content-area">
                    <div class="wrap-iten-in-cart">
                        <h3 class="box-title">{{ __('frontend.products') }} ({{ $userCartProducts->count() }})</h3>
                        <ul class="products-cart">
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach ($userCartProducts as $userCartProduct)
                                @php
                                    $price = App\Models\Cart::getProductAttributePrice($userCartProduct->product->id, $userCartProduct->size)->price;
                                @endphp
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        @if ($userCartProduct->product->getFirstMediaUrl('image_products', 'small'))
                                            <figure>
                                                <img
                                                    src="{{ $userCartProduct->product->getFirstMediaUrl('image_products', 'small') }}">
                                            </figure>
                                        @else
                                            <figure>
                                                <img src="{{ asset('assets/img/products/default-image.png') }}" alt="">
                                            </figure>
                                        @endif
                                    </div>
                                    <div class="product-name" style="width: 20%">
                                        <div>
                                            <a class="link-to-product" href="javascript:void(0);">
                                                {{ __('frontend.name') }} :
                                                {{ $userCartProduct->product->name }}</a>
                                        </div>
                                        {{-- ({{ $userCartProduct->product->code }}) --}}
                                        <div>
                                            <a class="link-to-product" href="javascript:void(0);">
                                                {{ __('frontend.code') }} :
                                                {{ $userCartProduct->product->code }}</a>
                                        </div>
                                        <div>
                                            <a class="link-to-product" href="javascript:void(0);">
                                                {{ __('frontend.size') }} :
                                                {{ $userCartProduct->size }}</a>
                                        </div>
                                    </div>
                                    <div class="price-field sub-total">
                                        <p class="price">
                                            ${{ $price }}
                                        </p>
                                    </div>
                                    <div class="quantity">
                                        <div class="quantity-input">
                                            <input type="text" name="product-quatity"
                                                value="{{ $userCartProduct->quantity }}" data-max="120" pattern="[0-9]*">
                                            <a class="btn btn-increase" href="#"></a>
                                            <a class="btn btn-reduce" href="#"></a>
                                        </div>
                                    </div>
                                    <div class="price-field sub-total">
                                        <p class="price">
                                            ${{ $price * $userCartProduct->quantity }}
                                        </p>
                                    </div>
                                    <div class="delete">
                                        <a href="#" class="btn btn-delete" title="">
                                            <span>{{ __('frontend.delete_from_cart') }}</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                                @php
                                    $totalPrice = $totalPrice + $price * $userCartProduct->quantity;
                                @endphp
                            @endforeach
                        </ul>
                    </div>

                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">{{ __('frontend.order_summary') }}</h4>
                            <p class="summary-info"><span class="title">{{ __('frontend.subtotal') }}</span><b
                                    class="index">$512.00</b></p>

                            <p class="summary-info total-info "><span
                                    class="title">{{ __('frontend.total') }}</span><b
                                    class="index">${{ $totalPrice ?? 0 }}</b></p>
                        </div>
                        <div class="checkout-info">
                            <a class="btn btn-checkout" href="checkout.html">{{ __('frontend.checkout') }}</a>
                            <a class="link-to-shop" href="shop.html">{{ __('frontend.contiue_shopping') }}<i
                                    class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                        <div class="update-clear">
                            <a class="btn btn-clear" href="#">{{ __('frontend.clear_cart') }}</a>
                            <a class="btn btn-update" href="#">{{ __('frontend.update_cart') }}</a>
                        </div>
                    </div>

                    @if ($featuredPorducts->count() > 0)
                        <div class="wrap-show-advance-info-box style-1 box-in-site">
                            <h3 class="title-box">
                                {{ __('frontend.most_viewed') }} ({{ $featuredPorducts->count() }})
                            </h3>
                            <div class="wrap-products" @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                                    data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                                    @foreach ($featuredPorducts as $featuredPorduct)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="#" title="{{ $featuredPorduct->name }}">
                                                    @if ($featuredPorduct->getFirstMediaUrl('image_products', 'small'))
                                                        <figure>
                                                            <img src="{{ $featuredPorduct->getFirstMediaUrl('image_products', 'small') }}"
                                                                width="214" height="214"
                                                                alt="{{ $featuredPorduct->name }}">
                                                        </figure>
                                                    @else
                                                        <figure>
                                                            <img src="{{ asset('assets/img/1.jpg') }}" width="214"
                                                                height="214" alt="{{ $featuredPorduct->name }}">
                                                        </figure>
                                                    @endif
                                                </a>
                                                <div class="group-flash">
                                                    {{-- <span class="flash-item sale-label">
                                                        {{ __('frontend.sale') }}
                                                    </span> --}}
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">
                                                        {{ __('frontend.quick_view') }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#"
                                                    class="product-name"><span>{{ $featuredPorduct->name }}</span></a>
                                                <div class="wrap-price">
                                                    <ins>
                                                        <p class="product-price">{{ $featuredPorduct->price }}$ </p>
                                                    </ins>
                                                    <del>
                                                        <p class="product-price">$250.00</p>
                                                    </del>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <!--End wrap-products-->
                        </div>
                    @endif

                </div>
                <!--end main content area-->
            </div>
            <!--end container-->

        </main>
    </div>
@endsection
