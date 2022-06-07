@auth
    <div class="summary order_summerized">
        <div class="order-summary" style="width: 100%">
            <div class="wrap-iten-in-cart" id="AppendCartProducts">
                @if (App\Models\DeliveryAddress::deliveryAddress()->count() > 0)
                    <h3 class="title-box">
                        {{ __('frontend.your_address') }}
                    </h3>
                @endif
                <ul style="padding: 0">
                    @forelse (App\Models\DeliveryAddress::deliveryAddress() as $deliveryAddress)
                        <li class="pr-cart-item summary-info" style="display: flex;column-gap: 1rem">
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
                        <li class="pr-cart-item summary-info">
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
        </div>
    </div>
@endauth
<br>
<br>
<h3 class="box-title">{{ __('frontend.products') }} ({{ totalProducts() }})</h3>
<ul class="products-cart">
    @php
        $totalPrice = 0;
    @endphp
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
            <div class="quantity text-center">
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
    @empty
        <li class="pr-cart-item" style="background-color: #f9f9f9;">
            <div class="text-center">
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
            <b class="index">$<b id="couponAmount">{{ Session::get('couponAmount') ?? '00' }}</b></b>
        </p>
        <p class="summary-info total-info ">
            <span class="title" style="font-size: 13px">
                {{ __('frontend.total') }} =
                ({{ __('frontend.subtotal') }} - {{ __('frontend.coupon_discount') }})
            </span>
            <b class="index">
                $<b id="lastTotalPrice">{{ $grandPrice = $totalPrice - Session::get('couponAmount') ?? '00' }}
                </b>
                {{ Session::put('grandPrice', $grandPrice) }}
            </b>
        </p>
    </div>
    <div class="checkout-info">
        <a class="btn btn-checkout"
            href="{{ route('frontend.delivery.address.create') }}">{{ __('frontend.add_delivery_address') }}</a>
        <a class="btn btn-checkout" href="{{ route('frontend.url', 'men-shoes') }}">
            {{ __('frontend.contiue_shopping') }} &nbsp;
            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
        </a>
    </div>
</div>

@section('js')
    {{-- Update Cart Products --}}
    <script>
        $(document).on('click', '.btnProductUpdate', function() {
            var quantity = $(this).parent().find('input').val();
            var newQuantity = quantity

            if ($(this).hasClass('btn-reduce')) {
                if (quantity <= 1) {
                    alert("{{ __('msgs.cant_reduce_quantity') }}");
                    return false;
                }
                newQuantity = --quantity;
            }
            if ($(this).hasClass('btn-increase')) {
                newQuantity = ++quantity;
            }
            alert(newQuantity);


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
                        toastr.info(
                            "{{ __('msgs.not_available', ['name' => __('translation.amount')]) }}");
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
                        toastr.info(
                            "{{ __('msgs.deleted', ['name' => __('translation.product')]) }}");
                    }
                }
            });
        });
    </script>
@endsection
