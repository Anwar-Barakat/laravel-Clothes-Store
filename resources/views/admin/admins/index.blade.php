@extends('layouts.master')
@section('title', __('translation.admins'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.admins') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('translation.admins') }}</h4>
                        <button type="button" class="button-30 modal-effect" data-effect="effect-rotate-left" role="button"
                            data-toggle="modal" data-target="#addNewSection">
                            {{ __('buttons.add') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="admins">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">{{ __('translation.id') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.name') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.email') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.mobile') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.type') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.created') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="tag tag-green">
                                                {{ $admin->email }}
                                            </a>
                                        </td>
                                        <td>{{ $admin->mobile }}</td>
                                        <td>{{ __('translation.' . $admin->type) }}</td>
                                        <td>{{ $admin->created_at }}</td>
                                        <td>
                                            @if ($admin->status == 1)
                                                <a href="javascript:void(0);" class="updateAdminStatus text-success p-2"
                                                    title="{{ __('translation.update_status') }}"
                                                    id="admin-{{ $admin->id }}" admin_id="{{ $admin->id }}"
                                                    status="{{ $admin->status }}">
                                                    <i class="fas fa-power-off"></i>
                                                </a>
                                            @else
                                                <a href="javascript:void(0);" class="updateAdminStatus text-danger p-2"
                                                    title="{{ __('translation.update_status') }}"
                                                    id="admin-{{ $admin->id }}" admin_id="{{ $admin->id }}"
                                                    status="{{ $admin->status }}">
                                                    <i class="fas fa-power-off text-danger"></i>
                                                </a>
                                            @endif
                                        </td>
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
        $('#admins').DataTable({
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

    {{-- turn on/off the admin status --}}
    <script>
        $(document).ready(() => {
            $('.updateAdminStatus').click(function() {
                var status = $(this).attr('status');
                var admin_id = $(this).attr('admin_id');
                var active = '{{ __('translation.active') }} ';
                var disactiev = '{{ __('translation.disactive') }} ';
                var activeIc = `<i class="fas fa-power-off text-success"></i>`;
                var disactiveIcon = `<i class="fas fa-power-off text-danger"></i>`;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/admin/update-admin-status',
                    data: {
                        status: status,
                        admin_id: admin_id,
                    },
                    success: function(response) {
                        if (response['status'] == 0) {
                            $('#admin-' + response['admin_id'])
                                .attr('status', `${response['status']}`);
                            $('#admin-' + response['admin_id']).html(
                                '<i class="fas fa-power-off text-danger"></i> ');
                        } else {
                            $('#admin-' + response['admin_id'])
                                .attr('status', `${response['status']}`);
                            $('#admin-' + response['admin_id']).html(
                                '<i class="fas fa-power-off text-success"></i> ');
                        }
                    },
                    error: function() {},
                });
            });
        });
    </script>
@endsection