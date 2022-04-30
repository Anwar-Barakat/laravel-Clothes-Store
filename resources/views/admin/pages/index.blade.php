@extends('layouts.master')
@section('title', __('translation.cms_pages'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.cms_pages') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('translation.cms_pages') }}</h4>
                        <button type="button" class="button-30 modal-effect" data-effect="effect-rotate-left" role="button"
                            data-toggle="modal" data-target="#addNewCmsPage">
                            {{ __('buttons.add') }}
                        </button>
                    </div>
                </div>
                @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="pages">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.id') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.title') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.url') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.created') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cms_pages as $cms_page)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cms_page->title }}</td>
                                        <td>{{ $cms_page->url }}</td>
                                        <td>{{ $cms_page->created_at }}</td>
                                        <td>
                                            <div class="dropdown dropup">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="main__btn-actions  ripple" data-toggle="dropdown" type="button">
                                                    <i class="fas fa-bars"></i>
                                                </button>
                                                <div class="dropdown-menu tx-13">
                                                    <form action="" method="post">
                                                        @csrf
                                                        @if ($cms_page->status == 1)
                                                            <a href="javascript:void(0);"
                                                                class="updateCMSPageStatus text-success dropdown-item"
                                                                title="{{ __('translation.update_status') }}"
                                                                id="cms_page-{{ $cms_page->id }}"
                                                                cms_page_id="{{ $cms_page->id }}"
                                                                status="{{ $cms_page->status }}">
                                                                <i class="fas fa-power-off"></i>
                                                                {{ __('translation.active') }}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);"
                                                                class="updateCMSPageStatus text-danger dropdown-item"
                                                                title="{{ __('translation.update_status') }}"
                                                                id="cms_page-{{ $cms_page->id }}"
                                                                cms_page_id="{{ $cms_page->id }}"
                                                                status="{{ $cms_page->status }}">
                                                                <i class="fas fa-power-off text-danger"></i>
                                                                {{ __('translation.disactive') }}
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0);" role="button" data-toggle="modal"
                                                            title="{{ __('buttons.update') }}"
                                                            data-target="#editCmsPage{{ $cms_page->id }}"
                                                            class="text-primary dropdown-item">
                                                            <i class="fas fa-edit"></i>
                                                            {{ __('buttons.edit') }}
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item confirmationDelete"
                                                            data-cms_page="{{ $cms_page->id }}"
                                                            title="{{ __('buttons.delete') }}">
                                                            <i class="fas fa-trash text-danger"></i>
                                                            {{ __('buttons.delete') }}
                                                        </a>
                                                    </form>
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
        $('#pages').DataTable({
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

    {{-- turn on/off the Cms Page status --}}
    <script>
        $(document).on("click", ".updateCMSPageStatus", function() {
            var status = $(this).attr('status');
            var cms_page_id = $(this).attr('cms_page_id');
            var active = '{{ __('translation.active') }} ';
            var disactiev = '{{ __('translation.disactive') }} ';
            var activeIc = `<i class="fas fa-power-off text-success"></i>`;
            var disactiveIcon = `<i class="fas fa-power-off text-danger"></i>`;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-cms_page-status',
                data: {
                    status: status,
                    cms_page_id: cms_page_id,
                },
                success: function(response) {
                    if (response['status'] == 0) {
                        $('#cms_page-' + response['cms_page_id'])
                            .attr('status', `${response['status']}`);
                        $('#cms_page-' + response['cms_page_id']).text(disactiev);
                        $('#cms_page-' + response['cms_page_id']).attr('style',
                            'color : #ee335e  !important');
                        $('#cms_page-' + response['cms_page_id']).prepend(
                            '<i class="fas fa-power-off text-danger"></i> ');
                    } else {
                        $('#cms_page-' + response['cms_page_id'])
                            .attr('status', `${response['status']}`);
                        $('#cms_page-' + response['cms_page_id']).text(active);
                        $('#cms_page-' + response['cms_page_id']).attr('style',
                            'color : #22c03c   !important');
                        $('#cms_page-' + response['cms_page_id']).prepend(
                            '<i class="fas fa-power-off text-success"></i> ');

                    }
                },
                error: function() {},
            });
        });
    </script>

    {{-- Confirmation Delete Cms Page --}}
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
                    window.location.href = '/admin/delete-cms_page/' + $(this).data('cms_page');
                }
            });
        });
    </script>
@endsection
