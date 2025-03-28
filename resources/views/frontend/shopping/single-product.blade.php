@extends('frontend.shopping.layouts.page')

@section('content')

        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                </ol>
            </div>
        </nav>
        <div class="container">
            <div class="product-single-container product-single-default">
                <div class="cart-message d-none">
                    <strong class="single-cart-notice"></strong>
                    <span>has been added to your cart.</span>
                </div>

                <div class="row">
                    <div class="col-lg-5 col-md-6 product-single-gallery">
                        <div class="product-slider-container">
                            <div class="label-group">
                                {{--  <div class="product-label label-hot">HOT</div> --}}
                                {{-- <div class="product-label label-sale">-16%</div> --}}
                            </div>

                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                @if($productDetail->gallery && $productDetail->gallery->count() > 0)
                                    @foreach($productDetail->gallery as $image)
                                        <div class="product-item">
                                            <img class="product-single-image" src="{{asset('storage/'.$image->image_path)}}" data-zoom-image="{{$image->image_path}}" width="468" height="468" alt="product" />
                                        </div>
                                    @endforeach
                                @else
                                    <p>No images available for this product.</p>
                                @endif
                            </div>
                            <!-- End .product-single-carousel -->
                            <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                        </div>

                        <div class="prod-thumbnail owl-dots">
                            @if($productDetail->gallery && $productDetail->gallery->count() > 0)
                                @foreach($productDetail->gallery as $image)
                                    <div class="owl-dot dot-thumbnail">
                                        <img src="{{asset('storage/'.$image->image_path)}}" width="110" height="110" alt="product-thumbnail" />
                                    </div>
                                @endforeach
                            @else
                                <p>No images available for this product.</p>
                            @endif

                        </div>
                    </div>
                    <!-- End .product-single-gallery -->

                    <div class="col-lg-7 col-md-6 product-single-details">
                        <h1 class="product-title">{{$productDetail->name}}</h1>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:60%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                            <a href="#" class="rating-link">( 6 Reviews )</a>
                        </div>
                        <!-- End .ratings-container -->
                        <hr class="short-divider">
                        <div class="price-box">
                            <span class="product-price">TK :{{$productDetail->sale_price}}</span>
                        </div>
                        <!-- End .price-box -->

                        <div class="product-desc">
                            <p>
                                {{$productDetail->description}}
                            </p>
                        </div>
                        <!-- End .product-desc -->

                        <ul class="single-info-list">
                            <li>SKU: <strong>{{$productDetail->sku}}</strong></li>
                            @if($productDetail->category)
                                <li>CATEGORY: <strong><a href="#" class="product-category">{{$productDetail->category->title}}</a></strong></li>
                            @else
                                <li class="product-category">No Category</li>
                            @endif
                            <li>
                                TAGs:
                                <strong>
                                    <a href="#" class="product-category"></a>
                                </strong>,

                            </li>
                        </ul>
                        <!-----------product-filters-container------------->
                        <div class="product-cart-box">
                            <div class="price-box">
                                <span id="price_update"></span>
                            </div>

                            <div class="product-single-qty">
                                <input id="single_quantity" class="horizontal-quantity form-control" type="number">
                            </div>

                            <!-- End .product-single-qty -->
                            <a href="javascript:;" class="btn btn-dark cart-add" title="Add to Cart" data-product-id="{{ $productDetail->id }}">
                                Add to Cart
                            </a>

                            <a href="{{route('view.cart')}}" class="btn btn-gray cart-view d-none">View cart</a>
                        </div>
                        <!-- End .product-action -->

                        <hr class="divider mb-0 mt-0">

                        <div class="product-single-share">
                            <label class="sr-only">Share:</label>

                            <div class="social-icons mr-2">
                                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                            </div>
                            <!-- End .social-icons -->

                            <a href="#" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                        class="icon-wishlist-2"></i><span>Add to
                                        Wishlist</span></a>
                        </div>
                        <!-- End .product single-share -->
                    </div>
                    <!-- End .product-single-details -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .product-single-container -->

            <div class="product-single-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content" role="tab" aria-controls="product-size-content" aria-selected="true">Size Guide</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                            Information</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (1)</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                        <div class="product-desc-content">
                            {!! $productDetail->content !!}
                        </div>
                        <!-- End .product-desc-content -->
                    </div>
                    <!-- End .tab-pane -->

                    <div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
                        <div class="product-size-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('fashion/assets/images/products/single/body-shape.png')}}" alt="body shape" width="217" height="398">
                                </div>
                                <!-- End .col-md-4 -->

                                <div class="col-md-8">
                                    <table class="table table-size">
                                        <thead>
                                        <tr>
                                            <th>SIZE</th>
                                            <th>CHEST(in.)</th>
                                            <th>WAIST(in.)</th>
                                            <th>HIPS(in.)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>XS</td>
                                            <td>34-36</td>
                                            <td>27-29</td>
                                            <td>34.5-36.5</td>
                                        </tr>
                                        <tr>
                                            <td>S</td>
                                            <td>36-38</td>
                                            <td>29-31</td>
                                            <td>36.5-38.5</td>
                                        </tr>
                                        <tr>
                                            <td>M</td>
                                            <td>38-40</td>
                                            <td>31-33</td>
                                            <td>38.5-40.5</td>
                                        </tr>
                                        <tr>
                                            <td>L</td>
                                            <td>40-42</td>
                                            <td>33-36</td>
                                            <td>40.5-43.5</td>
                                        </tr>
                                        <tr>
                                            <td>XL</td>
                                            <td>42-45</td>
                                            <td>36-40</td>
                                            <td>43.5-47.5</td>
                                        </tr>
                                        <tr>
                                            <td>XXL</td>
                                            <td>45-48</td>
                                            <td>40-44</td>
                                            <td>47.5-51.5</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End .row -->
                        </div>
                        <!-- End .product-size-content -->
                    </div>
                    <!-- End .tab-pane -->

                    <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                        <table class="table table-striped mt-2">
                            <tbody>
                            <tr>
                                <th>Weight</th>
                                <td>23 kg</td>
                            </tr>

                            <tr>
                                <th>Dimensions</th>
                                <td>12 × 24 × 35 cm</td>
                            </tr>

                            <tr>
                                <th>Color</th>
                                <td>Black, Green, Indigo</td>
                            </tr>

                            <tr>
                                <th>Size</th>
                                <td>Large, Medium, Small</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- End .tab-pane -->


                </div>
                <!-- End .tab-content -->
            </div>
            <!-- End .product-single-tabs -->


            <!-- End .products-section -->

            <hr class="mt-0 m-b-5" />
            <!--   here product-widgets-container-->

            <!-- End .row -->
        </div>
        <!-- End .container -->

    <!-- End .main -->
@endsection


@push('custom-script')
    <script>

        $(document).ready(function () {
            $('.cart-add').on('click', function () {
                var productId = $(this).data("product-id");
                var quantity = $(this).prev(".product-single-qty").find("#single_quantity").val();

                console.log(productId)
                console.log(quantity)

                if (!quantity || quantity <= 0) {
                    alert("Please enter a valid quantity.");
                    return;
                }
                addToCart(productId, quantity);
            });

        });
        function addToCart(productId,quantity) {
            let cartUrl = "{{ route('addToCart') }}";
            $.ajax({
                url: cartUrl,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    console.log(response)

                    alert(response.message);
                    $(".cart-view").removeClass("d-none");
                    updateCartCount();
                },
                error: function(xhr) {
                    alert("Error adding product to cart.");
                }
            });
        }

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


    </script>
@endpush



@push('styles')
    <style>
        .dot-thumbnail img{
            height: 140px;
        }
    </style>
@endpush



