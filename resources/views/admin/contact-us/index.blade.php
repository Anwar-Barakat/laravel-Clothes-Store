@extends('layouts.master')
@section('title', __('translation.contact_us'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.contact_us') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('translation.contact_us_messages') }}</h4>
                    </div>
                </div>
                @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="messages">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">{{ __('translation.id') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.name') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.email') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.mobile') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactUs as $message)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->phone }}</td>
                                        <td>
                                            <div class="dropdown dropup">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="main__btn-actions  ripple" data-toggle="dropdown" type="button">
                                                    <i class="fas fa-bars"></i>
                                                </button>
                                                <div class="dropdown-menu tx-13">
                                                    <form method="post">
                                                        @csrf
                                                        @if ($message->status == 1)
                                                            <a href="javascript:void(0);"
                                                                class="updateMessageStatus text-success dropdown-item"
                                                                title="{{ __('translation.update_status') }}"
                                                                id="message-{{ $message->id }}"
                                                                message_id="{{ $message->id }}"
                                                                status="{{ $message->status }}">
                                                                <i class="fas fa-power-off"></i>
                                                                {{ __('translation.active') }}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);"
                                                                class="updateMessageStatus text-danger dropdown-item"
                                                                title="{{ __('translation.update_status') }}"
                                                                id="message-{{ $message->id }}"
                                                                message_id="{{ $message->id }}"
                                                                status="{{ $message->status }}">
                                                                <i class="fas fa-power-off text-danger"></i>
                                                                {{ __('translation.disactive') }}
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0);"
                                                            title="{{ __('translation.view_details') }}"
                                                            class="dropdown-item" role="button" data-toggle="modal"
                                                            data-target="#displayMesssage{{ $message->id }}">
                                                            <i class="fas fa-eye text-warning"></i>
                                                            {{ __('translation.display_details') }}
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item confirmationDelete"
                                                            data-message="{{ $message->id }}"
                                                            title="{{ __('buttons.delete') }}">
                                                            <i class="fas fa-trash text-danger"></i>
                                                            {{ __('buttons.delete') }}
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- display message Modal --}}
                                        <div class="modal fade" id="displayMesssage{{ $message->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="displayMesssage{{ $message->id }}Label"
                                            aria-hidden="true" data-effect="effect-super-scaled">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __('translation.message_details') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12 col-xl-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="name">{{ __('translation.name') }}</label>
                                                                    <input type="text" class="form-control" id="name"
                                                                        value="{{ $message->name }}" disabled readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-xl-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="email">{{ __('translation.email') }}</label>
                                                                    <input type="text" class="form-control" id="email"
                                                                        value="{{ $message->email }}" disabled readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-xl-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="phone">{{ __('translation.mobile') }}</label>
                                                                    <input type="text" class="form-control" id="phone"
                                                                        value="{{ $message->phone }}" disabled readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-xl-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="status">{{ __('translation.status') }}</label>
                                                                    <select class="form-control " id="status" disabled
                                                                        readonly>
                                                                        <option value="1"
                                                                            {{ $message->status == '1' ? 'selected' : '' }}>
                                                                            {{ __('translation.active') }}</option>
                                                                        <option value="0"
                                                                            {{ $message->status == '1' ? 'selected' : '' }}>
                                                                            {{ __('translation.disactive') }}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="comment">{{ __('translation.comment') }}</label>
                                                                    <textarea type="text" class="form-control" id="comment" disabled readonly>{{ $message->comment }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary modal-effect"
                                                                data-dismiss="modal">{{ __('buttons.close') }}</button>
                                                        </div>
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
        $('#messages').DataTable({
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

    {{-- turn on/off the message status --}}
    <script>
        $(document).on("click", ".updateMessageStatus", function() {
            var status = $(this).attr('status');
            var message_id = $(this).attr('message_id');
            var active = '{{ __('translation.active') }} ';
            var disactiev = '{{ __('translation.disactive') }} ';
            var activeIc = `<i class="fas fa-power-off text-success"></i>`;
            var disactiveIcon = `<i class="fas fa-power-off text-danger"></i>`;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-message-status',
                data: {
                    status: status,
                    message_id: message_id,
                },
                success: function(response) {
                    if (response['status'] == 0) {
                        $('#message-' + response['message_id'])
                            .attr('status', `${response['status']}`);
                        $('#message-' + response['message_id']).text(disactiev);
                        $('#message-' + response['message_id']).attr('style',
                            'color : #ee335e  !important');
                        $('#message-' + response['message_id']).prepend(
                            '<i class="fas fa-power-off text-danger"></i> ');
                    } else {
                        $('#message-' + response['message_id'])
                            .attr('status', `${response['status']}`);
                        $('#message-' + response['message_id']).text(active);
                        $('#message-' + response['message_id']).attr('style',
                            'color : #22c03c   !important');
                        $('#message-' + response['message_id']).prepend(
                            '<i class="fas fa-power-off text-success"></i> ');

                    }
                },
                error: function() {},
            });
        });
    </script>

    {{-- Confirmation Delete message --}}
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
                    window.location.href = '/admin/delete-messages/' + $(this).data('message');
                }
            });
        });
    </script>
@endsection
