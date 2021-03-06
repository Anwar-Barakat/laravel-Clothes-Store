@extends('layouts.master')
@section('title', __('translation.edit_category'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.edit_category') }}</span>
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
                    <h4 class="card-title mb-1">{{ __('translation.edit_category') }}</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.categories.update', $category) }}"
                        enctype="multipart/form-data" name="categoryForm" id="categoryForm">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-12 text-center">
                                @if ($category->getFirstMediaUrl('categories', 'thumb'))
                                    <img src="{{ $category->getFirstMediaUrl('categories', 'thumb') }}"
                                        class="img img-thumbnail mb-4 admin-image m-auto">
                                @else
                                    <figure>
                                        <img class="shop-image"
                                            src="{{ asset('assets/img/banners/banner-default.jpg') }}" alt=""
                                            style="max-width: 60vw">
                                    </figure>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="name">{{ __('translation.name') }}</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" value="{{ old('name', $category->name) }}"
                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.name')]) }}"
                                        required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="status">{{ __('translation.status') }}</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status"
                                        name="status">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        <option value="1"
                                            {{ old('status', $category->status) == '1' ? 'selected' : '' }}>
                                            {{ __('translation.active') }}</option>
                                        <option value="0"
                                            {{ old('status', $category->status) == '0' ? 'selected' : '' }}>
                                            {{ __('translation.disactive') }}</option>
                                    </select>
                                    @error('status')
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
                                    <p class="mg-b-10">{{ __('translation.sections') }}</p>
                                    <select name="section_id" id="section_id"
                                        class="form-control @error('section_id') is-invalid @enderror">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}"
                                                {{ $category->section_id == $section->id ? 'selected' : '' }}>
                                                {{ $section->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group" id="appendCategoriesLevel">
                                    @include('admin.categories.append__category')
                                </div>
                            </div>
                        </div>
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
                                    <label for="discount">{{ __('translation.discount') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input name="discount" aria-label="Amount (to the nearest dollar)"
                                            class="form-control @error('discount') is-invalid @enderror" type="number"
                                            value="{{ old('discount', $category->discount) }}"
                                            placeholder="{{ __('translation.please_type', ['name' => __('translation.discount')]) }}">
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
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="description">{{ __('translation.desc') }}</label>
                                    <textarea description="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                        id="description" rows="3"
                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.desc')]) }}">{{ old('description', $category->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <hr>
                        <h4 class="card-title pb-2 pt-1">{{ __('translation.meta') }}</h4>
                        <div class="row">
                            <div class="col-sm-12 col-xl-4">
                                <div class="form-group">
                                    <label for="meta_title">{{ __('translation.meta_title') }}</label>
                                    <input meta_title="text" name="meta_title"
                                        class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                                        value="{{ old('meta_title', $category->meta_title) }}"
                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.meta_title')]) }}">
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
                                        value="{{ old('meta_description', $category->meta_description) }}"
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
                                        class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords"
                                        value="{{ old('meta_keywords', $category->meta_keywords) }}"
                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.meta_keywords')]) }}">
                                    @error('meta_description')
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

    {{-- Append Categories Level --}}
    <script>
        $(document).ready(function() {
            $('#section_id').change(function() {
                var section_id = $(this).val();
                // alert(section_id);
                $.ajax({
                    type: 'post',
                    url: '/admin/append-categories-level',
                    data: {
                        section_id: section_id
                    },
                    success: function(response) {
                        $('#appendCategoriesLevel').html(response);
                    },
                    error: function() {
                        alert('error');
                    }
                });
            });
        });
    </script>
@endsection
