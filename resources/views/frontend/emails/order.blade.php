<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('frontend.order_details') }}</title>
</head>

<body style="  max-width: 960px;margin: 0 auto;padding: 2vmax;">
    <h1 style="margin-top: 48px;">{{ __('emails.hello') }} {{ $orderDetails->user->name }}</h1>
    <p>{{ __('emails.ths_to_shop') }}, {{ __('translation.order_number') }} #{{ $orderDetails->id }}</p>
    <h2 style="margin: 1rem;">{{ __('frontend.order_details') }} :</h2>
    <div class="table-wrapper" style="max-height: 320px;border: 1px solid #C9D1DC;overflow: auto;">
        <table class="sticky-header sticky-column" style="border-spacing: 0;      width: 100%;">
            <thead style="  font-size: 12px;line-height: 16px;letter-spacing: 0.05em;text-transform: uppercase;">
                <tr style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                    <th style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">#</th>
                    <th style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.product_name') }}</th>
                    <th style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.product_color') }}</th>
                    <th style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.product_size') }}</th>
                    <th style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.product_quantity') }}</th>
                    <th style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.price') }}</th>
                </tr>
            </thead>
            <tbody style=" font-size: 14px;">
                @foreach ($orderDetails->orderProduct as $item)
                    <tr style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                            {{ $item->product_name }}</td>
                        <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                            {{ $item->product_color }}</td>
                        <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                            {{ $item->product_code }}</td>
                        <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                            {{ $item->product_size }}</td>
                        <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                            {{ $item->product_quantity }}</td>
                        <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                            {{ $item->product_price }}$</td>
                    </tr>
                @endforeach
                <tr style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                    <th colspan="4"></th>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.shipping_charges') }}</td>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        ${{ $orderDetails->shipping_cart }}</td>
                </tr>
                <tr style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                    <th colspan="4"></th>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.coupon_discount') }}</td>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        ${{ $orderDetails->coupon_amount ?? '00' }}</td>
                </tr>
                <tr style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                    <th colspan="4"></th>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.grand_total') }}</td>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        ${{ $orderDetails->grand_amount }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h2 style="margin: 1rem;">{{ __('frontend.order_details') }} :</h2>
    <div class="table-wrapper" style="max-height: 320px;border: 1px solid #C9D1DC;overflow: auto;">
        <table class="sticky-header sticky-column" style="border-spacing: 0;     width: 100%;">
            <tbody style=" font-size: 14px;">
                <tr style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.name') }}</td>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ $orderDetails->name }}</td>
                </tr>
                <tr style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.address') }}</td>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ $orderDetails->address }}</td>
                </tr>
                <tr style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.state') }}</td>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ $orderDetails->state }}</td>
                </tr>
                <tr style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.country') }}</td>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ $orderDetails->country->name }}</td>
                </tr>
                <tr style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.mobile') }}</td>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ $orderDetails->mobile ?? '-' }}</td>
                </tr>
                <tr style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ __('frontend.pincode') }}</td>
                    <td style="padding: 18px 24px;white-space: nowrap;border-bottom: 1px solid #C9D1DC">
                        {{ $orderDetails->pincode }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
