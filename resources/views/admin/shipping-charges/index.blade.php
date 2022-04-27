@extends('layouts.master')
@section('title', __('translation.shipping_charges'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.shipping_charges') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('translation.sections') }}</h4>
                        <button type="button" class="button-30 modal-effect" data-effect="effect-rotate-left" role="button"
                            data-toggle="modal" data-target="#addNewSection">
                            {{ __('buttons.add') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap display" id="shipping_charges">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.id') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.country') }}</th>
                                    <th class="wd-15p border-bottom-0">0-500g</th>
                                    <th class="wd-15p border-bottom-0">501-1000g</th>
                                    <th class="wd-15p border-bottom-0">1001-2000g</th>
                                    <th class="wd-15p border-bottom-0">2001-5000g</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.above_5000g') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.updated_at') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shippingCharges as $shippingCharge)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $shippingCharge->country->name }}</td>
                                        <td>${{ $shippingCharge->zero_500g }}</td>
                                        <td>${{ $shippingCharge->_501_1000g }}</td>
                                        <td>${{ $shippingCharge->_1001_2000g }}</td>
                                        <td>${{ $shippingCharge->_2001_5000g }}</td>
                                        <td>${{ $shippingCharge->above_5000g }}</td>
                                        <td>{{ $shippingCharge->updated_at }}</td>
                                        <td>
                                            <div class="dropdown dropup">
                                                <button aria-expanded="false" aria-haspopup="true" style="font-size: 11px"
                                                    class="btn ripple btn-secondary" data-toggle="dropdown" type="button">
                                                    <i class="fas fa-bars ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    @if ($shippingCharge->status == 1)
                                                        <a href="javascript:void(0);"
                                                            title="{{ __('translation.update_status') }}"
                                                            class="updateShippingChargeStatus text-success dropdown-item"
                                                            id="shippingCharge-{{ $shippingCharge->id }}"
                                                            shippingCharge_id="{{ $shippingCharge->id }}"
                                                            status="{{ $shippingCharge->status }}">
                                                            <i class="fas fa-power-off"></i>
                                                            {{ __('translation.active') }}
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);"
                                                            title="{{ __('translation.update_status') }}"
                                                            class="updateShippingChargeStatus text-danger  dropdown-item"
                                                            id="shippingCharge-{{ $shippingCharge->id }}"
                                                            shippingCharge_id="{{ $shippingCharge->id }}"
                                                            status="{{ $shippingCharge->status }}">
                                                            <i class="fas fa-power-off "></i>
                                                            {{ __('translation.disactive') }}
                                                        </a>
                                                    @endif
                                                    <a href="javascript:void(0);" role="button" data-toggle="modal"
                                                        title="{{ __('buttons.update') }}"
                                                        data-target="#editShippingCharge{{ $shippingCharge->id }}"
                                                        class="dropdown-item">
                                                        <i class="fas fa-edit text-primary"></i>
                                                        {{ __('buttons.update') }}
                                                    </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- Edit Shipping Charges Modal --}}
                                        <div class="modal fade" id="editShippingCharge{{ $shippingCharge->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="editShippingCharge{{ $shippingCharge->id }}Label"
                                            aria-hidden="true" data-effect="effect-super-scaled">
                                            <div class="modal-dialog" role="document" style="max-width: 750px;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __('translation.update_shipping_charges') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('admin.shipping-charges.update', $shippingCharge) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="country_id">{{ __('translation.country') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $shippingCharge->country->name }}"
                                                                            readonly>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-12 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="zero_500g">{{ __('translation.shipping_charges') }}
                                                                            (0-500)
                                                                        </label>
                                                                        <input type="number"
                                                                            class="form-control  @error('zero_500g') is-invalid @enderror"
                                                                            id="zero_500g" name="zero_500g"
                                                                            value="{{ old('zero_500g', $shippingCharge->zero_500g) }}"
                                                                            placeholder="{{ __('translation.type_zero_500g') }} (0-500)">
                                                                        @error('zero_500g')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label for="_501_1000g">
                                                                            {{ __('translation.shipping_charges') }}
                                                                            (501-1000)
                                                                        </label>
                                                                        <input type="number"
                                                                            class="form-control  @error('_501_1000g') is-invalid @enderror"
                                                                            id="_501_1000g" name="_501_1000g"
                                                                            value="{{ old('_501_1000g', $shippingCharge->_501_1000g) }}"
                                                                            placeholder="{{ __('translation.type__501_1000g') }} (501-1000)">
                                                                        @error('_501_1000g')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="_1001_2000g">{{ __('translation.shipping_charges') }}
                                                                            (1001-2000)</label>
                                                                        <input type="number"
                                                                            class="form-control  @error('_1001_2000g') is-invalid @enderror"
                                                                            id="_1001_2000g" name="_1001_2000g"
                                                                            value="{{ old('_1001_2000g', $shippingCharge->_1001_2000g) }}"
                                                                            placeholder="{{ __('translation.type__1001_2000g') }} (1001-2000)">
                                                                        @error('_1001_2000g')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label for="_2001_5000g">
                                                                            {{ __('translation.shipping_charges') }}
                                                                            (1001-2000)
                                                                        </label>
                                                                        <input type="number"
                                                                            class="form-control  @error('_2001_5000g') is-invalid @enderror"
                                                                            id="_2001_5000g" name="_2001_5000g"
                                                                            value="{{ old('_2001_5000g', $shippingCharge->_2001_5000g) }}"
                                                                            placeholder="{{ __('translation.type__2001_5000g') }} (1001-2000)">
                                                                        @error('_2001_5000g')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="above_5000g">{{ __('translation.shipping_charges') }}
                                                                            {{ __('translation.above_5000g') }}</label>
                                                                        <input type="number"
                                                                            class="form-control  @error('above_5000g') is-invalid @enderror"
                                                                            id="above_5000g" name="above_5000g"
                                                                            value="{{ old('above_5000g', $shippingCharge->above_5000g) }}"
                                                                            placeholder="{{ __('translation.type_above_5000g') }} {{ __('translation.above_5000g') }}">
                                                                        @error('above_5000g')
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
        $('.display').DataTable({
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


    {{-- turn on/off the Shipping Charges status --}}
    <script>
        $(document).on("click", ".updateShippingChargeStatus", function() {
            var status = $(this).attr('status');
            var shippingCharge_id = $(this).attr('shippingCharge_id');
            var active = '{{ __('translation.active') }} ';
            var disactiev = '{{ __('translation.disactive') }} ';
            var activeIc = `<i class="fas fa-power-off text-success"></i>`;
            var disactiveIcon = `<i class="fas fa-power-off text-danger"></i>`;
            $.ajax({
                type: 'post',
                url: '/admin/update-shipping-charges-status',
                data: {
                    status: status,
                    shippingCharge_id: shippingCharge_id,
                },
                success: function(response) {
                    if (response['status'] == 0) {
                        $('#shippingCharge-' + response['shippingCharge_id'])
                            .attr('status', `${response['status']}`);
                        $('#shippingCharge-' + response['shippingCharge_id']).text(disactiev);
                        $('#shippingCharge-' + response['shippingCharge_id']).attr('style',
                            'color : #ee335e  !important');
                        $('#shippingCharge-' + response['shippingCharge_id']).prepend(
                            '<i class="fas fa-power-off text-danger"></i> ');
                    } else {
                        $('#shippingCharge-' + response['shippingCharge_id'])
                            .attr('status', `${response['status']}`);
                        $('#shippingCharge-' + response['shippingCharge_id']).text(active);
                        $('#shippingCharge-' + response['shippingCharge_id']).attr('style',
                            'color : #22c03c   !important');
                        $('#shippingCharge-' + response['shippingCharge_id']).prepend(
                            '<i class="fas fa-power-off text-success"></i> ');

                    }
                },
                error: function() {},
            });
        });
    </script>
@endsection
