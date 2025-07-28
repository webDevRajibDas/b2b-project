@extends('frontend.cart.layouts.page')

@section('content')

    <div class="home-top-container appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 mb-2">
                    <div class="home-banner banner banner1 banner-md-vw banner-sm-vw d-flex align-items-center">
                        <figure class="w-100">
                            <img src="{{asset('fashion/assets/images/demoes/demo7/banners/fashion-sale_banner.png')}}"
                                 style="background-color: #4a4a4a;" alt="banner">
                        </figure>
                        <div class="banner-layer">
                        </div>
                        <!-- End .banner-layer -->
                    </div>
                    <!-- End .home-slide -->
                </div>

            </div>
            <!-- End .col-lg-5 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->


    <div class="container">
        <section class="featured-products-section appear-animate" data-animation-name="fadeInUpShorter"
                 data-animation-delay="100">
            <h2 class="section-title text-center d-flex align-items-center">Featured Products
            </h2>

            <div class="owl-carousel owl-theme dots-top dots-small" data-owl-options="{
                            'dots': true,
                            'margin': 20,
                            'nav': false,
                            'loop': false,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '768': {
                                    'items': 3
                                },
                                '991': {
                                    'items': 4
                                }
                            }
                        }">


                @foreach($all_products as $product)
                    <div class="product-default left-details">
                        <figure>
                            <a href="{{ route('product.show', $product->slug) }}">
                                <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('fashion/assets/images/demoes/demo7/products/product-8.jpg') }}"
                                     alt="{{ $product->name }}" width="300" height="300">

                                <img src="{{asset('fashion/assets/images/demoes/demo7/products/product-8-2.jpg')}}"
                                     alt="product"
                                     width="300" height="300">
                            </a>
                            <div class="label-group">
                                <span class="product-label label-hot">HOT</span>
                                <span class="product-label label-sale">-15%</span>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">T-shirts</a>,
                                <a href="#" class="product-category">Toys</a>
                            </div>
                            <h3 class="product-title"><a href="#">{{$product->name}}</a></h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="old-price">{{$product->price}}</span>
                                <span class="product-price">{{$product->sale_price}}</span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                <a href="#" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                <a href="#" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                        <!-- End .product-details -->
                    </div>
                @endforeach

            </div>
        </section>
    </div>

    <div class="categories-section bg-primary">
        <div class="container">
            <h2 class="section-title border-0 title-decorate text-center text-white d-flex align-items-center appear-animate"
                data-animation-name="fadeInUpShorter">
                        <span>BROWSE
                            OUR
                            CATEGORIES</span></h2>
            <div class="owl-carousel owl-theme appear-animate show-nav-hover" data-animation-name="fadeInUpShorter"
                 data-animation-delay="200" data-owl-options="{
                        'dots': false,
                        'margin': 20,
                        'loop': false,
                        'navText': [ '<i class=icon-left-open-big>', '<i class=icon-right-open-big>' ],
                        'nav': true,
                        'responsive': {
                            '0': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '991': {
                                'items': 4,
                                'nav': false
                            }
                        }
                    }">


                @forelse($product_categories as $categories)
                    <div class="banner banner-image">
                        <a href="#">
                            <img src="{{asset('fashion/assets/images/demoes/demo7/banners/cats/banner-1.jpg')}}"
                                 width="272"
                                 height="231"
                                 alt="banner">
                        </a>
                        <div class="banner-layer banner-layer-middle">
                            <h3>{{$categories->title}}</h3>
                            <span>2 PRODUCTS </span>
                        </div>
                    </div>
                    <!-- End .banner -->
                @empty
                    <div class="col-12 text-center">
                        <p>No Category found.</p>
                    </div>
                @endforelse

            </div>
            <!-- End .cat-carousel -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .banners-section -->

    <div class="arrival-products-section appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
        <div class="container">
            <h2 class="section-title text-center d-flex align-items-center">JUST ARRIVED
            </h2>

            <div class="row">
                <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                    <div class="product-default left-details">
                        <figure>
                            <a href="#">
                                <img src="{{asset('fashion/assets/images/demoes/demo7/products/product-13.jpg')}}"
                                     alt="product"
                                     width="300" height="300">
                                <img src="{{asset('fashion/assets/images/demoes/demo7/products/product-13-2.jpg')}}"
                                     alt="product"
                                     width="300" height="300">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">clothing</a>,
                                <a href="#" class="product-category">shoes</a>
                            </div>
                            <h3 class="product-title"><a href="#">Men Black Glasses</a></h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$99.00 – $109.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                    <div class="product-default left-details">
                        <figure>
                            <a href="#">
                                <img src="assets/images/demoes/demo7/products/product-1.jpg" alt="product"
                                     width="300" height="300">
                                <img src="assets/images/demoes/demo7/products/product-1-2.jpg" alt="product"
                                     width="300" height="300">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">clothing</a>,
                                <a href="#" class="product-category">shoes</a>
                            </div>
                            <h3 class="product-title"><a href="#">Black Glasses</a></h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$99.00 – $109.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                    <div class="product-default left-details">
                        <figure>
                            <a href="#">
                                <img src="assets/images/demoes/demo7/products/product-10.jpg" alt="product"
                                     width="300" height="300">
                                <img src="assets/images/demoes/demo7/products/product-10-2.jpg" alt="product"
                                     width="300" height="300">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">clothing</a>,
                                <a href="#" class="product-category">shoes</a>
                            </div>
                            <h3 class="product-title"><a href="#">Men Black Shoes</a></h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$99.00 – $109.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                    <div class="product-default left-details">
                        <figure>
                            <a href="#">
                                <img src="assets/images/demoes/demo7/products/product-14.jpg" alt="product"
                                     width="300" height="300">
                                <img src="assets/images/demoes/demo7/products/product-14-2.jpg" alt="product"
                                     width="300" height="300">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">clothing</a>,
                                <a href="#" class="product-category">shoes</a>
                            </div>
                            <h3 class="product-title"><a href="#">Men Cap</a></h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$99.00 – $109.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                    <div class="product-default left-details">
                        <figure>
                            <a href="#">
                                <img src="assets/images/demoes/demo7/products/product-5.jpg" alt="product"
                                     width="300" height="300">
                                <img src="assets/images/demoes/demo7/products/product-5-2.jpg" alt="product"
                                     width="300" height="300">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">clothing</a>,
                                <a href="#" class="product-category">shoes</a>
                            </div>
                            <h3 class="product-title"><a href="#">Brown Belt</a></h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$99.00 – $109.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                    <div class="product-default left-details">
                        <figure>
                            <a href="#">
                                <img src="assets/images/demoes/demo7/products/product-6.jpg" alt="product"
                                     width="300" height="300">
                                <img src="assets/images/demoes/demo7/products/product-6-2.jpg" alt="product"
                                     width="300" height="300">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">clothing</a>,
                                <a href="#" class="product-category">shoes</a>
                            </div>
                            <h3 class="product-title"><a href="#">Men Gentle Shoes</a></h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$99.00 – $109.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                    <div class="product-default left-details">
                        <figure>
                            <a href="#">
                                <img src="assets/images/demoes/demo7/products/product-4.jpg" alt="product"
                                     width="300" height="300">
                                <img src="assets/images/demoes/demo7/products/product-4-2.jpg" alt="product"
                                     width="300" height="300">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">clothing</a>,
                                <a href="#" class="product-category">shoes</a>
                            </div>
                            <h3 class="product-title"><a href="#">Men Black Belt</a></h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$99.00 – $109.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                    <div class="product-default left-details">
                        <figure>
                            <a href="#">
                                <img src="assets/images/demoes/demo7/products/product-2.jpg" alt="product"
                                     width="300" height="300">
                                <img src="assets/images/demoes/demo7/products/product-2-2.jpg" alt="product"
                                     width="300" height="300">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">clothing</a>,
                                <a href="#" class="product-category">shoes</a>
                            </div>
                            <h3 class="product-title"><a href="#">Jeans Pants</a></h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$99.00 – $109.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                    <div class="product-default left-details">
                        <figure>
                            <a href="#">
                                <img src="assets/images/demoes/demo7/products/product-3.jpg" alt="product"
                                     width="300" height="300">
                                <img src="assets/images/demoes/demo7/products/product-3-2.jpg" alt="product"
                                     width="300" height="300">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">clothing</a>,
                                <a href="#" class="product-category">shoes</a>
                            </div>
                            <h3 class="product-title"><a href="#">Jeans Trouser</a></h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$99.00 – $109.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-xl-5col">
                    <div class="product-default left-details">
                        <figure>
                            <a href="#">
                                <img src="assets/images/demoes/demo7/products/product-7.jpg" alt="product"
                                     width="300" height="300">
                                <img src="assets/images/demoes/demo7/products/product-7-2.jpg" alt="product"
                                     width="300" height="300">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">clothing</a>,
                                <a href="#" class="product-category">shoes</a>
                            </div>
                            <h3 class="product-title"><a href="#">Men Gray Cap</a></h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$99.00 – $109.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
            </div>

            <hr class="mt-1 mb-4">
        </div>
    </div>

    <!---Best Selling Products --->

    <!-- End .container -->
@endsection






