<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'B2B Platform')</title>
    <meta name="keywords" content="B2B Platform BD"/>
    <meta name="description" content="B2B Market Place Bangladesh ,B2B Platform">
    <meta name="author" content="B2B Market Place">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icons/favicon.png') }}">

    <!-- Shortcut Icon -->
    <link href="{{ asset('favicon/favicon.ico') }}" rel="shortcut icon">
    <link rel="apple-touch-icon" sizes="180x180" href=" {{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href=" {{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href=" {{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href=" {{asset('favicon/site.webmanifest')}}">

    <!-- Google Fonts -->
    <script>
        WebFontConfig = {
            google: {families: ['Open+Sans:300,400,600,700,800', 'Poppins:200,300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Nanum+Brush+Script:400,700,800']}
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{ asset('assets/js/webfont.js') }}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo23.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    @stack('styles')
</head>

<body>
<div class="page-wrapper">
    @include('frontend.includes.header')

    <main class="main">
        @yield('content')
    </main>

    @include('frontend.includes.footer')
</div>

<!-- Loader -->
<div class="loading-overlay">
    <div class="bounce-loader">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<div class="mobile-menu-overlay"></div>



@include('frontend.includes.mobile-menu-container')
@include('frontend.includes.sticky-nabbar')
<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<!-- Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.min.js') }}"></script>
<script src="{{ asset('assets/js/optional/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

@stack('scripts')
</body>

</html>
