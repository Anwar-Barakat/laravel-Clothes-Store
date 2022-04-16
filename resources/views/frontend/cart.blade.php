@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.cart') }}
@endsection

@section('content')
    <div class="shopping-cart page">
        <main id="main" class="main-site">
            <div class="container">
                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="rtl"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.cart') }}</span></li>
                        <li class="item-link">
                            <a href="{{ route('frontend.home') }}" class="link">{{ __('frontend.home') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="wrap-iten-in-cart" id="AppendCartProducts">
                    <h3 class="box-title">{{ __('frontend.products') }} ({{ totalProducts() }})</h3>
                    <ul class="products-cart">
                        @if (App\Models\DeliveryAddress::deliveryAddress()->count() > 0)
                            <li class="pr-cart-item">
                                {{ __('frontend.check_your_address') }}
                            </li>
                        @endif
                        @forelse (App\Models\DeliveryAddress::deliveryAddress() as $deliveryAddress)
                            <li class="pr-cart-item" style="display: flex;column-gap: 1rem">
                                <input class="" id="address{{ $deliveryAddress->id }}" name="address_id"
                                    type="radio" value="address{{ $deliveryAddress->id }}">
                                <label for="address{{ $deliveryAddress->id }}">
                                    {{ $deliveryAddress->name }},{{ $deliveryAddress->address }},{{ $deliveryAddress->city }},{{ $deliveryAddress->state }}
                                    {{ $deliveryAddress->country->name }}
                                    (<a href="{{ route('frontend.delivery.address.edit', $deliveryAddress) }}"
                                        class="text text-success">
                                        {{ __('buttons.edit') }}
                                        <i class="fa fa-edit"></i>
                                    </a>)
                                </label>
                            </li>
                            {{-- Edit Delivery Address Modal --}}
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    {{ __('frontend.no_delivery_address') }}
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>

                <div class=" main-content-area">
                    <div class="wrap-iten-in-cart" id="AppendCartProducts">
                        @include('frontend.partials.cart_products')
                    </div>

                    <div class="summary">
                        <div class="order-summary" style="display: block">
                            <h4 class="title-box">{{ __('frontend.add_coupon') }}</h4>
                        </div>
                        <form name="addCouponForm" action="javascript:void(0);" method="POST" id="addCouponForm"
                            @if (Auth::check()) user="1" @endif>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="code">{{ __('frontend.code') }}:</label>
                                    <input type="text" id="code" name="code" title="{{ __('frontend.code') }}"
                                        class="form-control @error('code') is-invalid @enderror"
                                        value="{{ old('code') }}" required autocomplete="code" autofocus
                                        placeholder="{{ __('frontend.enter_coupon_code') }}"
                                        style="margin-top: 10px;height: 40px;">
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-sm-12 ">
                                    <div class="checkout-info">
                                        <input type="submit" class="btn btn-checkout" value="{{ __('buttons.add') }}"
                                            style="margin-top:3.25rem;">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    @if ($featuredPorducts->count() > 0)
                        <div class="wrap-show-advance-info-box style-1 box-in-site">
                            <h3 class="title-box">
                                {{ __('frontend.most_viewed') }} ({{ $featuredPorducts->count() }})
                            </h3>
                            <div class="wrap-products" @if (App::getLocale() == 'ar') dir="rtl"@else dir="ltr" @endif>
                                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                                    data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                                    @foreach ($featuredPorducts as $featuredPorduct)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{ route('frontend.details', $featuredPorduct->id) }}"
                                                    title="{{ $featuredPorduct->name }}">
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
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">
                                                        {{ __('frontend.quick_view') }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('frontend.details', $featuredPorduct->id) }}"
                                                    class="product-name"><span>{{ $featuredPorduct->name }}</span></a>
                                                <div class="wrap-price">
                                                    @php
                                                        $discount = App\Models\Product::getDiscountedPrice($featuredPorduct->id);
                                                    @endphp
                                                    @if ($discount > 0)
                                                        <ins>
                                                            <p class="product-price" id="productPriceWithDiscAfter">
                                                                ${{ $discount }}
                                                            </p>
                                                        </ins>
                                                        <del>
                                                            <p class="product-price" id="productPriceWithDiscBefore">
                                                                ${{ $featuredPorduct->price }}
                                                            </p>
                                                        </del>
                                                    @else
                                                        <span class="product-price"
                                                            id="productPriceWithoutDisc">${{ $featuredPorduct->price }}
                                                        </span>
                                                    @endif
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

@section('scripts')
    <script>
        $(function() {
            $('#addCouponForm').submit(function() {
                var user = $(this).attr('user');
                if (user == '1') {

                } else {
                    toastr.info("{{ __('msgs.logged_in_for_coupon') }}");
                    return false;
                }
                var code = $('#code').val();
                $.ajax({
                    type: "post",
                    url: "/add-coupon",
                    data: {
                        code: code
                    },
                    success: function(response) {
                        if (response.status == 'not valid')
                            toastr.info("{{ __('msgs.coupon_code_not_valid') }}");

                        if (response.status == 'not active')
                            toastr.info("{{ __('msgs.coupon_code_not_active') }}");

                        if (response.status == 'is expire')
                            toastr.info("{{ __('msgs.coupon_code_is_expire') }}");

                        if (response.status == 'cat not found here')
                            toastr.info("{{ __('msgs.cat_not_found_here') }}");

                        if (response.status == 'user not found here')
                            toastr.info("{{ __('msgs.user_not_found_here') }}");

                        if (response.status == true) {
                            $('#totalProducts').html(response['totalCartProducts']);
                            $('#AppendCartProducts').html(response['view']);
                            toastr.success("{{ __('msgs.coupon_apply') }}");
                            $('#couponAmount').html(response.couponAmount);
                            $('#lastTotalPrice').html(response.lastTotalPrice);
                        }
                    },
                    error: function() {
                        alert('error')
                    }
                });
            });
        });
    </script>
@endsection
