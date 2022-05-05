@extends('layouts.master')
@section('title', __('translation.currencies'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.currencies') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('translation.currencies') }}</h4>
                        <button type="button" class="button-30 modal-effect" data-effect="effect-rotate-left" role="button"
                            data-toggle="modal" data-target="#addNewCurrency">
                            {{ __('buttons.add') }}
                        </button>
                    </div>
                </div>
                @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="currencies">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.id') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.code') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.rate') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($currencies as $currency)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $currency->code }}</td>
                                        <td>${{ number_format($currency->rate, 4) }}</td>
                                        <td>
                                            <div class="dropdown dropup">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="main__btn-actions  ripple" data-toggle="dropdown" type="button">
                                                    <i class="fas fa-bars"></i>
                                                </button>
                                                <div class="dropdown-menu tx-13">
                                                    @if ($currency->status == 1)
                                                        <a href="javascript:void(0);"
                                                            class="updateCurrencyStatus text-success dropdown-item"
                                                            title="{{ __('translation.update_status') }}"
                                                            id="currency-{{ $currency->id }}"
                                                            currency_id="{{ $currency->id }}"
                                                            status="{{ $currency->status }}">
                                                            <i class="fas fa-power-off"></i>
                                                            {{ __('translation.active') }}
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);"
                                                            class="updateCurrencyStatus text-danger dropdown-item"
                                                            title="{{ __('translation.update_status') }}"
                                                            id="currency-{{ $currency->id }}"
                                                            currency_id="{{ $currency->id }}"
                                                            status="{{ $currency->status }}">
                                                            <i class="fas fa-power-off text-danger"></i>
                                                            {{ __('translation.disactive') }}
                                                        </a>
                                                    @endif

                                                    <a href="javascript:void(0);" role="button" data-toggle="modal"
                                                        title="{{ __('buttons.update') }}"
                                                        data-target="#editCurrency{{ $currency->id }}"
                                                        class="text-primary dropdown-item">
                                                        <i class="fas fa-edit"></i>
                                                        {{ __('buttons.update') }}
                                                    </a>
                                                    <a href="javascript:void(0);" class="dropdown-item confirmationDelete"
                                                        data-currency="{{ $currency->id }}"
                                                        title="{{ __('buttons.delete') }}">
                                                        <i class="fas fa-trash text-danger"></i>
                                                        {{ __('buttons.delete') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- edit Currency Modal --}}
                                        <div class="modal effect-rotate-left" id="editCurrency{{ $currency->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="editCurrencyLabel{{ $currency->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __('translation.edit_currency') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.currencies.update', $currency) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label
                                                                    for="code">{{ __('translation.currency_code') }}</label>
                                                                <input type="text"
                                                                    class="form-control  @error('code') is-invalid @enderror"
                                                                    id="code" name="code"
                                                                    placeholder="{{ __('translation.type_currency_code') }}"
                                                                    value="{{ old('code', $currency->code) }}">
                                                                @error('code')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="rate">{{ __('translation.rate') }}</label>
                                                                <input type="text"
                                                                    class="form-control  @error('rate') is-invalid @enderror"
                                                                    id="rate" name="rate"
                                                                    placeholder="{{ __('translation.rate_within_dollar') }}"
                                                                    value="{{ old('code', $currency->rate) }}">
                                                                @error('rate')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="status">{{ __('translation.status') }}</label>
                                                                <select
                                                                    class="form-control @error('status') is-invalid @enderror"
                                                                    id="status" name="status">
                                                                    <option value="">{{ __('translation.choose..') }}
                                                                    </option>
                                                                    <option value="1"
                                                                        {{ old('status', $currency->status) == '1' ? 'selected' : '' }}>
                                                                        {{ __('translation.active') }}</option>
                                                                    <option value="0"
                                                                        {{ old('status', $currency->status) == '0' ? 'selected' : '' }}>
                                                                        {{ __('translation.disactive') }}</option>
                                                                </select>
                                                                @error('status')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
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
    {{-- Add New Currency Modal --}}
    <div class="modal effect-rotate-left" id="addNewCurrency" tabindex="-1" role="dialog"
        aria-labelledby="addNewCurrencyLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translation.add_new_currency') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.currencies.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="code">{{ __('translation.currency_code') }}</label>
                            <input type="text" class="form-control  @error('code') is-invalid @enderror" id="code"
                                name="code" placeholder="{{ __('translation.type_currency_code') }}"
                                value="{{ old('code') }}">
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="rate">{{ __('translation.rate') }}</label>
                            <input type="text" class="form-control  @error('rate') is-invalid @enderror" id="rate"
                                name="rate" placeholder="{{ __('translation.rate_within_dollar') }}"
                                value="{{ old('rate') }}">
                            @error('rate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">{{ __('translation.status') }}</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
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
        $('#currencies').DataTable({
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

    {{-- turn on/off the currency status --}}
    <script>
        $(document).on("click", ".updateCurrencyStatus", function() {
            var status = $(this).attr('status');
            var currency_id = $(this).attr('currency_id');
            var active = '{{ __('translation.active') }} ';
            var disactiev = '{{ __('translation.disactive') }} ';
            var activeIc = `<i class="fas fa-power-off text-success"></i>`;
            var disactiveIcon = `<i class="fas fa-power-off text-danger"></i>`;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-currency-status',
                data: {
                    status: status,
                    currency_id: currency_id,
                },
                success: function(response) {
                    if (response['status'] == 0) {
                        $('#currency-' + response['currency_id'])
                            .attr('status', `${response['status']}`);
                        $('#currency-' + response['currency_id']).html(
                            '<i class="fas fa-power-off text-danger"></i> ');
                    } else {
                        $('#currency-' + response['currency_id'])
                            .attr('status', `${response['status']}`);
                        $('#currency-' + response['currency_id']).html(
                            '<i class="fas fa-power-off text-success"></i> ');
                    }
                },
                error: function() {},
            });
        });
    </script>

    {{-- Confirmation Delete Currency --}}
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
                    window.location.href = '/admin/delete-currency/' + $(this).data('currency');
                }
            });
        });
    </script>
@endsection
