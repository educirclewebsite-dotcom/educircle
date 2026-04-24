<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'educircle.io - Study Abroad')</title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="rajesh-doot">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#e8f1ff">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('theme/images/favicon.png') }}" rel="icon">

    <!-- Google Fonts: Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 4.6.2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- FontAwesome 6.4.2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('home_new/css/style.css') }}?v={{ time() }}">
    <style>
        /* Backend Specific Tweaks */
        .blog-card img {
            height: 200px;
            object-fit: cover;
        }

        /* Updated Active Menu Item Styling - Pill Effect */
        .navbar .nav-link {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 10px 15px !important; /* Match original padding */
            z-index: 1;
        }

        .navbar .nav-link::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background-color: var(--accent-color);
            border-radius: 50px;
            z-index: -1;
            transform: translate(-50%, -50%) scale(0.8);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .navbar .nav-link:hover::before,
        .navbar .nav-link.active::before {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0.1; /* Subtle background pill */
        }

        .navbar .nav-link.active {
            color: var(--accent-color) !important;
            font-weight: 700 !important;
        }

        /* FontAwesome Fix for Mobile Icons */
        .fa, .fas, .fa-solid, .fab {
            font-family: "Font Awesome 6 Free", "Font Awesome 6 Brands" !important;
            font-weight: 900;
        }

        .navbar .nav-link.active i {
            color: var(--accent-color) !important;
        }

        /* Hover state for non-active items */
        .navbar .nav-link:hover:not(.active) {
            color: var(--accent-color) !important;
        }
    </style>
    @stack('header_script')
</head>

<body class="@yield('body_class')">
    @include('new_layout.header')

    @yield('content')

    @include('new_layout.footer')

    <!-- Full jQuery (required for Owl Carousel & Ajax) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <!-- Custom Script -->
    <script src="{{ asset('home_new/js/script.js') }}"></script>
    @stack('footer_script')
</body>

</html>