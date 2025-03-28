<!DOCTYPE html>
<html lang="en" class="modern fixed has-top-menu has-left-sidebar-half"
      data-style-switcher-options="{'changeLogo': false}">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard | Marketplace')</title>
    <meta name="keywords" content="B2B Market Place ">
    <meta name="description" content="B2B Admin">
    <meta name="author" content="b2b marketplace">

    <!-- Shortcut Icon -->
    <link href="{{ asset('admin/images/favicon-32x32.png') }}" rel="shortcut icon">
    <link type="image/ico" href="{{ asset('admin/images/favicon-32x32.png') }}" rel="icon" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,600,700,800,900" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/animate.compat.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style-switcher.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/modern.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">

    @stack('styles')

    <!-- Head Libs -->
    <script async="" src="{{asset('admin/js/analytics.js')}}"></script>
    <script src="{{asset('admin/js/modernizr.js')}}"></script>
    <script src="{{asset('admin/js/style.switcher.localstorage.js')}}"></script>
</head>
<body>
<section class="body">
    {{-- header --}}
    @include('admin.includes.header')

    <div class="inner-wrapper">
        @include('admin.includes.sidebar-left')

        <section role="main" class="content-body content-body-modern">
            <header class="page-header page-header-left-inline-breadcrumb">
                <h2 class="font-weight-bold text-6">Dashboard</h2>
                <div class="right-wrapper">
                    <ol class="breadcrumbs">
                        <li><span>Home</span></li>
                        <li><span>B2B Dashboard</span></li>
                    </ol>

{{--                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>--}}
                </div>
            </header>

            <main>
                @yield('content')
            </main>

        </section>
    </div>


</section>

<!-- Vendor Scripts -->
<script src="{{ asset('admin/js/jquery.js') }}"></script>
<script src="{{ asset('admin/js/jquery.browser.mobile.js') }}"></script>

<script src="{{ asset('admin/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('admin/js/style.switcher.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('admin/js/common.js') }}"></script>
<script src="{{ asset('admin/js/nanoscroller.js') }}"></script>
<script src="{{ asset('admin/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('admin/js/jquery.placeholder.js') }}"></script>
<script src="{{ asset('admin/js/raphael.js') }}"></script>
<script src="{{ asset('admin/js/morris.js') }}"></script>
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/theme.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>
<script src="{{ asset('admin/js/theme.init.js') }}"></script>
<script src="{{ asset('admin/js/examples.header.menu.js') }}"></script>
<script src="{{ asset('admin/js/examples.ecommerce.dashboard.js') }}"></script>
<script src="{{ asset('admin/js/examples.ecommerce.datatables.list.js') }}"></script>

@stack('scripts')
</body>
</html>
