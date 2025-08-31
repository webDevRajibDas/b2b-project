@extends('frontend.layouts.app')

@section('title')
    Home
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-xxl-8 offset-lg-3 offset-xxl-2">
                <div class="mb-2 intro-slider-container slider-container-ratio">
                    <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                                    "nav": false,
                                    "dots": true
                                }'>
                        @forelse($sliders as $slider)
                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)"
                                                srcset="{{ asset('storage/'.$slider->image) }}">
                                        <img src="{{ asset('storage/'.$slider->image) }}" alt="{{ $slider->name }}">
                                    </picture>
                                </figure><!-- End .slide-image -->

                                <div class="intro-content">
                                    <h3 class="intro-subtitle">New Arrivals</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="text-white intro-title">
                                        {{$slider->title}}
                                    </h1><!-- End .intro-title -->
                                </div><!-- End .intro-content -->
                            </div>
                        @empty
                            <p>No Data Found!!</p>
                        @endforelse
                    </div><!-- End .intro-slider owl-carousel owl-simple -->

                    <span class="slider-loader"></span><!-- End .slider-loader -->
                </div><!-- End .intro-slider-container -->
            </div><!-- End .col-xl-9 col-xxl-10 -->
            <div class="col-xl-3 col-xxl-2 d-none d-xxl-block">
                <div class="banner banner-overlay banner-content-stretch ">
                    <a href="#">
                        <img src="assets/images/demos/demo-14/banners/banner-1.png" alt="Banner img desc">
                    </a>
                    <div class="text-right banner-content">
                        <div class="text-center price">
                            <sup class="text-white">from</sup>
                            <span class="text-white">
                                        <strong>  ৳&nbsp;</strong><sup class="text-white">,99</sup>
                                    </span>
                        </div>
                        <a href="#" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner banner-overlay -->
            </div><!-- End .col-xl-3 col-xxl-2 -->
        </div><!-- End .row -->
    </div><!-- End .container-fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-xxl-10">
                <div class="mb-3"></div><!-- End .mb-3 -->
                <div class="owl-carousel owl-simple brands-carousel" data-toggle="owl"
                     data-owl-options='{
                                "nav": false,
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "420": {
                                        "items":3
                                    },
                                    "600": {
                                        "items":4
                                    },
                                    "900": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                    <a href="#" class="brand">
                        <img src="assets/images/brands/1.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/2.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/3.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/4.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/5.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/6.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/7.png" alt="Brand Name">
                    </a>
                </div><!-- End .owl-carousel -->

                <div class="mb-5"></div><!-- End .mb-5 -->

                <div class="bg-lighter trending-products">
                    <div class="mb-3 heading heading-flex">
                        <div class="heading-left">
                            <h2 class="title">Trending Today</h2><!-- End .title -->
                        </div><!-- End .heading-left -->

                        <div class="heading-right">
                            <ul class="nav nav-pills justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="trending-all-link" data-toggle="tab"
                                       href="#trending-all-tab" role="tab" aria-controls="trending-all-tab"
                                       aria-selected="true">All</a>
                                </li>
                                @foreach($productCat  ?? [] as $category)
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           id="trending-{{ $category->slug }}-link"data-toggle="tab"href="#trending-{{ $category->slug }}-tab"role="tab"
                                           aria-controls="trending-{{ $category->slug }}-tab"
                                           aria-selected="false">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- End .heading-right -->
                    </div><!-- End .heading -->

                    <div class="tab-content tab-content-carousel">
                        <!-- All Products Tab -->
                        <div class="p-0 tab-pane fade show active" id="trending-all-tab" role="tabpanel"
                             aria-labelledby="trending-all-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                                 data-toggle="owl"
                                 data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {"items":1},
                            "480": {"items":2},
                            "768": {"items":3},
                            "992": {"items":4},
                            "1200": {"items":3, "nav": true},
                            "1600": {"items":5, "nav": true}
                        }
                    }'>
                                @foreach($products as $product)
                                    <div class="text-center product">
                                        <figure class="product-media">
                                            @if($product->on_sale)
                                                <span class="product-label label-sale">Sale</span>
                                            @endif
                                            <a href="{{ route('product.show', $product->slug) }}">
                                                <img style="height: 220px; width:180px"
                                                     src="{{ asset('storage/'.$product->image) }}"
                                                     alt="{{ $product->name }}" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist"
                                                   title="Add to wishlist">
                                                    <span>add to wishlist</span>
                                                </a>
                                                <a href="#" class="btn-product-icon btn-quickview" title="Quick view"
                                                   data-product-id="{{ $product->id }}">
                                                    <span>Quick view</span>
                                                </a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to cart">
                                                    <span>add to cart</span>
                                                </a>
                                            </div>
                                        </figure>
                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{ $product->category->name }}</a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="product-price">
                                                <span class="new-price"> ৳&nbsp;{{ number_format($product->sale_price, 2) }}</span>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val"
                                                         style="width: {{ $product->rating * 20 }}%;"></div>
                                                </div>
                                                <span class="ratings-text">( {{ $product->reviews_count }} Reviews )</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Category Tabs -->
                        @foreach($productCat  ?? [] as $category)
                            <div class="p-0 tab-pane fade" id="trending-{{ $category->slug }}-tab" role="tabpanel"
                                 aria-labelledby="trending-{{ $category->slug }}-link">
                                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                                     data-toggle="owl"
                                     data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {"items":1},
                                "480": {"items":2},
                                "768": {"items":3},
                                "992": {"items":4},
                                "1200": {"items":3, "nav": true},
                                "1600": {"items":5, "nav": true}
                            }
                        }'>
                                    @forelse($category->products ?? [] as $product)
                                        <div class="text-center product">
                                            <figure class="product-media">
                                                @if($product->on_sale)
                                                    <span class="product-label label-sale">Sale</span>
                                                @endif
                                                <a href="{{ route('product.show', $product->slug) }}">
                                                    <img style="height: 220px; width:180px"
                                                         src="{{ asset('storage/'.$product->image) }}"
                                                         alt="{{ $product->name }}" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist"
                                                       title="Add to wishlist">
                                                        <span>add to wishlist</span>
                                                    </a>
                                                    <a href="#" class="btn-product-icon btn-quickview"
                                                       title="Quick view" data-product-id="{{ $product->id }}">
                                                        <span>Quick view</span>
                                                    </a>

                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart" title="Add to cart">
                                                        <span>add to cart</span>
                                                    </a>
                                                </div>
                                            </figure>
                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">{{ $category->name }}</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                                </h3>
                                                <div class="product-price">
                                                    <span class="new-price">${{ number_format($product->price, 2) }}</span>
                                                    @if($product->original_price)
                                                        <span class="old-price">Was ${{ number_format($product->original_price, 2) }}</span>
                                                    @endif
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val"
                                                             style="width: {{ $product->rating * 20 }}%;"></div>
                                                    </div>
                                                    <span class="ratings-text">( {{ $product->reviews_count }} Reviews )</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No products found this category!!</p>
                                    @endforelse

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- End .bg-lighter -->

                <div class="mb-5"></div><!-- End .mb-5 -->
                <div class="row cat-banner-row ict">
                    <div class="p-3 mb-3 section-header"
                         style="background: linear-gradient(135deg, #6e8efb, #a777e3); border-radius: 8px;">
                        <h4 class="m-0 text-white section-title">
                            <i class="fas fa-laptop-code me-2"></i>
                            <span class="d-inline-block animate__animated animate__fadeIn">ICT Products</span>
                            <small class="mt-1 d-block text-white-50">Cutting-edge technology for your digital
                                life</small>
                        </h4>
                    </div>
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                             data-owl-options='{
                                        "nav": true,
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            },
                                            "1200": {
                                                "items":3
                                            },
                                            "1600": {
                                                "items":4
                                            }
                                        }
                                    }'>

                            @forelse($ictProducts  ?? [] as $ictProduct)
                                <div class="text-center product">
                                    <figure class="product-media">
                                        <a href="{{ route('product.show', $ictProduct->slug) }}">
                                            <img src="{{ asset('storage/'.$ictProduct->image) }}"
                                                 alt="{{$ictProduct->slug}}" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                               title="Add to wishlist"><span>add to wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                               title="Quick view"><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{$ictProduct->category['title']}}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title">
                                            <a href="{{ route('product.show', $ictProduct->slug) }}">{{ $ictProduct->name }}</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            ৳&nbsp; {{$ictProduct->sale_price}}
                                        </div><!-- End .product-price -->

                                    </div><!-- End .product-body -->
                                </div>
                            @empty
                                <p>No products found this category!!</p>
                            @endforelse


                        </div><!-- End .owl-carousel -->
                    </div><!-- End .col-xl-9 -->
                </div><!-- End .row cat-banner-row -->

                <div class="row cat-banner-row clothing">
                    <div class="p-3 mb-3 section-header"
                         style="background: linear-gradient(135deg, #6e8efb, #a777e3); border-radius: 8px;">
                        <h4 class="m-0 text-white section-title position-relative">
                            <i class="fa fa-tshirt me-2"></i>
                            <span class="d-inline-block animate__animated animate__fadeIn">Fashions & Clothing</span>
                            <small class="mt-1 d-block text-white-50">Trendy styles for every occasion</small>

                            <!-- Decorative fashion elements -->
                            <span class="top-0 position-absolute end-0 me-3" style="opacity: 0.2;">
        <i class="fas fa-ribbon fa-2x"></i>
    </span>
                        </h4>
                    </div>

                    <div class="col-xl-12 col-xxl-12">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                             data-owl-options='{
                                        "nav": true,
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            },
                                            "1200": {
                                                "items":3
                                            },
                                            "1600": {
                                                "items":4
                                            }
                                        }
                                    }'>

                            @forelse($fashionProducts as $fashionProduct)
                                <div class="text-center product">
                                    <figure class="product-media">
                                        <a href="{{ route('product.show', $fashionProduct->slug) }}">
                                            <img style="height: 250px"
                                                 src="{{ asset('storage/'.$fashionProduct->image) }}"
                                                 alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                               title="Add to wishlist"><span>add to wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                               title="Quick view"><span>Quick view</span></a>

                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Shoes</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a
                                                    href="{{ route('product.show', $fashionProduct->slug) }}">{{$fashionProduct->name}}</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            ৳&nbsp;{{$fashionProduct->sale_price}}
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 12 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div>
                            @empty
                                <p>No products found this category!!</p>
                            @endforelse


                        </div><!-- End .owl-carousel -->
                    </div><!-- End .col-xl-9 -->
                </div><!-- End .row cat-banner-row -->

                <div class="mb-3"></div><!-- End .mb-3 -->
                <div class="row cat-banner-row electronics">
                    <div class="p-3 mb-3 section-header"
                         style="background: linear-gradient(135deg, #6e8efb, #a777e3); border-radius: 8px;">
                        <h4 class="m-0 text-white section-title position-relative">
                            <i class="fas fa-microchip me-2"></i>
                            <span class="d-inline-block animate__animated animate__fadeIn">Electronics</span>
                            <small class="mt-1 d-block text-white-50">Innovative tech for modern living</small>

                            <!-- Decorative tech elements -->
                            <span class="top-0 position-absolute end-0 me-3" style="opacity: 0.2;">
        <i class="fas fa-bolt fa-2x"></i>
    </span>
                            <span class="bottom-0 position-absolute start-0 ms-3" style="opacity: 0.2;">
        <i class="fas fa-satellite-dish fa-2x"></i>
    </span>
                        </h4>
                    </div>

                    <div class="col-xl-10 col-xxl-10">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                             data-owl-options='{
                                        "nav": true,
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            },
                                            "1200": {
                                                "items":5
                                            },
                                            "1600": {
                                                "items":4
                                            }
                                        }
                                    }'>

                            @forelse($electronicsProducts as $electronicsProduct)
                                <div class="text-center product">
                                    <figure class="product-media">
                                        @if($electronicsProduct->on_sale)
                                            <span class="product-label label-sale">Sale</span>
                                        @endif
                                        <a href="{{ route('product.show', $electronicsProduct->slug) }}">
                                            <img style="height: 250px"
                                                 src="{{ asset('storage/'.$electronicsProduct->image) }}"
                                                 alt="{{ $electronicsProduct->name }}" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist">
                                                <span>add to wishlist</span>
                                            </a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick view"
                                               data-product-id="{{ $electronicsProduct->id }}">
                                                <span>Quick view</span>
                                            </a>

                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart">
                                                <span>add to cart</span>
                                            </a>
                                        </div>
                                    </figure>
                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{ $electronicsProduct->category->name }}</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="{{ route('product.show', $electronicsProduct->slug) }}">{{ $electronicsProduct->name }}</a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="new-price"> ৳&nbsp;{{ number_format($product->sale_price, 2) }}</span>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val"
                                                     style="width: {{ $product->rating * 20 }}%;"></div>
                                            </div>
                                            <span class="ratings-text">( {{ $electronicsProduct->reviews_count }} Reviews )</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No products found this category!!</p>
                            @endforelse


                        </div><!-- End .owl-carousel -->
                    </div><!-- End .col-xl-9 -->
                </div><!-- End .row cat-banner-row -->
                <div class="mb-3"></div><!-- End .mb-3 -->


                <div class="row cat-banner-row footwear">
                    <div class="p-3 mb-3 section-header"
                         style="background: linear-gradient(135deg, #6e8efb, #a777e3); border-radius: 8px;">
                        <h4 class="m-0 text-white section-title position-relative">
                            <i class="fa fa-bag-shopping me-2"></i>
                            <span class="d-inline-block animate__animated animate__fadeIn">Footwear</span>
                            <!-- Decorative tech elements -->
                            <span class="top-0 position-absolute end-0 me-3" style="opacity: 0.2;">
        <i class="fas fa-bolt fa-2x"></i>
    </span>
                            <span class="bottom-0 position-absolute start-0 ms-3" style="opacity: 0.2;">
        <i class="fas fa-satellite-dish fa-2x"></i>
    </span>
                        </h4>
                    </div>

                    <div class="col-xl-12 col-xxl-12">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                             data-owl-options='{
                                        "nav": true,
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            },
                                            "1200": {
                                                "items":4
                                            },
                                            "1600": {
                                                "items":4
                                            }
                                        }
                                    }'>


                            @forelse($footwearProducts as $footwearProduct)
                                <div class="text-center product">
                                    <figure class="product-media">
                                        @if($footwearProduct->on_sale)
                                            <span class="product-label label-sale">Sale</span>
                                        @endif
                                        <a href="{{ route('product.show', $footwearProduct->slug) }}">
                                            <img style="height: 250px"
                                                 src="{{ asset('storage/'.$footwearProduct->image) }}"
                                                 alt="{{ $footwearProduct->name }}" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist">
                                                <span>add to wishlist</span>
                                            </a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick view"
                                               data-product-id="{{ $footwearProduct->id }}">
                                                <span>Quick view</span>
                                            </a>

                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart">
                                                <span>add to cart</span>
                                            </a>
                                        </div>
                                    </figure>
                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{ $footwearProduct->category->name }}</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="{{ route('product.show', $footwearProduct->slug) }}">{{ $footwearProduct->name }}</a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="new-price"> ৳&nbsp;{{ number_format($product->sale_price, 2) }}</span>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <p>No products found this category!!</p>
                            @endforelse


                        </div><!-- End .owl-carousel -->
                    </div><!-- End .col-xl-9 -->
                </div><!-- End .row cat-banner-row -->
                <div class="mb-3"></div><!-- End .mb-3 -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="banner banner-overlay">
                            <a href="#">
                                <img src="assets/images/demos/demo-14/banners/banner-7.jpg" alt="Banner img desc">
                            </a>

                            <div class="banner-content">
                                <h4 class="text-white banner-subtitle d-none d-sm-block"><a href="#">Spring Sale is
                                        Coming</a></h4><!-- End .banner-subtitle -->
                                <h3 class="text-white banner-title"><a href="#">Floral T-shirts and Vests <br><span>Spring Sale</span></a>
                                </h3><!-- End .banner-title -->
                                <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="banner banner-overlay">
                            <a href="#">
                                <img src="assets/images/demos/demo-14/banners/banner-8.jpg" alt="Banner img desc">
                            </a>

                            <div class="banner-content">
                                <h4 class="text-white banner-subtitle d-none d-sm-block"><a href="#">Amazing Value</a>
                                </h4><!-- End .banner-subtitle -->
                                <h3 class="text-white banner-title"><a href="#">Upgrade and Save <br><span>On The Latest Apple Devices</span></a>
                                </h3><!-- End .banner-title -->
                                <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner banner-overlay -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->

                <div class="mb-3"></div><!-- End .mb-3 -->

                <div class="icon-boxes-container">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="icon-rocket"></i>
                                            </span>
                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                        <p>Orders 5000 or more</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="icon-rotate-left"></i>
                                            </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                        <p>Within 30 days</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="icon-life-ring"></i>
                                            </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                        <p>24/7 amazing services</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .icon-boxes-container -->
                <div class="mb-5"></div><!-- End .mb-5 -->
            </div><!-- End .col-lg-9 col-xxl-10 -->

            <aside class="col-xl-3 col-xxl-2 order-xl-first">
                <div class="sidebar sidebar-home">
                    <div class="row">
                        <div class="col-sm-6 col-xl-12">

                        </div><!-- End .col-sm-6 col-xl-12 -->

                        <div class="mb-2 col-sm-6 col-xl-12">
                            <div class="widget widget-products">
                                <h4 class="widget-title"><span>Bestsellers</span></h4><!-- End .widget-title -->

                                <div class="products">
                                    @forelse($best_sellers as $best_sell)
                                        <div class="product product-sm">
                                            <figure class="product-media">
                                                <a href="{{ route('product.show', $best_sell->slug) }}">
                                                    <img src="{{ asset('storage/'.$best_sell->image) }}"
                                                         alt="{{$best_sell->name}}" class="product-image">
                                                </a>
                                            </figure>

                                            <div class="product-body">
                                                <h5 class="product-title"><a
                                                            href="{{ route('product.show', $best_sell->slug) }}">{{$best_sell->name}}</a>
                                                </h5>
                                                <div class="product-price">
                                                    ৳&nbsp;{{$best_sell->sale_price}}
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product product-sm -->
                                    @empty
                                        <p>No products found this category!!</p>
                                    @endforelse
                                </div><!-- End .products -->
                            </div><!-- End .widget widget-products -->
                        </div><!-- End .col-sm-6 col-xl-12 -->

                        <div class="col-12">
                            <div class="widget widget-deals">
                                <h4 class="widget-title"><span>Special Offer</span></h4><!-- End .widget-title -->

                                <div class="row">
                                    <div class="col-sm-6 col-xl-12">
                                        <div class="text-center product">
                                            <figure class="product-media">
                                                @if(optional($widget)->short_2)
                                                    {!! $widget->short_2 !!}
                                                @endif
                                            </figure>

                                            <div class="product-body">
                                            </div><!-- End .product-body -->

                                            <div class="product-countdown" data-until="+44h" data-relative="true"
                                                 data-labels-short="true"></div><!-- End .product-countdown -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-xl-12 -->

                                    <div class="col-sm-6 col-xl-12">
                                        <div class="text-center product">
                                            <figure class="product-media">
                                                <span class="product-label label-sale">Deal of the week</span>
                                                @if(optional($widget)->short_1)
                                                    {!! $widget->short_1 !!}
                                                @endif
                                            </figure><!-- End .product-media -->

                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-xl-12 -->
                                </div><!-- End .row -->
                            </div><!-- End .widget widget-deals -->
                        </div><!-- End .col-sm-6 col-lg-xl -->

                        <div class="col-sm-6 col-xl-12">
                            <div class="widget widget-banner">
                                <div class="banner banner-overlay">
                                    <a href="#">
                                        <img src="assets/images/demos/demo-14/banners/banner-12.jpg"
                                             alt="Banner img desc">
                                    </a>

                                    <div class="banner-content banner-content-top">
                                        <h3 class="text-white banner-title"><a href="#">Take Better Photos <br><span>With</span>
                                                Canon EOS <br><span>Up To 20% Off</span></a></h3>
                                        <!-- End .banner-title -->
                                        <a href="#" class="banner-link">Shop Now <i
                                                    class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner banner-overlay -->
                            </div><!-- End .widget widget-banner -->
                        </div><!-- End .col-sm-6 col-lg-12 -->

                        <div class="col-sm-6 col-xl-12">
                            <div class="widget widget-posts">
                                <h4 class="widget-title"><span>Latest Blog Posts</span></h4><!-- End .widget-title -->

                                <div class="owl-carousel owl-simple" data-toggle="owl"
                                     data-owl-options='{
                                                "nav":false,
                                                "dots": true,
                                                "loop": false,
                                                "autoHeight": true
                                            }'>
                                    <article class="entry">
                                        <figure class="entry-media">
                                            <a href="single.html">
                                                <img src="assets/images/demos/demo-14/blog/post-1.jpg" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <a href="#">Nov 22, 2025</a>, 0 Comments
                                            </div><!-- End .entry-meta -->

                                            <h5 class="entry-title">
                                                <a href="single.html">Sed adipiscing ornare.</a>
                                            </h5><!-- End .entry-title -->

                                            <div class="entry-content">
                                                <p>Lorem ipsum dolor consectetuer adipiscing elit. Phasellus hendrerit.
                                                    Pelletesque aliquet nibh ...</p>
                                                <a href="single.html" class="read-more">Read More</a>
                                            </div><!-- End .entry-content -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->

                                    <article class="entry">
                                        <figure class="entry-media">
                                            <a href="single.html">
                                                <img src="assets/images/demos/demo-14/blog/post-2.jpg" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <a href="#">Nov 22, 2025</a>, 0 Comments
                                            </div><!-- End .entry-meta -->

                                            <h5 class="entry-title">
                                                <a href="single.html">Vivamus vestibulum ntulla.</a>
                                            </h5><!-- End .entry-title -->

                                            <div class="entry-content">
                                                <p>Phasellus hendrerit. Pelletesque aliquet nibh necurna In nisi neque,
                                                    aliquet vel, dapibus id ... </p>
                                                <a href="single.html" class="read-more">Read More</a>
                                            </div><!-- End .entry-content -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->

                                    <article class="entry">
                                        <figure class="entry-media">
                                            <a href="single.html">
                                                <img src="assets/images/demos/demo-14/blog/post-3.jpg" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <a href="#">Nov 22, 2025</a>, 0 Comments
                                            </div><!-- End .entry-meta -->

                                            <h5 class="entry-title">
                                                <a href="#">Praesent placerat risus.</a>
                                            </h5><!-- End .entry-title -->

                                            <div class="entry-content">
                                                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero
                                                    sodales leo, eget blandit nunc ...</p>
                                                <a href="#" class="read-more">Read More</a>
                                            </div><!-- End .entry-content -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->
                                </div><!-- End .owl-carousel -->
                            </div><!-- End .widget widget-posts -->
                        </div><!-- End .col-sm-6 col-xl-12 -->
                    </div><!-- End .row -->
                </div><!-- End .sidebar sidebar-home -->
            </aside><!-- End .col-lg-3 col-xxl-2 -->
        </div><!-- End .row -->
    </div><!-- End .container-fluid -->

    @include('frontend.products.partials.quickView')

@endsection