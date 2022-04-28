<div class="row productsField">
    <ul class="grid-products equal-container product-grid-template">
        @forelse ($categoryProducts as $product)
            <li class="product-list__item">
                <div class="product product-style-3 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{ route('frontend.details', $product->id) }}" title="{{ $product->name }}">
                            @if ($product->getFirstMediaUrl('image_products', 'small'))
                                <figure>
                                    <img src="{{ $product->getFirstMediaUrl('image_products', 'small') }}"
                                        alt="{{ $product->name }}" width="90%">
                                </figure>
                            @else
                                <figure>
                                    <img src="{{ asset('assets/img/products/default-image.png') }}" alt=""
                                        width="90%">
                                </figure>
                            @endif
                        </a>
                    </div>
                    <div class="product-info">
                        <span class="brand">{{ $product->brand->name }}</span>
                        <a href="{{ route('frontend.details', $product->id) }}"
                            class="product-name"><span>{{ $product->name }}</span></a>
                        <div class="wrap-price">
                            @php
                                $discount = App\Models\Product::getDiscountedPrice($product->id);
                            @endphp
                            @if ($discount > 0)
                                <ins>
                                    <p class="product-price">${{ $discount }} </p>
                                </ins>
                                <del>
                                    <p class="product-price">${{ $product->price }}</p>
                                </del>
                            @else
                                <span class="product-price">${{ $product->price }}</span>
                            @endif
                        </div>
                        <a href="{{ route('frontend.details', $product->id) }}"
                            class="main-button">{{ __('frontend.add_to_cart') }}</a>
                    </div>
                </div>
            </li>
        @empty
            <li class="col-12" style="text-align: center;line-height: 8rem;font-size: 2rem;">
                {{ __('msgs.no_products_yet') }}
            </li>
        @endforelse
    </ul>
    <ul class="product-list equal-container product-list-template disactive">
        @forelse ($categoryProducts as $product)
            <li>
                <div class="product product-style-3 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{ route('frontend.details', $product->id) }}" title="{{ $product->name }}">
                            @if ($product->getFirstMediaUrl('image_products', 'small'))
                                <figure>
                                    <img src="{{ $product->getFirstMediaUrl('image_products', 'small') }}"
                                        alt="{{ $product->name }}" width="90%">
                                </figure>
                            @else
                                <figure>
                                    <img src="{{ asset('assets/img/products/default-image.png') }}" alt=""
                                        width="90%">
                                </figure>
                            @endif
                        </a>
                    </div>
                    <div class="product-info">
                        <span>{{ $product->brand->name }}</span>
                        <a href="{{ route('frontend.details', $product->id) }}"
                            class="product-name"><span>{{ $product->name }}</span></a>
                        <p class="product-description">{!! \Illuminate\Support\Str::limit($product->description, 145, '....') !!}</p>
                        <div class="wrap-price"><span class="product-price">${{ $product->price }}</span>
                        </div>
                        <a href="#" class="btn add-to-cart">{{ __('frontend.add_to_cart') }}</a>
                    </div>
                </div>
            </li>
        @empty
            <li class="col-12" style="text-align: center;line-height: 8rem;font-size: 2rem;">
                {{ __('msgs.no_products_yet') }}
            </li>
        @endforelse
    </ul>
</div>

@section('js')
    {{-- List & Grid Menu --}}
    <script>
        var gridMode = document.querySelector('.grid-mode');
        var listMode = document.querySelector('.list-mode');

        gridMode.addEventListener('click', () => {
            if (!gridMode.classList.contains('active')) {
                listMode.classList.remove('active');
                gridMode.classList.add('active');
            }
            document.querySelector('.product-list-template').classList.add('disactive');
            document.querySelector('.product-grid-template').classList.remove('disactive');
        });

        listMode.addEventListener('click', () => {
            if (!listMode.classList.contains('active')) {
                gridMode.classList.remove('active');
                listMode.classList.add('active');
            }
            document.querySelector('.product-grid-template').classList.add('disactive');
            document.querySelector('.product-list-template').classList.remove('disactive');
        });
    </script>

    {{-- Sorting --}}
    <script>
        $('#orderby').on('change', function() {
            var sort = $(this).val();
            var fabric = get_filter('fabric');
            var sleeve = get_filter('sleeve');
            var pattern = get_filter('pattern');
            var fit = get_filter('fit');
            var occasion = get_filter('occasion');
            var url = $('#url').val();

            $.ajax({
                type: "post",
                url: url,
                data: {
                    sort: sort,
                    url: url,
                    fabric: fabric,
                    sleeve: sleeve,
                    pattern: pattern,
                    fit: fit,
                    occasion: occasion,
                },
                success: function(response) {
                    $('.productsField').html(response);
                },
                error: function() {
                    alert('fail')
                }
            });
        });
    </script>
@endsection
