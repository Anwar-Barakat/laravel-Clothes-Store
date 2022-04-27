@extends('layouts.master')
@section('title', __('translation.edit_product'))
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('translation.dashboard') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.edit_product') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row  mb-5">
        <div class="col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">{{ __('translation.main_info') }} :</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.products.update', $product) }}"
                        enctype="multipart/form-data" name="ProductForm" id="ProductForm">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="name">{{ __('translation.name') }}</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" value="{{ old('name', $product->name) }}"
                                        placeholder="{{ __('translation.product_name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="code">{{ __('translation.code') }}</label>
                                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                                        id="code" value="{{ old('code', $product->code) }}"
                                        placeholder="{{ __('translation.enter_product_code') }}">
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="color">{{ __('translation.color') }}</label>
                                    <input type="text" name="color"
                                        class="form-control @error('color') is-invalid @enderror" id="color"
                                        value="{{ old('color', $product->color) }}"
                                        placeholder="{{ __('translation.enter_product_color') }}">
                                    @error('color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-4 col-sm-12">
                                <div class="form-group">
                                    <label for="price">{{ __('translation.price') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" name="price" aria-label="Amount (to the nearest dollar)"
                                            class="form-control @error('price') is-invalid @enderror"
                                            value="{{ old('price', $product->price) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div><!-- input-group -->
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-12">
                                <div class="form-group">
                                    <label for="discount">{{ __('translation.discount') }} (%)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <input type="number" name="discount" aria-label="Amount (to the nearest dollar)"
                                            class="form-control @error('discount') is-invalid @enderror"
                                            value="{{ old('discount', $product->discount) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div><!-- input-group -->
                                    @error('discount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-12">
                                <div class="form-group">
                                    <label for="weight">{{ __('translation.weight') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('translation.g') }}</span>
                                        </div>
                                        <input name="weight" class="form-control @error('weight') is-invalid @enderror"
                                            type="number" value="{{ old('weight', $product->weight) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div><!-- input-group -->
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <p class="mg-b-10">{{ __('translation.categories') }}</p>
                                    <select name="category_id" id="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        @foreach ($categories as $section)
                                            <optgroup label="{{ $section->name }}"></optgroup>
                                            @foreach ($section->categories ?? [] as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                    &nbsp;&raquo;&nbsp; {{ $category->name }}
                                                </option>
                                                @foreach ($category->subCategories ?? [] as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ old('category_id', $product->category_id) == $subcategory->id ? 'selected' : '' }}>
                                                        &nbsp;&raquo;&nbsp; &nbsp;&raquo;&nbsp;
                                                        {{ $subcategory->name }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <p class="mg-b-10">{{ __('translation.brand') }}</p>
                                    <select name="brand_id" id="brand_id"
                                        class="form-control @error('brand_id') is-invalid @enderror">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        @foreach (App\Models\Brand::all() as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ old('brand_id', $product->brand_id) == strval($brand->id) ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <hr>

                        <h4 class="card-title mb-3">{{ __('translation.attachments') }} :</h4>
                        <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="image">{{ __('translation.image') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="customFile" type="file" type="file"
                                            name="image" accept=".jpg, .png, image/jpeg, image/png"> <label
                                            class="custom-file-label @error('image') is-invalid @enderror"
                                            for="customFile">{{ __('translation.choose_file') }}</label>
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="video">{{ __('translation.video') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="customFile" type="file" type="file"
                                            name="video" accept=".mp4"> <label
                                            class="custom-file-label @error('video') is-invalid @enderror"
                                            for="customFile">{{ __('translation.choose_video') }}</label>
                                    </div>
                                    @error('video')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 row-grid">
                            <div class="col-sm-12 text-center col-xl-6">
                                @if ($product->getFirstMediaUrl('image_products', 'small'))
                                    <img src="{{ $product->getFirstMediaUrl('image_products', 'medium') }}"
                                        class="img img-thumbnail mb-4 admin-image product_edit_image">
                                @else
                                    <img src="{{ asset('assets/img/1.jpg') }}"
                                        class="img img-thumbnail mb-4 admin-image product_edit_image"
                                        alt="Alternative Image">
                                @endif
                            </div>
                            <div class="col-sm-12 text-center col-xl-6">
                                @if ($product->getFirstMediaUrl('video_products'))
                                    <video width="320" height="240" class="img img-thumbnail mb-4 admin-image" controls>
                                        <source src="{{ $product->getFirstMediaUrl('video_products') }}"
                                            type="video/mp4">
                                        <source src="{{ $product->getFirstMediaUrl('video_products') }}"
                                            type="video/ogg">
                                        {{ __('msgs.browser_error') }}
                                    </video>
                                @else
                                    <img src="{{ asset('assets/img/1.jpg') }}" class="img img-thumbnail mb-4 admin-image"
                                        alt="Alternative Vedio">
                                @endif
                            </div>
                        </div>
                        <hr>

                        <h4 class="card-title mb-3">{{ __('translation.filters') }} :</h4>
                        <div class="row">
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="fabric">{{ __('translation.fabric') }}</label>
                                    <select class="form-control @error('fabric') is-invalid @enderror" id="fabric"
                                        name="fabric">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        @foreach (App\Models\Product::fabricArray as $index => $fabric)
                                            <option value="{{ $index }}"
                                                {{ old('fabric', $product->fabric) == strval($index) ? 'selected' : '' }}>
                                                {{ __('translation.' . $fabric) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('fabric')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="pattern">{{ __('translation.pattern') }}</label>
                                    <select class="form-control @error('pattern') is-invalid @enderror" id="pattern"
                                        name="pattern">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        @foreach (App\Models\Product::patternArray as $index => $pattern)
                                            <option value="{{ $index }}"
                                                {{ old('pattern', $product->pattern) == strval($index) ? 'selected' : '' }}>
                                                {{ __('translation.' . $pattern) }}</option>
                                        @endforeach
                                    </select>
                                    @error('pattern')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="sleeve">{{ __('translation.sleeve') }}</label>
                                    <select class="form-control @error('sleeve') is-invalid @enderror" id="sleeve"
                                        name="sleeve">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        @foreach (App\Models\Product::sleeveArray as $index => $sleeve)
                                            <option value="{{ $index }}"
                                                {{ old('sleeve', $product->sleeve) == strval($index) ? 'selected' : '' }}>
                                                {{ __('translation.' . $sleeve) }}</option>
                                        @endforeach
                                    </select>
                                    @error('sleeve')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="fit">{{ __('translation.fit') }}</label>
                                    <select class="form-control @error('fit') is-invalid @enderror" id="fit" name="fit">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        @foreach (App\Models\Product::fitArray as $index => $fit)
                                            <option value="{{ $index }}"
                                                {{ old('fit', $product->fit) == strval($index) ? 'selected' : '' }}>
                                                {{ __('translation.' . $fit) }}</option>
                                        @endforeach
                                    </select>
                                    @error('fit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="occasion">{{ __('translation.occasion') }}</label>
                                    <select class="form-control @error('occasion') is-invalid @enderror" id="occasion"
                                        name="occasion">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        @foreach (App\Models\Product::occasionArray as $index => $occasion)
                                            <option value="{{ $index }}"
                                                {{ old('occasion', $product->occasion) == strval($index) ? 'selected' : '' }}>
                                                {{ __('translation.' . $occasion) }}</option>
                                        @endforeach
                                    </select>
                                    @error('occasion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="is_feature">{{ __('translation.is_feature') }}</label>
                                    <select class="form-control @error('is_feature') is-invalid @enderror" id="is_feature"
                                        name="is_feature">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        <option value="Yes"
                                            {{ old('is_feature', $product->is_feature) == 'Yes' ? 'selected' : '' }}>
                                            {{ __('translation.yes') }}
                                        </option>
                                        <option value="No"
                                            {{ old('is_feature', $product->is_feature) == 'No' ? 'selected' : '' }}>
                                            {{ __('translation.no') }}
                                        </option>
                                    </select>
                                    @error('is_feature')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="card-title mb-3">{{ __('translation.additional_info') }} :</h4>
                        <div class="row">
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="description">{{ __('translation.desc') }}</label>
                                    <textarea description="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                        id="description" rows="3"
                                        placeholder="{{ __('translation.product_description') }}">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="wash_care">{{ __('translation.wash_care') }}</label>
                                    <textarea wash_care="text" name="wash_care" class="form-control @error('wash_care') is-invalid @enderror"
                                        id="wash_care" rows="3"
                                        placeholder="{{ __('translation.product_wash_care') }}">{{ old('wash_care', $product->wash_care) }}</textarea>
                                    @error('wash_care')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="meta_title">{{ __('translation.meta_title') }}</label>
                                    <input meta_title="text" name="meta_title"
                                        class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                                        value="{{ old('meta_title', $product->meta_title) }}"
                                        placeholder="{{ __('translation.meta_title') }}">
                                    @error('meta_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="meta_description">{{ __('translation.meta_description') }}</label>
                                    <input meta_description="text" name="meta_description"
                                        class="form-control @error('meta_description') is-invalid @enderror"
                                        id="meta_description"
                                        value="{{ old('meta_description', $product->meta_description) }}"
                                        placeholder="{{ __('translation.meta_description') }}">
                                    @error('meta_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="meta_keywords">{{ __('translation.meta_keywords') }}</label>
                                    <input meta_keywords="text" name="meta_keywords"
                                        class="form-control @error('meta_keywords') is-invalid @enderror"
                                        id="meta_keywords" value="{{ old('meta_keywords', $product->meta_keywords) }}"
                                        placeholder="{{ __('translation.meta_keywords') }}">
                                    @error('meta_keywords')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="button-30"
                                    role="button">{{ __('buttons.update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6 col-sm-12 col-sm-12">

        </div>
    </div>
    <!-- row -->
@endsection
@section('js')
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search'
            });
        });
    </script>
@endsection
