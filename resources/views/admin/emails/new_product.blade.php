<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>new product</h1>
    <p>click <a href="{{ route('frontend.details', $product->id) }}">here</a> to see it.</p>
</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('emails.new_product') }}</title>

</head>

<body
    style="background: #c2c7cd;font-size: 1.6em;margin: 0;min-height: 100vh;display: flex;align-items: center;justify-content: center;">
    <div class="container" style="display: flex">

        <div class="product-card"
            style="background-color: #f5f6fa;border-radius: 10px;color: #4a4c4e;margin: 0 2em;transition: all linear .2s;max-width: 600px;display: flex;flex-direction: column;justify-content: space-between;">
            <div class="product-img img-one"
                style="background-size: cover;background-position: center;  border-radius: 10px 10px 0 0;height: 150px;max-width: 100%;">
                <img src="{{ $product->getFirstMediaUrl('image_products', 'small') }}" alt="">
            </div>
            <div class="product-text" style="padding: 1.6rem;text-align: center;">
                <h3 style="margin: 0;padding-bottom: .5em;font-size: 1.2em;">{{ $product->name }}</h3>
                <p style="margin: 0;padding-bottom: .5em;font-size: 1.1rem; font-weight: 300;">
                    {{ $product->description }}
                </p>
                <p style="margin: 0;padding-bottom: .5em;font-size: 1.1rem; font-weight: 300;">
                    {{ $product->price }}</p>
            </div>
            <div class="product-cart">
                <a href="{{ route('frontend.details', $product->id) }}"
                    style="border: 0;border-radius: 0 0 10px 10px;color: #009688;cursor: pointer;font-family: inherit;padding: 1em;text-transform: uppercase;transition: all linear .3s;width: 100%;">
                    {{ __('frontend.add_to_cart') }}
                </a>
            </div>
        </div>
    </div>
</body>

</html>
