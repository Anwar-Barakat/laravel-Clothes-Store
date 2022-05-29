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
    <div class="row mb-5">
        <div class="col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">{{ __('translation.change_password') }}</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.update.password') }}"
                        name="updatePasswordForm" id="updatePasswordForm">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="admin_email">{{ __('translation.email_address') }}</label>
                                    <input class="form-control" readonly="readonly" id="email_address"
                                        value="{{ Auth::guard('admin')->user()->email }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="admin_type">{{ __('translation.admin_type') }}</label>
                                    <input class="form-control" readonly="readonly" id="admin_type"
                                        value="{{ Auth::guard('admin')->user()->type }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="current_password">{{ __('translation.current_password') }}</label>
                                    <input type="password" class="form-control" id="current_password"
                                        name="current_password" placeholder="{{ __('translation.current_password') }}">
                                    <span id="checkCurrentPasswordResult" class="mt-2 d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="new_password">{{ __('translation.new_password') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="new_password" name="password" required
                                        placeholder="{{ __('translation.password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label
                                        for="password_confirmation">{{ __('translation.password_confirmation') }}</label>
                                    <input type="password"
                                        class="form-control  @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation" required
                                        placeholder="{{ __('translation.password_confirmation') }}">
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
        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">

        </div>
    </div>
    <!-- row -->
@endsection
@section('js')
    <script>
        $(document).ready(() => {
            $('#current_password').keyup(() => {
                var current_password = $('#current_password').val();
                // alert(current_password);
                $.ajax({
                    type: 'post',
                    url: '/admin/check-current-password',
                    data: {
                        current_password: current_password
                    },
                    success: function(response) {
                        if (response == 'true') {
                            $('#checkCurrentPasswordResult').html(
                                '<font class="text-success">{{ __('translation.currnet_pwd_true') }}</font>'
                            );
                            $('#current_password').css('border-color', '#22c03c');
                        } else {
                            $('#checkCurrentPasswordResult').html(
                                '<font class="text-danger">{{ __('translation.currnet_pwd_false') }}</font>'
                            );
                            $('#current_password').css('border-color', '#ee335e');
                        }

                    },
                    error: function() {}
                });
            });
        });
    </script>
@endsection
