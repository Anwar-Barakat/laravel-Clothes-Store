@extends('layouts.master')
@section('title', __('translation.admin_settings'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('translation.dashboard') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.admin_settings') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row  mb-5">
        <div class="col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">{{ __('translation.change_admin_detail') }}</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.update.details') }}"
                        name="updateAdminDetailsForm" id="updateAdminDetailsForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-12 text-center">
                                @if (Auth::guard('admin')->user()->getFirstMediaUrl('avatars', 'thumb'))
                                    <img src="{{ Auth::guard('admin')->user()->getFirstMediaUrl('avatars', 'thumb') }}"
                                        class="img img-thumbnail  admin-image">
                                @else
                                    <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                        class="img img-thumbnail  admin-image">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="name">{{ __('translation.name') }}</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" value="{{ old('name', Auth::guard('admin')->user()->name) }}"
                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.name')]) }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="email">{{ __('translation.email_address') }}</label>
                                    <input class="form-control" readonly="readonly" id="email"
                                        value="{{ Auth::guard('admin')->user()->email }}"
                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.email_address')]) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="type">{{ __('translation.admin_type') }}</label>
                                    <input type="text" name="type" class="form-control @error('type') is-invalid @enderror"
                                        id="type" value="{{ old('type', Auth::guard('admin')->user()->type) }}"
                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.admin_type')]) }}">
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="mobile">{{ __('translation.mobile') }}</label>
                                    <input type="tel" name="mobile"
                                        class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                                        value="{{ old('mobile', Auth::guard('admin')->user()->mobile) }}"
                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.mobile')]) }}">
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="avatar">{{ __('translation.image') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="customFile" type="file" type="file"
                                            name="avatar" accept=".jpg, .png, image/jpeg, image/png"> <label
                                            class="custom-file-label @error('avatar') is-invalid @enderror"
                                            for="customFile">{{ __('translation.choose_file') }}</label>
                                    </div>
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <input id="demo" type="file" name="avatar" accept=".jpg, .png, image/jpeg, image/png"> --}}
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
    </div>
    <!-- row -->
@endsection
@section('js')

@endsection
