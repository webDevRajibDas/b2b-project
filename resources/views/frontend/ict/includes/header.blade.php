<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0 bg-dark box-shadow-none">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{URL('/')}}">
                                <img alt="B2B Smart Card" width="82" height="40" src="{{asset('assets/images/b2b-logo.png')}}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle active" href="{{URL('/')}}">
                                                Home
                                            </a>
                                        </li>

                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                Products
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-item" href="#">Student Card</a>
                                                    <a class="dropdown-item" href="#">Digital Business Card</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle " href="#">
                                                About Us
                                            </a>
                                        </li>

                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle " href="#">
                                                Contact Us
                                            </a>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        <div class="header-nav-features header-nav-features-light header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                            <div class="header-nav-feature header-nav-features-search d-inline-flex">
                                <a href="#" class="header-nav-features-toggle" data-focus="headerSearch"><i class="fas fa-search header-nav-top-icon"></i></a>
                                <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed" id="headerTopSearchDropdown">
                                    <form role="search" action="#" method="get">
                                        <div class="simple-search input-group">
                                            <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
                                            <span class="input-group-append">
															<button class="btn" type="submit">
																<i class="fa fa-search header-nav-top-icon"></i>
															</button>
														</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="header-nav-feature header-nav-features-cart d-inline-flex ml-2">
                                <a href="#" class="header-nav-features-toggle">
                                    <img src="img/icons/icon-cart-light.svg" width="14" alt="" class="header-nav-top-icon-img">
                                    <span class="cart-info">
													<span class="cart-qty">1</span>
												</span>
                                </a>
                                <div class="header-nav-features-dropdown" id="headerTopCartDropdown">
                                    <ol class="mini-products-list">
                                        <li class="item">

                                        </li>
                                    </ol>
                                    <div class="totals">
                                        <span class="label">Total:</span>
                                        <span class="price-total"><span class="price"></span></span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-dark" href="#">View Cart</a>
                                        <a class="btn btn-primary" href="#">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>