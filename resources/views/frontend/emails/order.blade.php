<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('assets/table/css/style.css') }}">
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">
                    <h2 class="heading-section">{{ __('frontend.order_details') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-4 text-center">Hello {{ $orderDetails->user->name }}</h3>
                    <p>Thank you for shopping with us, your order number : {{ $orderDetails->id }} .the detailsare
                        below: </p>
                    <div class="table-wrap">
                        <table class="table table-striped">
                            <thead>
                                <tr class="alert" role="alert">
                                    <td>Product name</td>
                                    <td>Product color</td>
                                    <td>Product code</td>
                                    <td>Product size</td>
                                    <td>Product quantity</td>
                                    <td>Product price</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails->orderProduct as $item)
                                    <tr class="alert" role="alert">
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->product_color }}</td>
                                        <td>{{ $item->product_code }}</td>
                                        <td>{{ $item->product_size }}</td>
                                        <td>{{ $item->product_quantity }}</td>
                                        <td>{{ $item->product_price }}$</td>
                                    </tr>
                                @endforeach
                                <tr class="alert" role="alert">
                                    <td>shipping Charges</td>
                                    <td> ${{ $orderDetails->shipping_cart }}</td>
                                </tr>
                                <tr class="alert" role="alert">
                                    <td>Coupon Discount</td>
                                    <td> {{ $orderDetails->coupon_amount ?? '00' }}$</td>
                                </tr>
                                <tr class="alert" role="alert">
                                    <td>Grand Amount</td>
                                    <td> {{ $orderDetails->grand_amount }}$</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">
                    <h2 class="heading-section">{{ __('frontend.delivery_address') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-striped">
                            <tbody>
                                <tr class="alert" role="alert">
                                    <td>{{ __('frontend.name') }}</td>
                                    <td>{{ $orderDetails->name }}</td>
                                </tr>
                                <tr class="alert" role="alert">
                                    <td>{{ __('frontend.address') }}</td>
                                    <td>{{ $orderDetails->address }}</td>
                                </tr>
                                <tr class="alert" role="alert">
                                    <td>{{ __('frontend.state') }}</td>
                                    <td>{{ $orderDetails->state }}</td>
                                </tr>
                                <tr class="alert" role="alert">
                                    <td>{{ __('frontend.country') }}</td>
                                    <td>{{ $orderDetails->country->name }}</td>
                                </tr>
                                <tr class="alert" role="alert">
                                    <td>{{ __('frontend.mobile') }}</td>
                                    <td>{{ $orderDetails->mobile ?? '-' }}</td>
                                </tr>
                                <tr class="alert" role="alert">
                                    <td>{{ __('frontend.pincode') }}</td>
                                    <td>{{ $orderDetails->pincode }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
