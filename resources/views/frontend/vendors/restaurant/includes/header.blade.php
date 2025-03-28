<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0">
        <div class="header-top border-bottom-0 bg-color-secondary">
            <div class="container">
                <div class="header-row py-2">
                    <div class="header-column justify-content-center justify-content-md-start">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <span class="text-light opacity-7 pl-0">The Best Place To Eat in Downtown!</span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-column justify-content-end d-none d-md-flex">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a href="tel:123-456-7890"><i class="fab fa-whatsapp text-4 text-color-primary" style="top: 0;"></i> 123-456-7890</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{url('/')}}">
                                <img alt="Porto" width="116" height="50" data-sticky-width="82" data-sticky-height="36" src="{{asset('restaurant/images/logo-restaurant.png')}}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li>
                                            <a class="nav-link active" href="#">Home</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">Menu</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">About</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>