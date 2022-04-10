<!doctype html>
<html lang="en">

<head>
    <title>{{ __('frontend.ecommerce') }}|{{ __('frontend.email_register') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- FontAwesome 5.15.3 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- (Optional) Use CSS or JS implementation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-transform: capitalize;

        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #333;
        }

        .email-signature {
            width: 700px;
            display: flex;
            align-items: center;
            background: #222;
            border-radius: 10px;
            box-shadow: 0 2px 5px #000;
            padding: 10px 40px;
            position: relative;
            overflow: hidden;
            column-gap: 5rem;
        }

        .email-signature img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 0 5px #333;
            position: relative;

        }

        .email-signature .image::before {
            content: '';
            position: absolute;
            top: -25px;
            right: 70%;
            height: 300px;
            width: 300px;
            background: #f0f0f0;
            border-radius: 50%;
            box-shadow: 20px 0 0 #2c3e50;
        }

        .content .name {
            font-size: 25px;
            color: #f0f0f0;
        }

        .content .contact {
            margin-top: 30px;
            list-style: none;
        }

        .contact li {
            margin: 10px 0;
            color: #ccc;
            font-weight: bold;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            column-gap: 1rem
        }

        .contact .icon {
            height: 30px;
            line-height: 30px;
            border-radius: 50%;
            text-align: center;
            background: #666;
            width: 29px;
            padding: 6px
        }

        @media(max-width:768px) {
            .email-signature {
                flex-flow: column;
                width: 90%
            }

            .email-signature .image::before {
                width: 120%;
                box-shadow: 0 15px 0 #2c3e50;
                top: -25%;
                left: 50%;
                transform: translateX(-50%);
            }

            .content .contact {
                margin-top: 3.5rem
            }
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="email-signature">
            <div class="image">
                <img src="{{ asset('front/assets/images/emails/email.png') }}" alt="">
            </div>
            <div class="content">
                <h1 class="name">
                    {{ __('frontend.dear') }}
                    {{ $details['name'] }}</h1>
                <ul class="contact">
                    <li><i class="fas fa-phone icon"></i>{{ $details['mobile'] }}</li>
                    <li><i class="fas fa-envelope icon"></i>{{ $details['email'] }}</li>
                    <li><i class="fas fa-map-marked icon"></i>our Addree</li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>