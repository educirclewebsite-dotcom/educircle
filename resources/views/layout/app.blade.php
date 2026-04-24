<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="rajesh-doot">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#e8f1ff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="{{ asset('theme/images/favicon.png') }}" rel="icon">

    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/plugin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/all.min.css') }}" rel="stylesheet">
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/"> --}}
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700&amp;display=swap"
        rel="stylesheet"> --}}

    <link href="{{ asset('theme/css/style.css?ver=1.2') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/responsive.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />




    <style>
        @media (max-width: 768px) {
            #otpModal .modal-content {
                width: 90% !important;
                margin: 50px auto !important;
                padding: 20px !important;
            }

            #otpContainer {
                gap: 10px !important;
                margin-top: 20px !important;
            }

            .otp-input {
                width: 35px !important;
                height: 45px !important;
                font-size: 1rem !important;
            }

            #verifyOtpButton {
                padding: 15px !important;
                font-size: 1rem !important;
                margin-top: 20px !important;
            }
        }

        @media (max-width: 480px) {
            #otpModal .modal-content {
                width: 95% !important;
                margin: 20px auto !important;
                padding: 15px !important;
            }

            #otpContainer {
                gap: 5px !important;
            }

            .otp-input {
                width: 30px !important;
                height: 40px !important;
            }

            #passwordSection input {
                padding: 10px !important;
                margin-bottom: 10px !important;
            }
        }

        @media (max-width: 360px) {
            #otpModal .modal-content {
                width: 100% !important;
                margin: 0 !important;
                border-radius: 0 !important;
                min-height: 100vh !important;
            }

            .otp-input {
                width: 25px !important;
                height: 35px !important;
            }
        }

        .dskt-logo .nav-brand img {
            max-height: 55px;
        }

        .ree-nav .nav-list li a.menu-links {
            font-size: 14px;
        }
    </style>
    @stack('header_script')
</head>

<body>
    @yield('content')
    @include('layout.header')
    @include('layout.footer')
    <script src="{{ asset('theme/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.bundle.js') }}"></script>
    <script src="{{ asset('theme/js/main.js') }}"></script>
   <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('footer_script')
</body>

</html>
