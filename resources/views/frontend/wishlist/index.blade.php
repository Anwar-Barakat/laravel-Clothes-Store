@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.wishlist') }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/table/css/style.css') }}">
@endsection

@section('content')
    <div class="shopping-cart page" style="min-height: calc(100vh - 225px);">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-4">
                        <h2 class="heading-section">
                            {{ __('frontend.wishlist_products') }}
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-striped">
                                <thead class="thead-primary ">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('frontend.product') }}</th>
                                        <th>{{ __('frontend.description') }}</th>
                                        <th>{{ __('frontend.price') }}</th>
                                        <th>{{ __('frontend.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userWishlist as $item)
                                        <tr id="wishlist-{{ $item->id }}">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                @if ($item->product->getFirstMediaUrl('image_products', 'small'))
                                                    <figure>
                                                        <img src="{{ $item->product->getFirstMediaUrl('image_products', 'small') }}"
                                                            width="80" alt="{{ $item->product->name }}">
                                                    </figure>
                                                @else
                                                    <figure>
                                                        <img src="{{ asset('assets/img/1.jpg') }}" width="80"
                                                            alt="{{ $item->product->name }}">
                                                    </figure>
                                                @endif
                                            </td>
                                            <td>
                                                <p>{{ $item->product->name }}</p>
                                                <p>{{ $item->product->code }}</p>
                                                <p>{{ $item->product->price }}</p>
                                            </td>
                                            <td>
                                                {{ $item->product->price }}$
                                            </td>
                                            <td class="wishlist-actions">
                                                <a href="{{ route('frontend.details', $item->product->id) }}">
                                                    <i class="fas fa-eye text-warning"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="wishlistItemDelete"
                                                    wishlist_id={{ $item->id }}>
                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">{{ __('frontend.no_wishlist') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $userWishlist->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@section('js')
    <script src="{{ asset('assets/table/js/popper.js') }}"></script>
    <script src="{{ asset('assets/table/js/main.js') }}"></script>

    {{-- Delete wishlist item --}}
    <script>
        $(document).on('click', '.wishlistItemDelete', function(param) {
            var wishlist_id = $(this).attr('wishlist_id');
            var items = '{{ __('frontend.items') }} ';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/delete-wishlist-item",
                data: {
                    wishlist_id: wishlist_id
                },
                success: function(response) {
                    if (response.status == true) {
                        $('.wishlistItemsCount').html(response.wishlistItemsCount + items);
                        $(`tr#wishlist-${wishlist_id}`).remove();
                        toastr.info("{{ __('msgs.admin_add') }}");
                    }
                },
                error: function() {
                    alert('fail')
                }
            });
        });
    </script>
@endsection
