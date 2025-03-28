<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title', 'Restaurant')</title>
    <meta name="keywords" content="B2B Restaurant " />
    <meta name="description" content="B2B Restaurant">
    <meta name="author" content="https://b2bplatformbd.com/">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->

    @include('frontend.vendors.restaurant.includes.styles')

    <!-- Head Libs -->
    <script src="{{asset('restaurant/vendor/modernizr/modernizr.min.js')}}"></script>

</head>
<body data-spy="scroll" data-target="#navSecondary" data-offset="170">

<div class="body">
   @include('frontend.vendors.restaurant.includes.header')

    <div role="main" class="main">
        @yield('content')

    </div>
    @include('frontend.vendors.restaurant.includes.footer')
</div>

@include('frontend.vendors.restaurant.includes.scripts')



<!-- Theme Base, Components and Settings -->
<script src="{{asset('restaurant/js/theme.js')}}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{asset('restaurant/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('restaurant/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{asset('restaurant/js/views/view.contact.js')}}"></script>


<!-- Theme Custom -->
<script src="{{asset('restaurant/js/custom.js')}}"></script>

<!-- Theme Initialization Files -->
<script src="{{asset('restaurant/js/theme.init.js')}}"></script>

</body>
</html>
