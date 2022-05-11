@extends('layouts.master')
@section('title', __('translation.exchange_orders'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.exchange_orders') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('translation.exchange_orders') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="exchangeOrders">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">{{ __('translation.order_number') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.customer_email') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.product_size') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.required_size') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.product_code') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.exchange_date') }}</th>
                                    <th class="border-bottom-0 wd-15p">{{ __('translation.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exchangeOrders as $exchangeOrder)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $exchangeOrder->order_id) }}">
                                                {{ $exchangeOrder->order_id }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" target="_blank" class="tag tag-green">
                                                {{ $exchangeOrder->user->email }}
                                            </a>
                                        </td>
                                        <td>{{ $exchangeOrder->product_size }}</td>
                                        <td>{{ $exchangeOrder->required_size }}</td>
                                        <td>{{ $exchangeOrder->product_code }}</td>
                                        <td>{{ $exchangeOrder->created_at }}</td>
                                        <td>
                                            <div class="dropdown dropup">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="main__btn-actions  ripple" data-toggle="dropdown" type="button">
                                                    <i class="fas fa-bars"></i>
                                                </button>
                                                <div class="dropdown-menu tx-13">
                                                    <a href="javascript:void(0);" role="button" data-toggle="modal"
                                                        title="{{ __('buttons.display') }}"
                                                        data-target="#showExchangeOrder{{ $exchangeOrder->id }}"
                                                        class="dropdown-item">
                                                        <i class="fas fa-eye text-warning "></i>
                                                        {{ __('translation.view_details') }}
                                                    </a>
                                                </div>
                                            </div>

                                        </td>
                                        {{-- View Details Modal --}}
                                        <div class="modal fade" id="showExchangeOrder{{ $exchangeOrder->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="showExchangeOrder{{ $exchangeOrder->id }}Label"
                                            aria-hidden="true" data-effect="effect-super-scaled">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __('translation.view_details') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.exchange.orders.update', $exchangeOrder) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="reason">
                                                                    {{ __('translation.exchange_reason') }}</label>
                                                                <input type="text" class="form-control" id="reason"
                                                                    readonly disabled
                                                                    value="{{ __('translation.' . $exchangeOrder->reason) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="comment">{{ __('translation.return_comment') }}</label>
                                                                <textarea type="text" class="form-control" id="comment" readonly disabled>{{ $exchangeOrder->comment }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="status">{{ __('translation.status') }}</label>
                                                                <select name="status" id="" class="form-control">
                                                                    <option value="">{{ __('translation.choose..') }}
                                                                    </option>
                                                                    <option value="approved"
                                                                        {{ $exchangeOrder->status == 'approved' ? 'selected' : '' }}>
                                                                        {{ __('translation.approved') }}
                                                                    </option>
                                                                    <option value="rejected"
                                                                        {{ $exchangeOrder->status == 'rejected' ? 'selected' : '' }}>
                                                                        {{ __('translation.rejected') }}
                                                                    </option>
                                                                    <option value="pending"
                                                                        {{ $exchangeOrder->status == 'pending' ? 'selected' : '' }}>
                                                                        {{ __('translation.pending') }}
                                                                    </option>
                                                                </select>
                                                                @error('status')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary modal-effect"
                                                                    data-dismiss="modal">{{ __('buttons.close') }}</button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    {{ __('buttons.update') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
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
        $('#exchangeOrders').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
    </script>

@endsection
