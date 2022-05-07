@extends('layouts.master')
@section('title', __('translation.products_evaluations'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.products_evaluations') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('translation.products_evaluations') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="evaluations">
                            <thead>
                                <tr>
                                    <th class=" border-bottom-0">{{ __('translation.id') }}</th>
                                    <th class=" border-bottom-0">{{ __('translation.product') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.customer_email') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.ratings') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.created') }}</th>
                                    <th class=" border-bottom-0">{{ __('translation.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ratings as $rating)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rating->product->name }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="tag tag-green">
                                                {{ $rating->user->email }}
                                            </a>
                                        </td>
                                        <td>
                                            @if ($rating->rating == 1)
                                                <i class="fas fa-star text-warning"></i>
                                            @elseif ($rating->rating == 2)
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                            @elseif ($rating->rating == 3)
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                            @elseif ($rating->rating == 4)
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                            @elseif ($rating->rating == 5)
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                            @else
                                                <i class="fas fa-star-half-alt text-warning"></i>
                                            @endif
                                        </td>
                                        <td>{{ $rating->created_at }}</td>
                                        <td>
                                            <div class="dropdown dropup">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="main__btn-actions  ripple" data-toggle="dropdown" type="button">
                                                    <i class="fas fa-bars"></i>
                                                </button>
                                                <div class="dropdown-menu tx-13">
                                                    @if ($rating->status == 1)
                                                        <a href="javascript:void(0);"
                                                            class="updateRatingStatus text-success dropdown-item"
                                                            title="{{ __('translation.update_status') }}"
                                                            id="rating-{{ $rating->id }}"
                                                            rating_id="{{ $rating->id }}"
                                                            status="{{ $rating->status }}">
                                                            <i class="fas fa-power-off"></i>
                                                            {{ __('translation.active') }}
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);"
                                                            class="updateRatingStatus text-danger dropdown-item"
                                                            title="{{ __('translation.update_status') }}"
                                                            id="rating-{{ $rating->id }}"
                                                            rating_id="{{ $rating->id }}"
                                                            status="{{ $rating->status }}">
                                                            <i class="fas fa-power-off text-danger"></i>
                                                            {{ __('translation.disactive') }}
                                                        </a>
                                                    @endif

                                                    <a href="javascript:void(0);" role="button" data-toggle="modal"
                                                        title="{{ __('buttons.update') }}"
                                                        data-target="#displayRating{{ $rating->id }}"
                                                        class="text-default dropdown-item">
                                                        <i class="fas fa-eye text-warning"></i>
                                                        {{ __('buttons.display') }}
                                                    </a>
                                                    <a href="javascript:void(0);" class="dropdown-item confirmationDelete"
                                                        data-rating="{{ $rating->id }}"
                                                        title="{{ __('buttons.delete') }}">
                                                        <i class="fas fa-trash text-danger"></i>
                                                        {{ __('buttons.delete') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- display rating Modal --}}
                                        <div class="modal effect-rotate-left" id="displayRating{{ $rating->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="displayRating{{ $rating->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog displayRatingModal" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __('translation.display_rating') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="review">{{ __('translation.review') }}</label>
                                                                    <textarea type="text" class="form-control" id="review" disabled readonly>{{ $rating->review }}</textarea>
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
        $('#evaluations').DataTable({
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

    {{-- turn on/off the rating status --}}
    <script>
        $(document).on("click", ".updateRatingStatus", function() {
            var status = $(this).attr('status');
            var rating_id = $(this).attr('rating_id');
            var active = '{{ __('translation.active') }} ';
            var disactiev = '{{ __('translation.disactive') }} ';
            var activeIc = `<i class="fas fa-power-off text-success"></i>`;
            var disactiveIcon = `<i class="fas fa-power-off text-danger"></i>`;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-rating-status',
                data: {
                    status: status,
                    rating_id: rating_id,
                },
                success: function(response) {
                    if (response['status'] == 0) {
                        $('#rating-' + response['rating_id'])
                            .attr('status', `${response['status']}`);
                        $('#rating-' + response['rating_id']).text(disactiev);
                        $('#rating-' + response['rating_id']).attr('style',
                            'color : #ee335e  !important');
                        $('#rating-' + response['rating_id']).prepend(
                            '<i class="fas fa-power-off text-danger"></i> ');
                    } else {
                        $('#rating-' + response['rating_id'])
                            .attr('status', `${response['status']}`);
                        $('#rating-' + response['rating_id']).text(active);
                        $('#rating-' + response['rating_id']).attr('style',
                            'color : #22c03c   !important');
                        $('#rating-' + response['rating_id']).prepend(
                            '<i class="fas fa-power-off text-success"></i> ');

                    }
                },
                error: function() {},
            });
        });
    </script>


    {{-- Confirmation Delete Rating --}}
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
                    window.location.href = '/admin/delete-rating/' + $(this).data('rating');
                }
            });
        });
    </script>
@endsection
