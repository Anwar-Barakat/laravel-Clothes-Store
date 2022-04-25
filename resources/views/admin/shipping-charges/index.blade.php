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
                                    <th class="wd-15p border-bottom-0">{{ __('translation.shipping_charges') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.updated_at') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shippingCharges as $shippingCharge)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $shippingCharge->country->name }}</td>
                                        <td>${{ $shippingCharge->shipping_charges }}</td>
                                        <td>{{ $shippingCharge->updated_at }}</td>
                                        <td>
                                            <div class="dropdown dropup">
                                                <button aria-expanded="false" aria-haspopup="true" style="font-size: 11px"
                                                    class="btn ripple btn-secondary" data-toggle="dropdown"
                                                    type="button">{{ __('translation.actions') }} <i
                                                        class="fas fa-caret-down ml-1"></i></button>
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
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __('translation.update_section') }}</h5>
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
                                                            <div class="form-group">
                                                                <label
                                                                    for="country_id">{{ __('translation.country') }}</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $shippingCharge->country->name }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="shipping_charges">{{ __('translation.shipping_charges') }}</label>
                                                                <input type="text"
                                                                    class="form-control  @error('shipping_charges') is-invalid @enderror"
                                                                    id="shipping_charges" name="shipping_charges"
                                                                    value="{{ old('shipping_charges', $shippingCharge->shipping_charges) }}"
                                                                    placeholder="{{ __('translation.type_shipping_charges') }}">
                                                                @error('shipping_charges')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
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
