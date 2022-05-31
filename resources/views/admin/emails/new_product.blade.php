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

{{-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ __('emails.new_product') }}</title>
    <style>
        body {
            margin: 0;
            background: #343434;
            font-family: helvetica;
        }

        table {
            border: 0;
            border: none;
            border-spacing: none;
            border-spacing: 0;
            padding: 0;
        }

        td {
            padding: 0;
        }

        .outer-table {
            width: 600;
        }

        .main-gutter {
            width: 20px;
            background: white;
        }

        .main-container {
            width: 560px;
        }

        .is-white-bg {
            background: #fff;
        }

        .is-gold {
            color: #C49859;
        }

        .is-gold-bg {
            background-color: #C49859;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            color: #444;
        }

        p {
            line-height: 2;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .tiny-text {
            font-size: 11px;
            line-height: 1.6;
        }

        img {
            display: block;
            border: 0;
            line-height: 0px;
            font-size: 0px;
            margin: 0;
            padding: 0;
        }

        a {
            color: black;
            text-decoration: none;
        }

        .footer {
            color: #999;
            font-weight: lighter;
            font-size: 13px;
        }

    </style>
</head>

<body>
    <center>
        <table width="600">
            <tr>
                <td width="600" bgcolor="white">
                    <!-- spacer -->
                    <table height="10" width="600" bgcolor="eeeeee">
                        <tr>
                            <td height="10" line-height="10px" width="600"></td>
                        </tr>
                    </table>

                    <table width="600" valign="top" bgcolor="eeeeee">
                        <tr>
                            <td width="30"></td>
                            <td width="140" mc:edit="logo"><img
                                    src="{{ $product->getFirstMediaUrl('image_products', 'small') }}"
                                    alt="{{ $product->name }}" width="140"></td>
                            <td width="250"></td>
                            <td width="150" align="right" class="view-in-browser">
                                <a
                                    href="{{ route('frontend.details', $product->id) }}">{{ __('frontend.quick_view') }}</a>
                            </td>
                            <td width="30"></td>
                        </tr>
                    </table>

                    <!-- is card -->
                    <table width="600">
                        <tr>
                            <td width="60">&nbsp;</td>
                            <td width="478">
                                <table width="478" style="border:1px solid #eeeeee;">
                                    <tr>
                                        <td width="478" mc:edit="section_one_img">
                                            <img src="{{ $product->getFirstMediaUrl('image_products', 'small') }}"
                                                alt="" mc:edit="section_one_img">
                                        </td>
                                    </tr>
                                    <tr height="15" width="478">
                                        <td height="15" width="478">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="478">
                                            <table width="478">
                                                <tr>
                                                    <td width="20">&nbsp;</td>
                                                    <td width="438" align="center" mc:edit="section_one">
                                                        <h1>{{ $product->name }}</h1>
                                                        <p>{{ $product->description }}</p>
                                                    </td>
                                                    <td width="20">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="20">&nbsp;</td>
                                                    <td width="438">
                                                        <table width="438" align="center">
                                                            <tr>
                                                                <td height="20">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="180" align="center"
                                                                    mc:edit="section_one_cta">
                                                                    <center>
                                                                        <a href="{{ route('frontend.details', $product->id) }}"
                                                                            style="background-color:#EB7035;border:1px solid #EB7035;border-radius:3px;color:#ffffff;display:inline-block;line-height:64px;text-align:center;text-decoration:none;width:180px;-webkit-text-size-adjust:none;mso-hide:all;">Call
                                                                            {{ __('frontend.quick_view') }}
                                                                        </a>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                    <td width="20">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr height="35" width="478">
                                        <td height="35" width="478">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                            <td width="60">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html --}}
