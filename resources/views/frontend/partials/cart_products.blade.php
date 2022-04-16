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
                {{ __('frontend.update_quantity') }}
            </div>
            <div class="price-field sub-total">
                {{ __('frontend.price_after_discount') }}
            </div>
            <div class="delete">
                {{ __('buttons.delete') }}
            </div>
        </li>
    @endif
    @foreach ($userCartProducts as $userCartProduct)
        @php
            $price = App\Models\Product::getDiscountedAttributePrice($userCartProduct->product->id, $userCartProduct->size);
        @endphp
        <li class="pr-cart-item">
            <div class="product-image" style="width: 10%">
                @if ($userCartProduct->product->getFirstMediaUrl('image_products', 'small'))
                    <figure>
                        <img src="{{ $userCartProduct->product->getFirstMediaUrl('image_products', 'small') }}">
                    </figure>
                @else
                    <figure>
                        <img src="{{ asset('assets/img/products/default-image.png') }}" alt="">
                    </figure>
                @endif
            </div>
            <div class="product-name" style="text-align: center">
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
                    ${{ $price['productPrice'] }}
                </p>
            </div>
            <div class="price-field sub-total">
                <p class="price">
                    ${{ $price['discount'] }}
                </p>
            </div>
            <div class="quantity">
                <div class="quantity-input">
                    <input type="text" name="product-quatity" value="{{ $userCartProduct->quantity }}" data-max="120"
                        pattern="[0-9]*">
                    <a class="btnProductUpdate btn btn-reduce" href="javascript:void(0)"
                        cartId="{{ $userCartProduct->id }}"></a>
                    <a class="btnProductUpdate btn btn-increase" href="javascript:void(0)"
                        cartId="{{ $userCartProduct->id }}"></a>
                </div>
            </div>
            <div class="price-field sub-total">
                <p class="price">
                    ${{ $price['finalPrice'] * $userCartProduct->quantity }}
                </p>
            </div>
            <div class="delete">
                <a href="#" class="btn btn-delete btnProductDelete" title="" cartId="{{ $userCartProduct->id }}">
                    <span>{{ __('frontend.delete_from_cart') }}</span>
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                </a>
            </div>
        </li>
        @php
            $totalPrice = $totalPrice + $price['finalPrice'] * $userCartProduct->quantity;
        @endphp
    @endforeach
</ul>
<div class="summary">
    <div class="order-summary">
        <h4 class="title-box">{{ __('frontend.order_summary') }}</h4>
        <p class="summary-info">
            <span class="title">{{ __('frontend.subtotal') }}</span>
            <b class="index">${{ $totalPrice ?? 0 }}</b>
        </p>
        <p class="summary-info" style="margin: 10px 0">
            <span class="title">{{ __('frontend.coupon_discount') }}</span>
            <b class="index">$
                <b id="couponAmount">{{ Session::get('couponAmount') ?? '00' }}</b>
            </b>
        </p>
        <p class="summary-info total-info ">
            <span class="title" style="font-size: 13px">
                {{ __('frontend.total') }} =
                ({{ __('frontend.subtotal') }} - {{ __('frontend.coupon_discount') }})
            </span>
            <b class="index">$
                <b id="lastTotalPrice">{{ $totalPrice - Session::get('couponAmount') ?? '00' }}</b>
            </b>
        </p>
    </div>
    <div class="checkout-info">
        <a class="btn btn-checkout"
            href="{{ route('frontend.delivery.address.index') }}">{{ __('frontend.checkout') }}</a>
        <a class="link-to-shop"
            href="{{ route('frontend.url', 'men-shoes') }}">{{ __('frontend.contiue_shopping') }}<i
                class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
    </div>
    <div class="update-clear">
        <a class="btn btn-clear" href="#">{{ __('frontend.clear_cart') }}</a>
        <a class="btn btn-update" href="#">{{ __('frontend.update_cart') }}</a>
    </div>
</div>

@section('js')
    {{-- Update Cart Products --}}
    <script>
        $(document).on('click', '.btnProductUpdate', function() {
            if ($(this).hasClass('btn-reduce')) {
                var quantity = $(this).prev().val();
                if (quantity <= 1) {
                    alert("{{ __('msgs.cant_reduce_quantity') }}");
                    return false;
                } else
                    newQuantity = parseInt(quantity) - 1;
            }
            if ($(this).hasClass('btn-increase')) {
                var quantity = $(this).prev().prev().val();
                newQuantity = parseInt(quantity) + 1;
            }
            alert(newQuantity)

            var cartId = $(this).attr('cartId');
            $.ajax({
                type: "post",
                url: "update-cart-products-quantity",
                data: {
                    cartId: cartId,
                    newQuantity: newQuantity,
                },
                success: function(response) {
                    if (response.status == false)
                        toastr.info("{{ __('msgs.amount_not_available') }}");
                    $('#totalProducts').html(response['totalCartProducts']);
                    $('#AppendCartProducts').html(response['view']);
                },
                error: function() {
                    alert('error')
                }
            });
        });
    </script>

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
@endsection
