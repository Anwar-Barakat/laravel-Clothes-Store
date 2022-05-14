@auth
    <div class="wrap-iten-in-cart" id="AppendCartProducts">
        @if ($deliveryAddresses->count() > 0)
            <h3 class="box-title">
                {{ __('frontend.check_your_address') }}
            </h3>
        @endif
        <ul class="p-0">
            @forelse ($deliveryAddresses  as $deliveryAddress)
                <li class="pr-cart-item" style="display: flex;column-gap: 1rem">
                    <input class="" id="address{{ $deliveryAddress->id }}" name="address_id" type="radio"
                        required value="{{ $deliveryAddress->id }}" total_gst={{ $totalGST }}
                        shipping_charges="{{ $deliveryAddress->shippingCharges }}" totalPrice="{{ $totalPrice }}"
                        couponAmount="{{ Session::get('couponAmount') ?? 0 }}">
                    <label for="address{{ $deliveryAddress->id }}">
                        {{ $deliveryAddress->name }},{{ $deliveryAddress->address }},{{ $deliveryAddress->city }},{{ $deliveryAddress->state }}
                        {{ $deliveryAddress->country->name }}
                        (<a href="{{ route('frontend.delivery.address.edit', $deliveryAddress) }}"
                            class="text text-success">
                            {{ __('buttons.edit') }}
                            <i class="fa fa-edit"></i>
                        </a>/
                        <a href="javascript:void(0);" class="confirmationDelete text-danger"
                            data-delivery="{{ $deliveryAddress->id }}" title="{{ __('buttons.delete') }}">
                            {{ __('buttons.delete') }}
                            <i class="fa fa-trash"></i>
                        </a>)
                    </label>
                </li>
            @empty
                <li class="pr-cart-item">
                    <div class="product-image">
                        {{ __('frontend.no_delivery_address') }}
                    </div>
                </li>
            @endforelse
            @error('address_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </ul>
    </div>
    <hr>
@endauth

<h3 class="box-title">{{ __('frontend.products') }} ({{ totalProducts() }})</h3>
<ul class="products-cart">
    @php
        $totalPrice = 0;
    @endphp
    @if ($userCartProducts->count() > 0)
        <li class="pr-cart-item">
            <div class="product-image" style="width: 10%">
                {{ __('frontend.product') }}
            </div>
            <div class="product-name" style="text-align: center">
                {{ __('frontend.detail') }}
            </div>
            <div class="price-field sub-total">
                {{ __('frontend.price') }}
            </div>
            <div class="price-field sub-total">
                {{ __('frontend.discount') }}
            </div>
            <div class="quantity">
                {{ __('frontend.quantity') }}
            </div>
            <div class="price-field sub-total">
                {{ __('frontend.price_after_discount') }}
            </div>
        </li>
    @endif
    @forelse ($userCartProducts as $userCartProduct)
        @php
            $price = App\Models\Product::getDiscountedAttributePrice($userCartProduct->product->id, $userCartProduct->size);
        @endphp
        <li class="pr-cart-item">
            <div class="product-image" style="width: 10%">
                @if ($userCartProduct->product->getFirstMediaUrl('image_products', 'small'))
                    <figure>
                        <img src="{{ $userCartProduct->product->getFirstMediaUrl('image_products', 'small') }}"
                            class="img img-thumbnail">
                    </figure>
                @else
                    <figure>
                        <img src="{{ asset('assets/img/products/default-image.png') }}" alt=""
                            class="img img-thumbnail">
                    </figure>
                @endif
            </div>
            <div class="product-name" style="text-align: center">
                <div>
                    <a class="link-to-product" href="javascript:void(0);">
                        {{ __('frontend.name') }} :
                        {{ $userCartProduct->product->name }}</a>
                </div>
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
                    ${{ $price['productPrice'] * $userCartProduct->quantity }}
                </p>
            </div>
            <div class="price-field sub-total">
                <p class="price">
                    ${{ $price['discount'] * $userCartProduct->quantity }}
                </p>
            </div>
            <div class="price-field text-center">
                <p href="javascript:void(0)">{{ $userCartProduct->quantity }}</p>
            </div>
            <div class="price-field sub-total">
                <p class="price">
                    ${{ $price['finalPrice'] * $userCartProduct->quantity }}
                </p>
            </div>
        </li>
        @php
            $totalPrice = $totalPrice + $price['finalPrice'] * $userCartProduct->quantity;
        @endphp
    @empty
        <li class="pr-cart-item">
            <div class="product-image">
                {{ __('frontend.no_product') }}
            </div>
        </li>
    @endforelse
</ul>
<div class="summary order_summerized">
    <div class="order-summary">
        <h4 class="title-box">{{ __('frontend.order_summary') }}</h4>
        <p class="summary-info">
            <span class="title">{{ __('frontend.subtotal') }}</span>
            <b class="index">${{ $totalPrice ?? 0 }}</b>
        </p>
        <p class="summary-info" style="margin: 10px 0">
            <span class="title">{{ __('frontend.coupon_discount') }}</span>
            <b class="index">-$<b id="couponAmount">{{ Session::get('couponAmount') ?? '00' }}</b>
            </b>
        </p>
        <p class="summary-info" style="margin: 10px 0">
            <span class="title">{{ __('frontend.shipping_charges') }}</span>
            <b class="index">+$<b id="shippingChargesPos"></b>
            </b>
        </p>
        <p class="summary-info" style="margin: 10px 0">
            <span class="title">{{ __('frontend.gst') }}</span>
            <b class="index">+$<b id="totalGST">{{ $totalGST }}</b>
            </b>
        </p>
        <p class="summary-info total-info ">
            <span class="title" style="font-size: 13px">
                {{ __('frontend.total') }} =
                ({{ __('frontend.subtotal') }} - {{ __('frontend.coupon_discount') }} +
                {{ __('frontend.shipping_charges') }})
            </span>
            <b class="index">
                $<b id="lastTotalPrice">{{ $grandPrice = $totalPrice + $totalGST - Session::get('couponAmount') ?? '00' }}
                </b>
                {{ Session::put('grandPrice', $grandPrice) }}
            </b>
        </p>
    </div>
    <div class="checkout-info">
        @auth
            <a class="btn btn-checkout"
                href="{{ route('frontend.delivery.address.create') }}">{{ __('frontend.add_delivery_address') }}</a>
        @endauth
        <a class="btn btn-checkout" href="{{ route('frontend.url', 'men-shoes') }}">
            {{ __('frontend.contiue_shopping') }} &nbsp;
            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
        </a>
    </div>
</div>

@section('js')
    {{-- Delete The Product from shopping cart --}}
    <script>
        $(document).on('click', '.btnProductDelete', function() {
            var cartId = $(this).attr('cartId');
            $.ajax({
                type: "post",
                url: "delete-cart-product",
                data: {
                    cartId: cartId
                },
                success: function(response) {
                    if (response.status == true) {
                        toastr.info("{{ __('msgs.cart_product_delete') }}");
                    }
                }
            });
        });
    </script>


    {{-- Calculate shipping charges and update grand amount --}}
    <script>
        $('input[name=address_id]').bind('change', function() {
            var shipping__charges = $(this).attr('shipping_charges');
            var coupon__amount = $(this).attr('couponAmount');
            var total_gst = $(this).attr('total_gst');
            var total__price = $(this).attr('totalPrice');
            $('#shippingChargesPos').html(shipping__charges);
            var grand__total = parseInt(total__price) + parseInt(shipping__charges) + parseInt(total_gst) -
                parseInt(coupon__amount);
            $('#lastTotalPrice').html(grand__total)
        });
    </script>
@endsection
