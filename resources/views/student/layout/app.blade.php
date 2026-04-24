<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Educircle" name="description" />
    <meta content="Educircle" name="author" />
    <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('theme2/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('theme2/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('theme2/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" type="text/css" href="{{ asset('theme2/assets/libs/toastr/build/toastr.min.css') }}">



    @stack('header_script')
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('student.layout.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('student.layout.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('content')
            <!-- End Page-content -->


            @include('student.layout.footer')
            <!-- end main content-->

        </div>


        <!-- JAVASCRIPT -->
        <script src="{{ asset('theme2/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('theme2/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('theme2/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('theme2/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('theme2/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('theme2/assets/libs/dropzone/min/dropzone.min.js') }}"></script>
        {{-- <script src="{{ asset('theme2/assets/js/pages/dashboard.init.js') }}"></script> --}}
        <script src="{{ asset('theme2/assets/js/app.js') }}"></script>
           <script src="{{asset('theme2/assets/libs/toastr/build/toastr.min.js') }}"></script>



  @include('student.layout.message')

        @stack('footer_script')

</body>


</html>
