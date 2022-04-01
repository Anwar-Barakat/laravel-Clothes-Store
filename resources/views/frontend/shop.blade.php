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
                            <a href="{{ $categoryImageId->url }}" class="banner-link">
                                @if ($categoryImageId->getFirstMediaUrl('categories', 'thumb'))
                                    <figure>
                                        <img class="shop-image"
                                            src="{{ $categoryImageId->getFirstMediaUrl('categories', 'thumb') }}">
                                    </figure>
                                @else
                                    <figure>
                                        <img class="shop-image"
                                            src="{{ asset('assets/img/banners/banner-default.jpg') }}" alt="">
                                    </figure>
                                @endif
                            </a>
                        </div>
                        <div class="wrap-shop-control">
                            <h1 class="shop-title">
                                {{ $categoryDetails->catDetails['name'] }}
                                ({{ $categoryProducts->total() }})
                            </h1>
                            <div class="wrap-right">
                                <form id="sortProduct" name="sortProduct">
                                    <div class="sort-item orderby ">
                                        <input type="hidden" id="url" name="url" value="{{ $url }}">
                                        <select name="orderby" id="orderby" class="use-chosen">
                                            <option value="" selected="selected">
                                                {{ __('frontend.default_sorting') }}
                                            </option>
                                            <option value="date"
                                                @if (isset($_GET['orderby']) && $_GET['orderby'] == 'date') {{ 'selected' }} @endif>
                                                {{ __('frontend.newest_sort') }}</option>
                                            <option value="name_a_z"
                                                @if (isset($_GET['orderby']) && $_GET['orderby'] == 'name_a_z') {{ 'selected' }} @endif>
                                                {{ __('frontend.name_a_z_sort') }}</option>
                                            <option value="name_z_a"
                                                @if (isset($_GET['orderby']) && $_GET['orderby'] == 'name_z_a') {{ 'selected' }} @endif>
                                                {{ __('frontend.name_z_a_sort') }}</option>
                                            <option value="price_asc"
                                                @if (isset($_GET['orderby']) && $_GET['orderby'] == 'price_asc') {{ 'selected' }} @endif>
                                                {{ __('frontend.price_asc_sort') }}</option>
                                            <option value="price_desc"
                                                @if (isset($_GET['orderby']) && $_GET['orderby'] == 'price_desc') {{ 'selected' }} @endisset>
                                                {{ __('frontend.price_desc_sort') }}</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="change-display-mode">
                                <a href="javascript:void(0);" class="grid-mode display-mode active">
                                    <i class="fa fa-th"></i>{{ __('frontend.grid') }}
                                </a>
                                <a href="javascript:void(0);" class="list-mode display-mode">
                                    <i class="fa fa-th-list"></i>{{ __('frontend.list') }}
                                </a>
                            </div>
                        </div>
                        <div dir="ltr" class="cat-titles">
                            <h4>
                                @php
                                    echo $categoryDetails->breadcrumbs;
                                @endphp
                            </h4>
                            <h5>{{ $categoryDetails->catDetails['description'] }}</h5>
                        </div>
                        <!--end wrap shop control-->


                        @include('frontend.partials.ajax_products')

                        <div class="wrap-pagination-info">
                            @if (isset($_GET['orderby']) && !empty($_GET['orderby']))
                                {!! $categoryProducts->appends(['orderby' => $_GET['orderby']])->links() !!}
                            @else
                                {!! $categoryProducts->links() !!}
                            @endif
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
                                                <a href="{{ $category->url }}"
                                                    class="cate-link">{{ $category->name }}</a>
                                                @if ($category->subCategories->count() > 0)
                                                    <span class="toggle-control">+</span>
                                                @endif
                                                <ul class="sub-cate">
                                                    @foreach ($category->subCategories ?? [] as $subcategory)
                                                        <li class="category-item">
                                                            <a href="{{ $subcategory->url }}" class="cate-link">
                                                                - {{ $subcategory->name }}
                                                            </a>
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
                                    @foreach ($brands as $index => $brand)
                                        <li class="list-item {{ $index >= 3 ? 'default-hiden' : '' }}">
                                            <a class="filter-link " href="#">
                                                {{ $brand->name }}
                                            </a>
                                        </li>
                                    @endforeach
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

                        <hr>
                        <div class="widget mercado-widget filter-widget">
                            <h2 class="widget-title">{{ __('frontend.fabric') }}</h2>
                            <div class="widget-content fabrics">
                                @foreach (App\Models\Product::fabricArray as $index => $fabric)
                                    <label for="{{ $fabric }}" class="material__label">
                                        <input class="fabric" id="{{ $fabric }}" name="fabric[]"
                                            type="checkbox" value="{{ $index }}" />
                                        <span>{{ __('frontend.' . $fabric) }}</span>
                                    </label>
                                @endforeach
                            </div>
                                <hr>
                                <h2 class="widget-title">{{ __('frontend.pattern') }}</h2>
                                <div class="widget-content pattern">
                                    @foreach (App\Models\Product::patternArray as $index => $pattern)
                                        <label for="{{ $pattern }}" class="material__label">
                                            <input class="pattern" id="{{ $pattern }}" name="pattern[]"
                                                type="checkbox" value="{{ $index }}" />
                                            <span>{{ __('frontend.' . $pattern) }}</span>
                                        </label>
                                    @endforeach
                                </div>

                            <hr>
                            <h2 class="widget-title">{{ __('frontend.fit') }}</h2>
                            <div class="widget-content fit">
                                @foreach (App\Models\Product::fitArray as $index => $fit)
                                    <label for="{{ $fit }}" class="material__label">
                                        <input class="fit" id="{{ $fit }}" name="fit[]" type="checkbox"
                                            value="{{ $index }}" />
                                        <span>{{ __('frontend.' . $fit) }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <hr>
                            <h2 class="widget-title">{{ __('frontend.occasion') }}</h2>
                            <div class="widget-content occasion">
                                @foreach (App\Models\Product::occasionArray as $index => $occasion)
                                    <label for="{{ $occasion }}" class="material__label">
                                        <input class="occasion" id="{{ $occasion }}" name="occasion[]"
                                            type="checkbox" value="{{ $index }}" />
                                        <span>{{ __('frontend.' . $occasion) }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        @include('frontend.partials.popular_products')
                    </div>
                    <!--end sitebar-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </main>
    </div>
@endsection

@section('scripts')
    <script>
        $('.fabric , .sleeve ,.pattern,.fit,.occasion').on('click', function() {
            var sort = $('#orderby option:selected').val();
            var url = $('#url').val();
            var fabric = get_filter('fabric');
            var sleeve = get_filter('sleeve');
            var pattern = get_filter('pattern');
            var fit = get_filter('fit');
            var occasion = get_filter('occasion');
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
                    $('.productsField').html(response)
                },
                error: function() {
                    alert('fail')
                }
            });
        });

        function get_filter(className) {
            var filters = [];
            $('.' + className + ':checked').each(function() {
                filters.push($(this).val());
            });
            return filters;
        }
    </script>
@endsection
