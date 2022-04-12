@extends('layouts.master')
@section('title', __('translation.coupons'))
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('translation.dashboard') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.coupons') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="row mb-5">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mg-b-0">{{ __('translation.coupons') }}</h4>
                        <button type="button" class="button-30 modal-effect" data-effect="effect-rotate-left" role="button"
                            data-toggle="modal" data-target="#addNewCoupon">
                            {{ __('buttons.add') }}
                        </button>
                    </div>
                </div>
                @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="coupons">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.id') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.code') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.type') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.amount') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.expiration_date') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->type }}</td>
                                        <td>{{ $coupon->amount }}</td>
                                        <td>{{ $coupon->expiration_date }}</td>
                                        <td>
                                            <div class="dropdown dropup">
                                                <button aria-expanded="false" aria-haspopup="true" style="font-size: 11px"
                                                    class="btn ripple btn-secondary" data-toggle="dropdown"
                                                    type="button">{{ __('translation.actions') }} <i
                                                        class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    <form {{-- action="{{ route('admin.coupons.destroy', $coupon) }}" --}} method="post">
                                                        @csrf
                                                        @if ($coupon->status == 1)
                                                            <a href="javascript:void(0);"
                                                                class="updateCouponStatus text-success dropdown-item"
                                                                title="{{ __('translation.update_status') }}"
                                                                id="coupon-{{ $coupon->id }}"
                                                                coupon_id="{{ $coupon->id }}"
                                                                status="{{ $coupon->status }}">
                                                                <i class="fas fa-power-off"></i>
                                                                {{ __('translation.active') }}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);"
                                                                class="updateCouponStatus text-danger dropdown-item"
                                                                title="{{ __('translation.update_status') }}"
                                                                id="coupon-{{ $coupon->id }}"
                                                                coupon_id="{{ $coupon->id }}"
                                                                status="{{ $coupon->status }}">
                                                                <i class="fas fa-power-off text-danger"></i>
                                                                {{ __('translation.disactive') }}
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0);" role="button" data-toggle="modal"
                                                            title="{{ __('buttons.update') }}"
                                                            data-target="#editCoupon{{ $coupon->id }}"
                                                            class="text-primary dropdown-item">
                                                            <i class="fas fa-edit"></i>
                                                            {{ __('buttons.edit') }}
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item confirmationDelete"
                                                            data-coupon="{{ $coupon->id }}"
                                                            title="{{ __('buttons.delete') }}">
                                                            <i class="fas fa-trash text-danger"></i>
                                                            {{ __('buttons.delete') }}
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- Edit Coupon Modal --}}
                                        <div class="modal effect-rotate-left" id="editCoupon{{ $coupon->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="editCoupon{{ $coupon->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog editCouponModal" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __('translation.update_coupon') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form {{-- action="{{ route('admin.coupons.update', $coupon) }}" --}} method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row mb-4">
                                                                <div class="col-12">

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label for="title_ar">
                                                                            {{ __('translation.title_ar') }}
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control  @error('title_ar') is-invalid @enderror"
                                                                            id="title_ar" name="title_ar"
                                                                            placeholder="{{ __('translation.enter_the_title_ar') }}">
                                                                        @error('title_ar')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="title_en">{{ __('translation.title_en') }}</label>
                                                                        <input type="text"
                                                                            class="form-control  @error('title_en') is-invalid @enderror"
                                                                            id="title_en" name="title_en"
                                                                            placeholder="{{ __('translation.enter_the_title_en') }}">
                                                                        @error('title_en')
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
                                                                        <label
                                                                            for="alternative">{{ __('translation.alternative') }}</label>
                                                                        <input type="text"
                                                                            class="form-control  @error('alternative') is-invalid @enderror"
                                                                            id="alternative" name="alternative"
                                                                            value="{{ old('alternative', $coupon->alternative) }}"
                                                                            placeholder="{{ __('translation.enter_the_alternative') }}">
                                                                        @error('alternative')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="link">{{ __('translation.link') }}</label>
                                                                        <input type="text"
                                                                            class="form-control  @error('link') is-invalid @enderror"
                                                                            id="link" name="link"
                                                                            value="{{ old('link', $coupon->link) }}"
                                                                            placeholder="{{ __('translation.enter_the_link') }}">
                                                                        @error('link')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="status">{{ __('translation.status') }}</label>
                                                                        <select
                                                                            class="form-control @error('status') is-invalid @enderror"
                                                                            id="status" name="status">
                                                                            <option value="">
                                                                                {{ __('translation.choose..') }}</option>
                                                                            <option value="1"
                                                                                {{ old('status', $coupon->status) == '1' ? 'selected' : '' }}>
                                                                                {{ __('translation.active') }}</option>
                                                                            <option value="0"
                                                                                {{ old('status', $coupon->status) == '0' ? 'selected' : '' }}>
                                                                                {{ __('translation.disactive') }}
                                                                            </option>
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
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="image">{{ __('translation.image') }}</label>
                                                                        <div class="custom-file">
                                                                            <input class="custom-file-input" id="customFile"
                                                                                type="file" type="file" name="image"
                                                                                accept=".jpg, .png, jpeg, image/jpeg, image/png , image/jpeg">
                                                                            <label
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
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary modal-effect"
                                                                    data-dismiss="modal">{{ __('buttons.close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">{{ __('buttons.update') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Add New Coupon Modal --}}
    <div class="modal effect-rotate-left" id="addNewCoupon" tabindex="-1" role="dialog" aria-labelledby="addNewCouponLabel"
        aria-hidden="true">
        <div class="modal-dialog addNewCouponModal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translation.add_new_coupon') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form {{-- action="{{ route('admin.coupons.store') }}" --}} method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="title_ar">{{ __('translation.title_ar') }}</label>
                                    <input type="text" class="form-control  @error('title_ar') is-invalid @enderror"
                                        id="title_ar" name="title_ar" value="{{ old('title_ar') }}"
                                        placeholder="{{ __('translation.enter_the_title_ar') }}">
                                    @error('title_ar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="title_en">{{ __('translation.title_en') }}</label>
                                    <input type="text" class="form-control  @error('title_en') is-invalid @enderror"
                                        id="title_en" name="title_en" value="{{ old('title_en') }}"
                                        placeholder="{{ __('translation.enter_the_title_en') }}">
                                    @error('title_en')
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
                                    <label for="alternative">{{ __('translation.alternative') }}</label>
                                    <input type="text" class="form-control  @error('alternative') is-invalid @enderror"
                                        id="alternative" name="alternative" value="{{ old('alternative') }}"
                                        placeholder="{{ __('translation.enter_the_alternative') }}">
                                    @error('alternative')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="link">{{ __('translation.link') }}</label>
                                    <input type="text" class="form-control  @error('link') is-invalid @enderror" id="link"
                                        name="link" value="{{ old('link') }}"
                                        placeholder="{{ __('translation.enter_the_link') }}">
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="status">{{ __('translation.status') }}</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status"
                                        name="status">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                            {{ __('translation.active') }}</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
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
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">{{ __('translation.image') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="customFile" type="file" type="file"
                                            name="image" accept=".jpg, .png, jpeg, image/jpeg, image/png , image/jpeg">
                                        <label class="custom-file-label @error('image') is-invalid @enderror"
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('buttons.close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('buttons.add') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script>
        $('#coupons').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
    </script>

    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script src="{{ URL::asset('assets/css/modal-popup.js') }}"></script>

    {{-- turn on/off the coupon status --}}
    <script>
        $(document).on("click", ".updateCouponStatus", function() {
            var status = $(this).attr('status');
            var coupon_id = $(this).attr('coupon_id');
            var active = '{{ __('translation.active') }} ';
            var disactiev = '{{ __('translation.disactive') }} ';
            var activeIc = `<i class="fas fa-power-off text-success"></i>`;
            var disactiveIcon = `<i class="fas fa-power-off text-danger"></i>`;
            $.ajax({
                type: 'post',
                url: '/admin/update-coupon-status',
                data: {
                    status: status,
                    coupon_id: coupon_id,
                },
                success: function(response) {
                    if (response['status'] == 0) {
                        $('#coupon-' + response['coupon_id'])
                            .attr('status', `${response['status']}`);
                        $('#coupon-' + response['coupon_id']).text(disactiev);
                        $('#coupon-' + response['coupon_id']).attr('style',
                            'color : #ee335e  !important');
                        $('#coupon-' + response['coupon_id']).prepend(
                            '<i class="fas fa-power-off text-danger"></i> ');
                    } else {
                        $('#coupon-' + response['coupon_id'])
                            .attr('status', `${response['status']}`);
                        $('#coupon-' + response['coupon_id']).text(active);
                        $('#coupon-' + response['coupon_id']).attr('style',
                            'color : #22c03c   !important');
                        $('#coupon-' + response['coupon_id']).prepend(
                            '<i class="fas fa-power-off text-success"></i> ');

                    }
                },
                error: function() {},
            });
        });
    </script>

    {{-- Confirmation Delete coupon --}}
    <script>
        $(document).on("click", ".confirmationDelete", function() {
            Swal.fire({
                title: '{{ __('msgs.are_your_sure') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '{{ __('buttons.close') }}',
                confirmButtonText: '{{ __('msgs.yes_delete') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/admin/delete-coupon/' + $(this).data('coupon');
                }
            });
        });
    </script>
@endsection
