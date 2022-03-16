@extends('layouts.master')
@section('title', __('translation.admin_details'))
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('translation.dashboard') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.admin_details') }}</span>
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
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                @if (Auth::guard('admin')->user()->getFirstMediaUrl('avatars', 'thumb'))
                                    <img src="{{ Auth::guard('admin')->user()->getFirstMediaUrl('avatars', 'thumb') }}"
                                        class="img img-thumbnail mb-4 admin-image">
                                @else
                                    <img src="{{ asset('assets/img/1.jpg') }}" class="img img-thumbnail mb-4 admin-image">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ __('translation.admin_name') }}</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" value="{{ old('name', Auth::guard('admin')->user()->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="email">{{ __('translation.email_address') }}</label>
                                    <input class="form-control" readonly="readonly" id="email"
                                        value="{{ Auth::guard('admin')->user()->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="type">{{ __('translation.admin_type') }}</label>
                                    <input type="text" name="type" class="form-control @error('type') is-invalid @enderror"
                                        id="type" value="{{ old('type', Auth::guard('admin')->user()->type) }}">
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="mobile">{{ __('translation.admin_phone') }}</label>
                                    <input type="tel" name="mobile"
                                        class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                                        value="{{ old('mobile', Auth::guard('admin')->user()->mobile) }}">
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="avatar">{{ __('translation.admin_image') }}</label>
                            <input type="file" name="avatar" accept=".jpg, .png, image/jpeg, image/png"
                                class="form-control @error('avatar') is-invalid @enderror">
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- <input id="demo" type="file" name="avatar" accept=".jpg, .png, image/jpeg, image/png"> --}}
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">{{ __('buttons.update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">

        </div>
    </div>
    <!-- row -->
@endsection
@section('js')
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
@endsection
