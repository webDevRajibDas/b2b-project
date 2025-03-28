<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'B2B Shopping') }}</title>
    <meta name="keywords" content="B2B Platform , Online shopping, bd online shopping,"/>
    <meta name="description" content="b2b platform , shopping">
    <meta name="author" content="b2b platform">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('fashion/assets/images/icons/favicon.png')}}">

    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
            }
        };
        (function (d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '{{ asset("fashion/assets/js/webfont.js") }}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('fashion/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('fashion/assets/vendor/fontawesome-free/css/all.min.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('fashion/assets/css/demo7.min.css')}}">
    <link rel="stylesheet" href="{{asset('fashion/assets/css/style.min.css')}}">

    @stack('styles')
</head>

<body>
<div class="page-wrapper">

    @include('frontend.shopping.includes.header')
    <!-- End .header -->

    <main class="main">
        @yield('content')
    </main>

    @include('frontend.shopping.includes.footer')
    <!-- End .footer -->
</div>
<!-- End .page-wrapper -->

<div class="loading-overlay">
    <div class="bounce-loader">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<div class="mobile-menu-overlay"></div>
<!-- End .mobil-menu-overlay -->

@include('frontend.shopping.includes.mobile-menu-container')
<!-- End .mobile-menu-container -->


<div class="sticky-navbar">
    <div class="sticky-info">
        <a href="#">
            <i class="icon-home"></i>Home
        </a>
    </div>
    <div class="sticky-info">
        <a href="#" class="">
            <i class="icon-bars"></i>Categories
        </a>
    </div>
    <div class="sticky-info">
        <a href="#" class="">
            <i class="icon-wishlist-2"></i>Wishlist
        </a>
    </div>
    <div class="sticky-info">
        <a href="#" class="">
            <i class="icon-user-2"></i>Account
        </a>
    </div>
    <div class="sticky-info">
        <a href="#" class="">
            <i class="icon-shopping-cart position-relative">
                <span class="cart-count badge-circle">3</span>
            </i>Cart
        </a>
    </div>
</div>

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<!-- Plugins JS File -->
<script src="{{asset('fashion/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('fashion/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('fashion/assets/js/plugins.min.js')}}"></script>
<script src="{{asset('fashion/assets/js/jquery.appear.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.js"></script>

<!-- Main JS File -->
<script src="{{asset('fashion/assets/js/main.min.js')}}"></script>

<script>


    $(document).ready(function () {
        updateCartCount();
        function updateCartCount() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                type: "GET",
                success: function (response) {
                    $(".cart-count").text(response.cart_count);
                }
            });
        }
    });
</script>


@stack('custom-script')
</body>


</html>