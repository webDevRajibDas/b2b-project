<!doctype html>
<html class="modern fixed has-top-menu has-left-sidebar-half" data-style-switcher-options="{'changeLogo': false}" lang="en">


<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Dashboard | B2BPlatform Admin</title>
    <meta name="keywords" content="B2B Market Place"/>
    <meta name="description" content="B2B Market Place Admin">
    <meta name="author" content="https://b2bplatformbd.com">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icons/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/icons/favicon-16x16.png')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,600,700,800,900" rel="stylesheet"
          type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/vendor/animate/animate.compat.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/vendor/boxicons/css/boxicons.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/vendor/magnific-popup/magnific-popup.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/vendor/summernote/summernote-bs4.css')}}"/>
    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('admin/vendor/morris/morris.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/vendor/datatables/media/css/dataTables.bootstrap5.css')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/theme.css')}}"/>
    <!-- Theme Layout -->
    <link rel="stylesheet" href="{{asset('admin/css/layouts/modern.css')}}"/>
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    @stack('styles')
    <!-- Head Libs -->
    <script src="{{asset('admin/vendor/modernizr/modernizr.js')}}"></script>
    <script src="{{asset('admin/master/style-switcher/style.switcher.localstorage.js')}}"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<section class="body">
    <!-- start: header -->
    @include('admin.includes.header')
    <!-- end: header -->
    <div class="inner-wrapper">
        <!-- start: sidebar -->
        @include('admin.includes.sidebar-left')
        <!-- end: sidebar -->
        <section role="main" class="content-body content-body-modern">
            <header class="page-header page-header-left-inline-breadcrumb">
                <h2 class="font-weight-bold text-6">Dashboard</h2>
                <div class="right-wrapper">
                    <ol class="breadcrumbs">
                        <li><span>Home</span></li>
                        <li><span>eCommerce Dashboard</span></li>
                    </ol>
                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                </div>
            </header>
            <!-- start: page -->
                @yield('content')
            <!-- end: page -->
        </section>
    </div>
    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close d-md-none">
                    Collapse <i class="fas fa-chevron-right"></i>
                </a>
                <div class="sidebar-right-wrapper">
                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark"></div>
                        <ul>
                            <li>
                                <time datetime="2023-04-19T00:00+00:00">04/19/2023</time>
                                <span>Company Meeting</span>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-widget widget-friends">
                        <h6>Friends</h6>
                        <ul>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="{{asset('admin/img/!logged-user.jpg')}}" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="{{asset('admin/img/!sample-user.jpg')}}" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="{{asset('admin/img/!sample-user.jpg')}}" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="{{asset('admin/img/!sample-user.jpg')}}" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</section>
<!-- Vendor -->
<script src="{{asset('admin/vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>

<script src="{{asset('admin/vendor/jquery-cookie/jquery.cookie.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('admin/vendor/common/common.js')}}"></script>
<script src="{{asset('admin/vendor/nanoscroller/nanoscroller.js')}}"></script>
<script src="{{asset('admin/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('admin/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
<script src="{{asset('admin/vendor/summernote/summernote-bs4.js')}}"></script>


<!-- Specific Page Vendor -->
<script src="{{asset('admin/vendor/fuelux/js/spinner.js')}}"></script>
<script src="{{asset('admin/vendor/raphael/raphael.js')}}"></script>
<script src="{{asset('admin/vendor/morris/morris.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/media/js/dataTables.bootstrap5.min.js')}}"></script>
<!-- Theme Base, Components and Settings -->
<script src="{{asset('admin/js/theme.js')}}"></script>
<!-- Theme Custom -->
<script src="{{asset('admin/js/custom.js')}}"></script>
<!-- Theme Initialization Files -->
<script src="{{asset('admin/js/theme.init.js')}}"></script>
<!-- Analytics to Track Preview Website -->

<!-- Examples -->
<script src="{{asset('admin/js/examples/examples.header.menu.js')}}"></script>
<script src="{{asset('admin/js/examples/examples.ecommerce.dashboard.js')}}"></script>
<script src="{{asset('admin/js/examples/examples.ecommerce.datatables.list.js')}}"></script>

@stack('scripts')
</body>

</html>