@extends('frontend.layouts.app')

@section('title')
    Home
@endsection
@section('content')

    <section class="intro-section mb-3">
        <div class="home-slider slide-animate owl-carousel owl-theme" data-owl-options="{
                        'nav': false,
                        'responsive': {
                            '1440': {
                                'nav': true
                            }
                        }
                    }">
            <div class="home-slide home-slide-1 banner">
                <img class="slide-bg" src="{{asset('assets/images/slider/slide-5.jpg')}}" alt="slider image">
                <div class="banner-layer banner-layer-middle banner-layer-left">
                    <div class="container-fluid">
                        <div class="appear-animate" data-animation-name="fadeInLeftShorter"
                             data-animation-delay="200">
                            <h2 class="font-weight-light ls-10 text-primary">Discover our Arrivals!</h2>
                            <a href="#" class="btn btn-link"><i>View
                                    our
                                    Dresses</i><i class="icon-right-open-big"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-slide home-slide-2 banner">
                <img class="slide-bg" src="{{asset('assets/images/slider/slide-5.jpg')}}" alt="slider image">

                <div class="banner-layer banner-layer-middle banner-layer-right w-100">
                    <div class="container-fluid">
                        <div class="col-6 offset-6 appear-animate" data-animation-name="fadeInRightShorter"
                             data-animation-delay="200">
                            <h2 class="font-weight-light ls-10 text-primary">Trendy Collections!</h2>
                            <a href="#" class="btn btn-link"><i>View
                                    our
                                    Specials</i><i class="icon-right-open-big"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="welcome-section">
        <div class="container">
            <h2 class="section-title text-center text-uppercase appear-animate mb-4"
                data-animation-name="fadeInUpShorter" data-animation-delay="200">B2B Platform || Best Online
                Market Place</h2>
            <div class="row mb-2">
                @foreach($allCat as $cat)
                    <div class="col-md-4 col-lg-3">
                        <a class="fancy" href="{{ route('categories.show', $cat->slug) }}">
                            <div class="card primary-card">
                                <img src="{{ isset($cat->image) ? asset('storage/' . $cat->image) : asset('assets/images/buisness.jpg') }}"
                                     class="card-img-top card-img-height"
                                     alt="banner">
                                <div class="card-body">
                                    <h5 class="card-title">{{$cat->title}}</h5>
                                    <p class="card-text">{{$cat->description}}</p>
                                </div>
                            </div>

                            <span class="top-key"></span>
                            <span class="text">View our {{$cat->title}}</span>
                            <span class="bottom-key-1"></span>
                            <span class="bottom-key-2"></span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-- Full Width Section -->
    <section class="full-width-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/your-youtube-video-id" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 text-center-vertical">
                    <div class="bgblue">
                        <div class="promo-card">
                            <h4 class="text-white font-weight-bold text-12">B2B PLATFORM (ONLINE MARKETPLACE)</h4>
                            <h2 class="text-white">পণ্য আপনার বিক্রয় আমাদের!</h2>
                            <h4 class="text-white">দেশে এই প্রথম উদ্যোক্তা বা সাপ্লায়ারদের পন্য কে একই সাথে মার্কেটিং এবং অর্থায়ন সুবিধা দিচ্ছে B2B PLATFORM</h4>
                            <a href="#" class="btn btn-primary">বিস্তারিত...</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Boost Your Retail Business Using || B2B Platform</h2>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card growup-card">
                        <img src="{{asset('assets/images/grow-up.png')}}" class="card-img-top img-thumbnail"
                             alt="Business Image">
                        <div class="card-body text-center">
                            <h5 class="card-title boost-card-title">Digitization</h5>
                            <p class="card-text">Expand your business reach with verified retailers and suppliers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card growup-card">
                        <img src="{{asset('assets/images/grow-up.png')}}" class="card-img-top img-thumbnail"
                             alt="Business Image">
                        <div class="card-body text-center">
                            <h5 class="card-title boost-card-title">Verified Suppliers</h5>
                            <p class="card-text">Connect with verified suppliers to ensure quality products.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card growup-card">
                        <img src="{{asset('assets/images/grow-up.png')}}" class="card-img-top img-thumbnail"
                             alt="Business Image">
                        <div class="card-body text-center">
                            <h5 class="card-title boost-card-title">Wholesale Business</h5>
                            <p class="card-text">Enjoy faster delivery with our dedicated logistics partners.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card growup-card">
                        <img src="{{asset('assets/images/grow-up.png')}}" class="card-img-top img-thumbnail"
                             alt="Business Image">
                        <div class="card-body text-center">
                            <h5 class="card-title boost-card-title">Fast Delivery</h5>
                            <p class="card-text">Enjoy faster delivery with our dedicated logistics partners.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
    $shops = [
        ['name' => 'Easy Life', 'items' => 16, 'categories' => 4, 'rating' => 5.0, 'status' => 'Online', 'logo' => asset('assets/images/shops/Online-Store-Toy-Shop.jpg')],
        ['name' => 'ShopMax', 'items' => 12, 'categories' => 3, 'rating' => 4.5, 'status' => 'Offline', 'logo' => asset('assets/images/shops/Orange-Online-Shop.jpg')],
        ['name' => 'StyleHub', 'items' => 20, 'categories' => 5, 'rating' => 4.8, 'status' => 'Online', 'logo' => asset('assets/images/shops/Red-Online-Store.png')],
        ['name' => 'Gadget World', 'items' => 30, 'categories' => 8, 'rating' => 4.9, 'status' => 'Online', 'logo' => asset('assets/images/shops/Online-Store-Toy-Shop.jpg')],
        ['name' => 'Home Essentials', 'items' => 10, 'categories' => 2, 'rating' => 4.3, 'status' => 'Busy', 'logo' => asset('assets/images/shops/Online-Store-Toy-Shop.jpg')],
        ['name' => 'DailyMart', 'items' => 25, 'categories' => 6, 'rating' => 4.7, 'status' => 'Online', 'logo' => asset('assets/images/shops/Online-Store-Toy-Shop.jpg')],
    ];

    ?>



    <div class="brands-section" style="background: #65829d !important;">
        <div class="container">
            <div class="row">
                <h2 class="section-title text-center text-uppercase appear-animate mb-4"
                    data-animation-name="fadeInUpShorter" data-animation-delay="200" style="color: #ffffff !important;">
                    Popular Category</h2>
            </div>

            <div class="brands-slider owl-carousel owl-theme images-center appear-animate"
                 data-animation-name="fadeIn" data-animation-delay="400" data-owl-options="{
                        'margin': 20,
                        'loop': false,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '768': {
                                'items': 2
                            },
                            '1200': {
                                'items': 6
                            }
                        }
                    }">

                @forelse($productCat as $pCategory)
                    <div class="category-card">
                        <img src="{{asset('assets/images/category_diagram.png') }}"
                             width="200" height="100" alt="{{ $pCategory->title }}">
                        <p class="text-title" style="color: #0074db">{{ $pCategory->title }}</p>
                    </div>
                @empty
                    <div class="text-center w-100">
                        <p class="text-muted">No Category Available !! Now</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

    <div class="products-container appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
        <div class="container-lg container">
            <h2 class="section-title text-center text-uppercase appear-animate mb-4"
                data-animation-name="fadeInUpShorter" data-animation-delay="200">Our Products (Smart Card)</h2>

        </div>

        <div class="container">
            <div class="row">
                @forelse($cards as $data)
                    <div class="col-md-4">
                        <a href="{{ route('card.show', $data->slug) }}">
                            <div class="product-card">
                                <div class="card-badge">Hot</div>
                                <div class="product-tumb">
                                    <img src="{{ asset('storage/' . $data->image) }}" alt="B2B Smart Card">
                                </div>
                                <div class="product-details">
                                    <span class="product-catagory">B2B Smart Card</span>
                                    <h5><a href="{{ route('card.show', $data->slug) }}">{{$data->title}}</a></h5>
                                    <div class="product-bottom-details">
                                        <div class="product-price">Price : <small>{{$data->price}}</small>{{$data->sale_price}}</div>
                                        <div class="product-links">
                                            <a href="{{ route('card.show', $data->slug) }}" class="btn card-buy-button">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="text-center w-100">
                        <p class="text-muted">No Data Available !!</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>


    <section id="top-rated-shops">
        <div class="container mt-4">
            <h2 class="section-title text-center text-uppercase appear-animate mb-4"
                data-animation-name="fadeInUpShorter" data-animation-delay="200">Top Shops</h2>
            <div class="row">
                <?php foreach ($shops as $shop): ?>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow"
                         style="border-radius: 15px; overflow: hidden; position: relative;">
                        <!-- Status Badge -->
                        <div class="badge badge-<?php echo strtolower($shop['status']) === 'online' ? 'success' : 'warning'; ?>"
                             style="position: absolute; top: 10px; right: 10px; font-size: 0.85rem; padding: 5px 10px; border-radius: 12px;">
                                <?php echo $shop['status']; ?>
                        </div>
                        <!-- Logo Section -->
                        <div class="text-center p-3" style="background-color: #f4f4f4;">
                            <img style="height: 150px; width: 100%" src="<?php echo $shop['logo']; ?>"
                                 alt="Shop Logo" class="">
                        </div>
                        <div class="card-body text-white"
                             style="background-color: #e91e63; border-radius: 0 0 15px 15px;">
                            <h5 class="card-title mb-2"><?php echo $shop['name']; ?></h5>
                            <p class="card-text mb-1">
                                <span><?php echo $shop['items']; ?> + Items</span> &nbsp; | &nbsp;
                                <span><?php echo $shop['categories']; ?> + Categories</span> &nbsp; | &nbsp;
                                <span><i class="fa fa-star text-warning"></i> <?php echo number_format($shop['rating'], 1); ?></span>
                            </p>
                            <a href="#" class="btn btn-outline-light btn-sm">Visit Store →</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="banner-container position-relative"> <!-- Added position-relative -->
       <div class="container-lg container-fluid">
           <div class="row no-gutters">
               <div class="col-12">
                   <img style="height: 450px; object-fit: cover; width: 100%;"
                        src="{{asset('assets/images/b2b-handshake.jpg')}}"
                        class="card-img-top img-thumbnail"
                        alt="Business Image">

                   <!-- Enhanced Overlay -->
                   <div class="overlay overlay-lighter d-flex align-items-center justify-content-center">
                       <div class="overlay-content-wrapper text-center p-4">
                           <!-- B2B Platform Logo -->
                           <div class="b2b-logo mb-3">
                               <div class="b2b-text display-3 font-weight-bold">
                                   <span class="b-letter" style="color: cyan;">B</span>
                                   <span class="number-2 text-white">2</span>
                                   <span class="b-letter" style="color: cyan;">B</span>
                               </div>
                               <div class="platform-text h4 text-uppercase text-white">PLATFORM</div>
                           </div>

                           <!-- Bengali text -->
                           <div class="bengali-text h5 mt-3 text-white">
                               আমাদের সাথে যোগাযোগ করুন
                           </div>

                           <!-- Optional CTA Button -->
                           <a href="#" class="btn btn-primary mt-4 px-4 py-2">
                               Contact Us
                           </a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </div>

@endsection