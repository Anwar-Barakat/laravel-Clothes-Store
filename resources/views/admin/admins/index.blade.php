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
                        <a href="{{ route('admin.admins.create') }}" class="button-30 ">
                            {{ __('buttons.add') }}
                        </a>
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
                                            <div class="dropdown dropup">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="main__btn-actions  ripple" data-toggle="dropdown" type="button">
                                                    <i class="fas fa-bars"></i>
                                                </button>
                                                <div class="dropdown-menu tx-13">
                                                    @if ($admin->status == 1)
                                                        <a href="javascript:void(0);"
                                                            title="{{ __('translation.update_status') }}"
                                                            class="updateAdminStatus text-success dropdown-item"
                                                            id="admin-{{ $admin->id }}" admin_id="{{ $admin->id }}"
                                                            status="{{ $admin->status }}">
                                                            <i class="fas fa-power-off"></i>
                                                            {{ __('translation.active') }}
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);"
                                                            title="{{ __('translation.update_status') }}"
                                                            class="updateAdminStatus text-danger dropdown-item"
                                                            id="admin-{{ $admin->id }}" admin_id="{{ $admin->id }}"
                                                            status="{{ $admin->status }}">
                                                            <i class="fas fa-power-off "></i>
                                                            {{ __('translation.disactive') }}
                                                        </a>
                                                    @endif
                                                    <a href="javascript:void(0);"
                                                        title="{{ __('translation.add_roles_perm') }}"
                                                        class="dropdown-item">
                                                        <i class="fas fa-lock text-secondary"></i>
                                                        {{ __('translation.add_roles_perm') }}
                                                    </a>
                                                    <a href="{{ route('admin.admins.edit', $admin) }}"
                                                        title="{{ __('buttons.update') }}" class="dropdown-item">
                                                        <i class="fas fa-edit text-primary"></i>
                                                        {{ __('buttons.update') }}
                                                    </a>
                                                    <a href="javascript:void(0);" class="dropdown-item confirmationDelete"
                                                        data-admin="{{ $admin->id }}"
                                                        title="{{ __('buttons.delete') }}">
                                                        <i class="fas fa-trash text-danger"></i>
                                                        {{ __('buttons.delete') }}
                                                    </a>
                                                </div>
                                            </div>
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
        $(document).on("click", ".updateAdminStatus", function() {
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
                        $('#admin-' + response['admin_id']).text(disactiev);
                        $('#admin-' + response['admin_id']).attr('style',
                            'color : #ee335e  !important');
                        $('#admin-' + response['admin_id']).prepend(
                            '<i class="fas fa-power-off text-danger"></i> ');
                    } else {
                        $('#admin-' + response['admin_id'])
                            .attr('status', `${response['status']}`);
                        $('#admin-' + response['admin_id']).text(active);
                        $('#admin-' + response['admin_id']).attr('style',
                            'color : #22c03c   !important');
                        $('#admin-' + response['admin_id']).prepend(
                            '<i class="fas fa-power-off text-success"></i> ');

                    }
                },
                error: function() {},
            });
        });
    </script>


    {{-- Confirmation Delete Category --}}
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
                    window.location.href = '/admin/delete-admin/' + $(this).data('admin');
                }
            });
        });
    </script>
@endsection
