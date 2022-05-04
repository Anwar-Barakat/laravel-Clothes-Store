@extends('layouts.master')
@section('title', __('translation.edit_admin'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.edit_admin') }}</span>
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
                    <h4 class="card-title mb-1">{{ __('translation.edit_admin') }}</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.admins.update', $admin) }}"
                        name="AdminAddForm" id="AdminAddForm" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                        <div class="row mb-4">
                            <div class="col-sm-12 text-center">
                                @if ($admin->getFirstMediaUrl('avatars', 'thumb'))
                                    <img src="{{ $admin->getFirstMediaUrl('avatars', 'thumb') }}"
                                        class="img img-thumbnail mb-4 admin-image m-auto">
                                @else
                                    <figure>
                                        <img class="shop-image admin-image"
                                            src="{{ asset('admin/images/avatars/admin.png') }}" alt="" width="200">
                                    </figure>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="name">{{ __('translation.name') }}</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" value="{{ old('name', $admin->name) }}"
                                        placeholder="{{ __('translation.type_admin_name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="email">{{ __('translation.email_address') }}</label>
                                    <input type="email" class="form-control " value="{{ $admin->email }}" readonly
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="type">{{ __('translation.type') }}</label>
                                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        <option value="super-admin"
                                            {{ old('type', $admin->type) == 'super-admin' ? 'selected' : '' }}>
                                            {{ __('translation.super-admin') }}
                                        </option>
                                        <option value="admin"
                                            {{ old('type', $admin->type) == 'admin' ? 'selected' : '' }}>
                                            {{ __('translation.admin') }}
                                        </option>
                                        <option value="sub-admin"
                                            {{ old('type', $admin->type) == 'sub-admin' ? 'selected' : '' }}>
                                            {{ __('translation.sub-admin') }}
                                        </option>
                                    </select>
                                    @error('type')
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
                                        <option value="1" {{ old('status', $admin->status) == '1' ? 'selected' : '' }}>
                                            {{ __('translation.active') }}</option>
                                        <option value="0" {{ old('status', $admin->status) == '0' ? 'selected' : '' }}>
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
                                    <label for="mobile">{{ __('translation.mobile') }}</label>
                                    <input type="mobile" name="mobile"
                                        class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                                        value="{{ old('mobile', $admin->mobile) }}"
                                        placeholder="{{ __('translation.type_mobile') }}" required>
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="password">{{ __('translation.password') }}</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        value="{{ old('password') }}" placeholder="{{ __('translation.password') }}"
                                        required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label
                                        for="password_confirmation">{{ __('translation.password_confirmation') }}</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" value="{{ old('password_confirmation') }}"
                                        placeholder="{{ __('translation.type_password_confirmation') }}" required>
                                    @error('password_confirmation')
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
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search'
            });
        });
    </script>
@endsection
