<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }

        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        .main-header {
            text-transform: uppercase
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
            text-align: center
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
            text-align: center;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;
        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }

    </style>
</head>

<body @if (App::getLocale() == 'ar') dir="rtl"@else dir="ltr" @endif>
    <header class="clearfix">
        <div id="logo">
            <h1 class="main-header">{{ __('translation.order_invoice') }}</h1>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">{{ __('translation.invoice_to') }}:</div>
                <h2 class="name">{{ $orderDetails->name }}</h2>
                <div class="address">
                    {{ $orderDetails->address }}, {{ $orderDetails->city }},
                    {{ $orderDetails->state }}, {{ $orderDetails->country->name }}
                </div>
                <div class="email">
                    <a href="mailto:{{ $orderDetails->email }}">{{ $orderDetails->email }}</a>
                </div>
            </div>
            <div id="invoice">
                <h1>{{ __('translation.invoice_number') }} {{ $orderDetails->id }}</h1>
                <div class="date">{{ __('translation.order_date') }}:
                    {{ Carbon\Carbon::parse($orderDetails->created_at)->format('Y-m-d H:i:s A') }}
                </div>
                <div class="date">{{ __('translation.order_amount') }} :
                    ${{ $orderDetails->grand_amount }}
                </div>
                <div class="date">{{ __('translation.order_status') }} :
                    {{ __('translation.' . $orderDetails->status) }}
                </div>
                <div class="date">{{ __('translation.payment_method') }} :
                    {{ $orderDetails->payment_method }}</div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">{{ __('translation.product_code') }}</th>
                    <th class="unit">{{ __('translation.product_size') }}</th>
                    <th class="desc">{{ __('translation.product_color') }}</th>
                    <th class="unit">{{ __('translation.price') }}</th>
                    <th class="qty">{{ __('translation.quantity') }}</th>
                    <th class="total">{{ __('translation.total') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $subTotal = 0;
                @endphp
                @foreach ($orderDetails->orderProduct as $product)
                    <tr>
                        <td class="no">{{ $product->product_code }}</td>
                        <td class="unit">{{ $product->product_size }}</td>
                        <td class="desc">{{ $product->product_color }}</td>
                        <td class="unit">${{ $product->product_price }}</td>
                        <td class="qty">{{ $product->product_quantity }}</td>
                        <td class="total">${{ $product->product_price * $product->product_quantity }}</td>
                    </tr>
                    @php
                        $subTotal += $product->product_price * $product->product_quantity;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">{{ __('frontend.subtotal') }}</td>
                    <td>${{ $subTotal }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">{{ __('frontend.coupon_discount') }}</td>
                    <td>${{ $orderDetails->coupon_amount ?? 0 }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">{{ __('translation.grand_total') }}</td>
                    <td>${{ $orderDetails->grand_amount }}</td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">{{ __('translation.thank_you') }}!</div>
        <div id="notices">
            <div>{{ __('translation.notice') }}:</div>
            <div class="notice">....</div>
        </div>
    </main>
</body>

</html>
