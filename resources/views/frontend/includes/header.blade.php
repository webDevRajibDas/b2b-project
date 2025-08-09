<header class="header header-14">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul class="menus">
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">BDT</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">BDT</a></li>
                                            <li><a href="#">Usd</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div><!-- End .header-dropdown -->
                            </li>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">Engligh</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">Bn</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div><!-- End .header-dropdown -->
                            </li>
                            <li class="login">
                                <a href="{{ auth()->check() ? route('profile') : route('login') }}" class="header-icon d-lg-block d-none">
                                    <div class="header-user">
                                        <div class="header-userinfo">
                                            @auth
                                                <span class="d-inline-block font2 line-height-1">Hello, {{ Auth::user()->name }}!</span>
                                                <span class="mb-0">My Account</span>
                                            @else
                                                <span class="mb-0">Login</span>
                                            @endauth
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container-fluid">
            <div class="row">
                <div class="col-auto col-lg-3 col-xl-3 col-xxl-2">
                    <button class="mobile-menu-toggler">
                        <span class="sr-only">Toggle mobile menu</span>
                        <i class="icon-bars"></i>
                    </button>
                    <a href="{{URL('/')}}" class="logo">
                        <img src="{{asset('assets/images/b2b_logo.jpg')}}" alt="B2B Logo" width="100" height="25">
                    </a>
                </div><!-- End .col-xl-3 col-xxl-2 -->

                <div class="col col-lg-9 col-xl-9 col-xxl-10 header-middle-right">
                    <div class="row">
                        <div class="col-lg-8 col-xxl-4-5col d-none d-lg-block">
                            <div class="header-search header-search-extended header-search-visible header-search-no-radius">
                                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                                <form action="#" method="get">
                                    <div class="header-search-wrapper search-wrapper-wide">

                                        <div class="select-custom">
                                           @include('frontend.partials.main-menu')
                                        </div><!-- End .select-custom -->
                                        <label for="q" class="sr-only">Search</label>
                                        <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>

                                        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                    </div><!-- End .header-search-wrapper -->
                                </form>
                            </div><!-- End .header-search -->
                        </div><!-- End .col-xxl-4-5col -->

                        <div class="col-lg-4 col-xxl-5col d-flex justify-content-end align-items-center">
                            <div class="header-dropdown-link">
                                <a href="wishlist.html" class="wishlist-link">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count">3</span>
                                    <span class="wishlist-txt">Wishlist</span>
                                </a>

                                <div class="dropdown cart-dropdown">
                                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="cart-count">2</span>
                                        <span class="cart-txt">Cart</span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-cart-products">
                                            <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a href="product.html">Beige knitted elastic runner shoes</a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                                <span class="cart-product-qty">1</span>
                                                                x $84.00
                                                            </span>
                                                </div><!-- End .product-cart-details -->

                                                <figure class="product-image-container">
                                                    <a href="product.html" class="product-image">
                                                        <img src="assets/images/products/cart/product-1.jpg" alt="product">
                                                    </a>
                                                </figure>
                                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                            </div><!-- End .product -->

                                            <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a href="product.html">Blue utility pinafore denim dress</a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                                <span class="cart-product-qty">1</span>
                                                                x $76.00
                                                            </span>
                                                </div><!-- End .product-cart-details -->

                                                <figure class="product-image-container">
                                                    <a href="product.html" class="product-image">
                                                        <img src="assets/images/products/cart/product-2.jpg" alt="product">
                                                    </a>
                                                </figure>
                                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                            </div><!-- End .product -->
                                        </div><!-- End .cart-product -->

                                        <div class="dropdown-cart-total">
                                            <span>Total</span>

                                            <span class="cart-total-price">$160.00</span>
                                        </div><!-- End .dropdown-cart-total -->

                                        <div class="dropdown-cart-action">
                                            <a href="{{route('view.cart')}}" class="btn btn-primary">View Cart</a>
                                            <a href="{{route('cart.checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                        </div><!-- End .dropdown-cart-total -->
                                    </div><!-- End .dropdown-menu -->
                                </div><!-- End .cart-dropdown -->
                            </div>
                        </div><!-- End .col-xxl-5col -->
                    </div><!-- End .row -->
                </div><!-- End .col-xl-9 col-xxl-10 -->
            </div><!-- End .row -->
        </div><!-- End .container-fluid -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-auto col-lg-3 col-xl-3 col-xxl-2 header-left">
                    <div class="dropdown category-dropdown show is-on" data-visible="false">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                            Browse Categories
                        </a>
                        <div class="dropdown-menu show">
                            <nav class="side-nav">
                                <ul class="menu-vertical sf-arrows">
                                    @include('frontend.partials.mega-menu')
                                   
                                </ul><!-- End .menu-vertical -->
                            </nav><!-- End .side-nav -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .category-dropdown -->
                </div><!-- End .col-xl-3 col-xxl-2 -->

                <div class="col col-lg-6 col-xl-6 col-xxl-8 header-center">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="megamenu-container active">
                                <a href="{{URL('/')}}" class="">Home</a>
                            </li>
                            <li>
                                <a href="#" class="sf-with-ul">Shop</a>
                                <div class="megamenu megamenu-md">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <div class="menu-col">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <ul>
                                                            <li><a href="{{route('view.cart')}}">Cart</a></li>
                                                            <li><a href="{{route('cart.checkout')}}">Checkout</a></li>
                                                            <li><a href="#">Wishlist</a></li>
                                                            <li><a href="dashboard.html">My Account</a></li>
                                                        </ul>
                                                    </div><!-- End .col-md-6 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-8 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-md -->
                            </li>
                            <li>
                                <a href="#" class="sf-with-ul">Product</a>

                                <div class="megamenu megamenu-sm">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <div class="menu-col">
                                                <ul>
                                                    <li><a href="{{route('product.shopList')}}">Product Shop List</a></li>
                                                </ul>
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="banner banner-overlay">
                                                <a href="category.html">
                                                    <img src="assets/images/menu/banner-2.jpg" alt="Banner">

                                                    <div class="banner-content banner-content-bottom">
                                                        <div class="banner-title text-white">New Trends<br><span><strong>spring 2025</strong></span></div><!-- End .banner-title -->
                                                    </div><!-- End .banner-content -->
                                                </a>
                                            </div><!-- End .banner -->
                                        </div><!-- End .col-md-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-sm -->
                            </li>
                            <li>
                                <a href="#" class="sf-with-ul">Pages</a>
                                <ul>
                                    <li><a href="{{route('about.us')}}">About</a></li>
                                    <li><a href="{{route('contact.us')}}">Contact</a></li>
                                    <li><a href="{{route('login')}}">Login</a></li>
                                    <li><a href="faq.html">FAQs</a></li>
                                    <li><a href="404.html">Error 404</a></li>
                                </ul>
                            </li>

                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .col-xl-9 col-xxl-10 -->

                <div class="col col-lg-3 col-xl-3 col-xxl-2 header-right">
                    <i class="la la-lightbulb-o"></i><p>Clearance Up to 30% Off</p>
                </div>
            </div><!-- End .row -->
        </div><!-- End .container-fluid -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->