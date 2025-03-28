<header class="header">
    <div class="header-top text-uppercase">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown mr-3 pr-1">
                </div>
                <!-- End .header-dropown -->
                <div class="header-dropdown mr-auto">
                </div>
                <!-- End .header-dropown -->
            </div>
            <!-- End .header-left -->

            <div class="header-right header-dropdowns ml-0 ml-sm-auto">
                <div class="header-dropdown dropdown-expanded mr-3">
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="{{route('view.cart')}}">Cart</a></li>
                            <li>
                                @auth
                                    <!-- Display if the user is logged in -->
                                    <a href="{{ route('logout') }}" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <!-- Display if the user is not logged in -->
                                    <a href="{{ route('login') }}" class="login-link">Log In</a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropown -->

                <span class="separator d-none d-lg-inline-block"></span>

                <div class="social-icons">
                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                    <a href="#" class="social-icon social-instagram icon-instagram mr-1" target="_blank"></a>
                </div>
                <!-- End .social-icons -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler" type="button">
                    <i class="fas fa-bars"></i>
                </button>

                <a href="#" class="logo w-100">
                    <img src="{{asset('fashion/assets/images/b2b-logo.png')}}" alt="B2B Logo">
                </a>

                <nav class="main-nav w-100">
                    <ul class="menu">
                        <li class="active">
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>
                            <a href="#">Categories</a>
                            <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="submenu">
                                            <li><a href="#">Fashion</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End .megamenu -->
                        </li>
                        <li>
                            <a href="#">Products</a>
                            <div class="megamenu megamenu-fixed-width">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a href="#" class="nolink">PRODUCT PAGES</a>
                                        <ul class="submenu">
                                            <li><a href="#">SIMPLE PRODUCT</a></li>
                                            <li><a href="#">VARIABLE PRODUCT</a></li>
                                            <li><a href="#">SALE PRODUCT</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .megamenu -->
                        </li>

                    </ul>
                </nav>

                <div class="header-search header-search-popup header-search-category d-none d-lg-block ml-xl-5">
                    <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control bg-white" name="q" id="q"
                                   placeholder="I'm searching for..." required="">
                            <div class="select-custom bg-white">
                                <select id="cat" name="cat">
                                    <option value="">All Categories</option>
                                    <option value="4">Fashion</option>
                                    <option value="12">- Women</option>
                                    <option value="13">- Men</option>
                                    <option value="66">- Jewellery</option>
                                    <option value="67">- Kids Fashion</option>
                                    <option value="5">Electronics</option>
                                    <option value="21">- Smart TVs</option>
                                    <option value="22">- Cameras</option>
                                    <option value="7">Home &amp; Garden</option>
                                    <option value="11">Motors</option>
                                    <option value="33">- Parts &amp; Accessories</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->
                            <button class="btn bg-white icon-search-3" type="submit"></button>
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>
            </div>
            <!-- End .header-left -->

            <div class="header-right">

                <a href="#" class="header-icon header-icon-user d-lg-none d-block" title="login"><i
                            class="icon-user-2"></i></a>

                <a href="#" class="header-icon d-lg-none d-block" title="wishlist"><i
                            class="icon-wishlist-2"></i></a>

                <span class="separator d-lg-inline-block d-none"></span>

                <div class="dropdown cart-dropdown">
                    <a href="javascript:;" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count badge-circle">{{ getCartCount() }}</span>
                    </a>

                    <div class="cart-overlay"></div>

                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar">
                            <div class="dropdown-cart-header">Shopping Cart</div>
                            <!-- End .dropdown-cart-header -->

                            <div class="dropdown-cart-products">

                                @if (empty($cartItems))
                                    <div class="alert alert-info">
                                        Your cart is empty.
                                    </div>
                                @else
                                    @foreach ($cartItems as $item)
                                        @if ($item)
                                            <div class="product">
                                                <div class="product-details">
                                                    <h4 class="product-title">
                                                        <a href="#">{{ $item->product->name ?? 'Not Available' }}</a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                        <span class="cart-product-qty">{{ $item->quantity ?? 0 }}</span>
                                                        × {{ number_format($item->product->price ?? 0, 2) }}
                                                    </span>
                                                </div>
                                                <figure class="product-image-container">
                                                    <a href="#" class="product-image">
                                                        <img src="{{ asset('storage/'.($item->product->image ?? 'default-image.png')) }}" alt="product" width="80" height="80">
                                                    </a>
                                                    <a href="javascript:;" class="btn-remove remove-cart" data-id="{{ $item->product->id ?? '' }}" title="Remove Product"><span>×</span></a>
                                                </figure>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                @php
                                    $subtotal = 0;
                                     foreach ($cartItems as $item) {
                                        $subtotal += $item->quantity * optional($item->product)->price;
                                     }

                                @endphp
                                <span>SUBTOTAL:</span>
                                <span class="cart-total-price float-right">TK : {{ number_format($subtotal, 2) }}</span>
                            </div>
                            <!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="{{route('view.cart')}}" class="btn btn-gray btn-block view-cart">View Cart</a>
                                <a href="#" class="btn btn-dark btn-block">Checkout</a>
                            </div>
                            <!-- End .dropdown-cart-total -->
                        </div>
                        <!-- End .dropdownmenu-wrapper -->
                    </div>
                    <!-- End .dropdown-menu -->
                </div>
                <!-- End .dropdown -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-middle -->
</header>