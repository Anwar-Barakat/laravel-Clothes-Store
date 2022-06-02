<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('frontend.order_details') }}</title>
</head>

<body marginheight="0" topmargin="0" marginwidth="0"
    style="padding: 2vmax; margin: 0px; background-color: #f2f3f8; max-width: 960px; direction: ltr" leftmargin="0">
    <h1 style="margin-top: 48px;">{{ __('emails.hello') }} {{ $orderDetails->user->name }}</h1>
    <p>{{ __('emails.ths_to_shop') }}, {{ __('translation.order_number') }} #{{ $orderDetails->id }}</p>
    <p>{{ __('msgs.updated', ['name' => __('frontend.order_status')]) }} {{ __('emails.to') }}
        {{ __('translation.' . $status) }}
    </p>
    <p>
        @if (!empty($courier_name) && !empty($tracking_number))
            <p>
                {{ __('translation.courier_name') }} : {{ $courier_name }},
                {{ __('translation.tracking_number') }} : {{ $tracking_number }}
            </p>
        @endif
    </p>
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <!-- Logo -->
                    <tr>
                        <td style="text-align:center;">
                            <a href="{{ route('frontend.home') }}" title="logo" target="_blank">
                                <img width="60" src="https://i.ibb.co/hL4XZp2/android-chrome-192x192.png" title="logo"
                                    alt="logo">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <!-- Email Content -->
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <!-- Title -->
                                <tr>
                                    <td style="padding:0 15px; text-align:center;">
                                        <h1
                                            style="color:#1e1e2d; font-weight:400; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">
                                            {{ __('frontend.delivery_address') }}</h1>
                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece;
                            width:100px;"></span>
                                    </td>
                                </tr>
                                <!-- Details Table -->
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0"
                                            style="width: 100%; border: 1px solid #ededed">
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        {{ __('frontend.name') }}</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        {{ $orderDetails->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        {{ __('frontend.address') }}</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        {{ $orderDetails->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        {{ __('frontend.state') }}</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        {{ $orderDetails->state }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed;border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        {{ __('frontend.country') }}</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        {{ $orderDetails->country->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px;  border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)">
                                                        {{ __('frontend.mobile') }}</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        {{ $orderDetails->mobile ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)">
                                                        {{ __('frontend.pincode') }}</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056; ">
                                                        {{ $orderDetails->pincode }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


    <h2 style="margin: 1rem ; margin-top: 2rem">{{ __('frontend.order_details') }} :</h2>
    <div class="table-wrapper" bgcolor="#f2f3f8"
        style="max-height: 320px;border: 1px solid #C9D1DC;overflow: auto; background:#fff">
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
</body>

</html>
