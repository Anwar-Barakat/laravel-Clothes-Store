@extends('layouts.master')
@section('title', __('translation.users'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.users') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('translation.users') }}</h4>
                        <button type="button" class="button-30 modal-effect" data-effect="effect-rotate-left" role="button"
                            data-toggle="modal" data-target="#addNewSection">
                            {{ __('buttons.add') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="users">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">{{ __('translation.id') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.name') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.email') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.address') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.city') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.state') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.country') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.mobile') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.created') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="tag tag-green">
                                                {{ $user->email }}
                                            </a>
                                        </td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->state }}</td>
                                        <td>{{ $user->country->name ?? '-' }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                <a href="javascript:void(0);" class="updateUserStatus text-success p-2"
                                                    title="{{ __('translation.update_status') }}"
                                                    id="user-{{ $user->id }}" user_id="{{ $user->id }}"
                                                    status="{{ $user->status }}">
                                                    <i class="fas fa-power-off"></i>
                                                </a>
                                            @else
                                                <a href="javascript:void(0);" class="updateUserStatus text-danger p-2"
                                                    title="{{ __('translation.update_status') }}"
                                                    id="user-{{ $user->id }}" user_id="{{ $user->id }}"
                                                    status="{{ $user->status }}">
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
        $('#users').DataTable({
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

    {{-- turn on/off the user status --}}
    <script>
        $(document).ready(() => {
            $('.updateUserStatus').click(function() {
                var status = $(this).attr('status');
                var user_id = $(this).attr('user_id');
                var active = '{{ __('translation.active') }} ';
                var disactiev = '{{ __('translation.disactive') }} ';
                var activeIc = `<i class="fas fa-power-off text-success"></i>`;
                var disactiveIcon = `<i class="fas fa-power-off text-danger"></i>`;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/admin/update-user-status',
                    data: {
                        status: status,
                        user_id: user_id,
                    },
                    success: function(response) {
                        if (response['status'] == 0) {
                            $('#user-' + response['user_id'])
                                .attr('status', `${response['status']}`);
                            $('#user-' + response['user_id']).html(
                                '<i class="fas fa-power-off text-danger"></i> ');
                        } else {
                            $('#user-' + response['user_id'])
                                .attr('status', `${response['status']}`);
                            $('#user-' + response['user_id']).html(
                                '<i class="fas fa-power-off text-success"></i> ');
                        }
                    },
                    error: function() {},
                });
            });
        });
    </script>
@endsection
