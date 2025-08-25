@extends('frontend.layouts.app')
@push('styles')
<style>
    .temp-order-card {
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(50, 50, 93, 0.08), 0 2px 6px rgba(0, 0, 0, 0.06);
        overflow: hidden;
    }

    .product-thumb {
        width: 72px;
        height: 72px;
        object-fit: cover;
        border-radius: 8px;
    }

    .tag {

        background: #f1f5f9;
        color: #334155;
        font-size: 12px;
        padding: 4px 8px;
        border-radius: 999px;
    }

    .whatsapp-btn {

        background: #25D366;

        color: #fff;

    }

    .messenger-btn {

        background: #0084FF;

        color: #fff;

    }

    .muted-small {
        font-size: 13px;
        color: #6b7280;
    }
</style>

@endpush



@section('content')

<nav aria-label="breadcrumb" class="mb-0 border-0 breadcrumb-nav">
    <div class="container d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$detail->name}}</li>

        </ol>

    </div><!-- End .container -->

</nav><!-- End .breadcrumb-nav -->



<div class="page-content">

    <div class="container">

        <div class="mb-2 product-details-top">

            <div class="row">

                <div class="col-md-6">

                    <div class="product-gallery">

                        <figure class="product-main-image">

                            <img id="product-zoom" src="{{asset('storage/'.$detail->image)}}"
                                data-zoom-image="{{asset('storage/'.$detail->image)}}"
                                alt="{{asset('storage/'.$detail->name)}}">


                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">

                                <i class="icon-arrows"></i>

                            </a>

                        </figure>


                        <div id="product-zoom-gallery" class="product-image-gallery">
                            @if($detail->gallery && $detail->gallery->count() > 0)
                            @foreach($detail->gallery as $image)
                            <a class="product-gallery-item" href="#"
                                data-image="{{asset('storage/'.$image->image_path)}}"
                                data-zoom-image="{{asset('storage/'.$image->image_path)}}">

                                <img src="{{asset('storage/'.$image->image_path)}}" alt="">

                            </a>

                            @endforeach
                            @else
                            <p>No images available for this product.</p>
                            @endif

                        </div><!-- End .product-image-gallery -->
                    </div><!-- End .product-gallery -->

                </div><!-- End .col-md-6 -->


                <div class="col-md-6">

                    <div class="product-details">

                        <h1 class="product-title">{{$detail->name}}</h1><!-- End .product-title -->


                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->

                        </div><!-- End .rating-container -->


                        <div class="product-pricing">

                            @if($detail->sale_price && $detail->sale_price < $detail->price)
                                <span class="original-price text-muted"
                                    style="font-size: 14px; text-decoration: line-through;">৳&nbsp;{{
                                    format_currency($detail->price) }}</span>
                                <span class="sale-price text-danger fw-bold" style="font-size: 14px;">৳&nbsp;{{
                                    format_currency($detail->sale_price) }}</span>
                                <span class="discount-badge badge bg-success ms-2" style="font-size: 14px;">৳&nbsp;{{
                                    calculate_discount_percentage($detail->price, $detail->sale_price) }}% OFF</span>
                                @else
                                <span class="current-price fw-bold" style="font-size: 14px;">{{
                                    format_currency($detail->price) }}</span>
                                @endif

                        </div>


                        <div class="product-content">

                            <p>{{$detail->description}}</p>

                        </div><!-- End .product-content -->


                        <div class="details-filter-row details-row-size">

                            <label>Color:</label>

                            <div class="product-nav product-nav-dots">

                                @php

                                $colorValues = [];

                                foreach ($detail->atts as $att) {

                                if ($att['attName'] === 'Color') {

                                $colorValues = explode(',', $att['attValue']);

                                break;

                                }

                                }

                                @endphp

                                @foreach($colorValues as $color)

                                <a href="#" style="background: {{ strtolower(trim($color)) }};">

                                    <span class="sr-only">{{ trim($color) }}</span>

                                </a>

                                @endforeach

                            </div>

                        </div>


                        <div class="details-filter-row details-row-size">
                            <label for="size">Size:</label>
                            <div class="select-custom">
                                @php
                                $sizes = [];
                                foreach ($detail->atts as $att) {
                                if ($att['attName'] === 'Size') {
                                $sizes = explode(',', $att['attValue']);
                                break;

                                }

                                }

                                @endphp
                                <div class="select-custom">

                                    <select name="size" id="size" class="form-control">
                                        <option value="#" selected="selected">Select a size</option>
                                        @foreach($sizes as $size)
                                        @php $sizeValue = strtolower(trim($size)); @endphp
                                        <option value="{{ $sizeValue }}">{{ trim($size) }}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>

                        </div>


                        <div class="details-filter-row details-row-size">
                            <label for="qty">Qty:</label>
                            <div class="product-details-quantity">
                                <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1"
                                    data-decimals="0" required>
                            </div>

                        </div>


                    
                        <div class="product-details-footer">
                            <div class="product-cat">
                                <span>Category:</span>

                                <span>{{$detail->category['title']}}</span>

                            </div><!-- End .product-cat -->


                            <div class="social-icons social-icons-sm">

                                <span class="social-label">Share:</span>

                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                        class="icon-facebook-f"></i></a>

                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                        class="icon-instagram"></i></a>

                                <a href="#" class="social-icon" title="Whatsup" target="_blank"><i
                                        class="icon-whatsapp"></i></a>

                            </div>

                        </div><!-- End .product-details-footer -->

                    </div><!-- End .product-details -->

                    <div class="temp_order_box">
                        <div class="mb-3 card temp-order-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="text-right">
                                        <div class="tag" style="font-size: 16px; font-weight: 700;margin-top:8px">সরাসরি অর্ডার
                                            করতে কল: 01751359305
                                        </div>
                                    </div>
                                </div>

                                <hr style="margin:2rem auto 1.5rem;">
                                <div class="row align-items-center">
                                    <div class="col-12 d-flex justify-content-between">
                                        <button id="open-messenger" style="width:48%"
                                            class="btn messenger-btn btn-sm">Send Messenger
                                        </button>
                                         <button id="open-whatsapp" style="width:48%; background:#16BE45"
                                            class="btn messenger-btn btn-sm" 
                                            data-name="{{ $detail->name }}"
                                            data-price="{{ number_format($detail->sale_price, 2) }}">
                                            Send WhatsApp
                                        </button>
                                    </div>

                                </div>


                                <hr style="margin:2rem auto 1.5rem;">

                                <!--<div class="d-flex justify-content-between align-items-center">-->
                                <!--    <div>-->
                                <!--        <small class="muted-small">Notes</small>-->
                                <!--        <div id="order-notes">Deliver between 10am-5pm. Call on arrival.</div>-->
                                <!--    </div>-->
                                <!--</div>-->

                            </div>

                        </div>

                    </div>


                </div><!-- End .col-md-6 -->

            </div><!-- End .row -->

        </div><!-- End .product-details-top -->

    </div><!-- End .container -->


    <div class="product-details-tab product-details-extended">

        <div class="container">

            <ul class="nav nav-pills justify-content-center" role="tablist">

                <li class="nav-item">

                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                        role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab"
                        aria-controls="product-info-tab" aria-selected="false">Additional information</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab"
                        role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab"
                        aria-controls="product-review-tab" aria-selected="false">Reviews</a>

                </li>

            </ul>

        </div><!-- End .container -->


        <div class="tab-content">

            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                aria-labelledby="product-desc-link">
                <div class="product-desc-content">
                    <div class="product-desc-row">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-lg-8 col-xxl-8">
                                    <div class="card"
                                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; padding: 20px">
                                        <div class="card-body">
                                            {!! $detail->content !!}
                                        </div>
                                    </div>
                                </div><!-- End .col-lg-4 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .product-desc-row -->
                </div><!-- End .product-desc-content -->
            </div><!-- .End .tab-pane -->

            <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                <div class="product-desc-content">
                    <div class="container">
                        <h3>Information</h3>
                    </div><!-- End .container -->
                </div><!-- End .product-desc-content -->
            </div><!-- .End .tab-pane -->

            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                aria-labelledby="product-shipping-link">

                <div class="product-desc-content">
                    <div class="container">
                        <h3>Delivery & returns</h3>
                        <p>We deliver to over 100 countries around the world. For full details of the delivery
                            options we offer, please view our <a href="#">Delivery information</a><br>

                            We hope you’ll love every purchase, but if you ever need to return an item you can do so
                            within a month of receipt. For full details of how to make a return, please view our <a
                                href="#">Returns information</a></p>

                    </div><!-- End .container -->

                </div><!-- End .product-desc-content -->

            </div><!-- .End .tab-pane -->

            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">

                <div class="reviews">

                    <div class="container">
                        <h3>Reviews</h3>
                        <div class="review">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <h4><a href="#">Samanta J.</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    </div><!-- End .rating-container -->
                                    <span class="review-date">6 days ago</span>
                                </div><!-- End .col -->
                                <div class="col">
                                    <h4>Good, perfect size</h4>
                                    <div class="review-content">

                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum
                                            dolores assumenda asperiores facilis porro reprehenderit animi culpa
                                            atque blanditiis commodi perspiciatis doloremque, possimus, explicabo,
                                            autem fugit beatae quae voluptas!</p>

                                    </div><!-- End .review-content -->


                                    <div class="review-action">

                                        <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>

                                        <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>

                                    </div><!-- End .review-action -->

                                </div><!-- End .col-auto -->

                            </div><!-- End .row -->

                        </div><!-- End .review -->

                    </div><!-- End .container -->

                </div><!-- End .reviews -->

            </div><!-- .End .tab-pane -->

        </div><!-- End .tab-content -->

    </div><!-- End .product-details-tab -->


    <div class="container">

        <h2 class="mb-4 text-center title">You May Also Like</h2><!-- End .title text-center -->

        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
            data-owl-options='{

                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
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
                                    "items":4,
                                    "nav": true,
                                    "dots": false

                                }

                            }

                        }'>


            @foreach($relatedProducts as $relatedProduct)

            <div class="product product-7">
                <figure class="product-media">
                    <span class="product-label label-new">New</span>
                    <a href="{{ route('product.show', $relatedProduct->slug) }}">
                        <img src="{{asset('storage/'.$relatedProduct->image)}}" alt="Product image"
                            class="product-image">

                    </a>


                    <div class="product-action-vertical">

                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Add to
                                wishlist</span></a>

                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                            title="Quick view"><span>Quick view</span></a>

                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>

                    </div><!-- End .product-action-vertical -->


                    <div class="product-action">

                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>

                    </div><!-- End .product-action -->

                </figure><!-- End .product-media -->


                <div class="product-body">

                    <div class="product-cat">

                        <a href="#">Women</a>

                    </div><!-- End .product-cat -->

                    <h3 class="product-title"><a
                            href="{{ route('product.show', $relatedProduct->slug) }}">{{$relatedProduct->name}}</a>
                    </h3><!-- End .product-title -->

                    <div class="product-price">

                        {{$relatedProduct->sale_price}}

                    </div><!-- End .product-price -->

                    <div class="ratings-container">

                        <div class="ratings">

                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->

                        </div><!-- End .ratings -->

                        <span class="ratings-text">( 2 Reviews )</span>

                    </div><!-- End .rating-container -->


                    <div class="product-nav product-nav-dots">

                        <a href="#" class="active" style="background: #cc9966;"><span class="sr-only">Color
                                name</span></a>

                        <a href="#" style="background: #7fc5ed;"><span class="sr-only">Color name</span></a>

                        <a href="#" style="background: #e8c97a;"><span class="sr-only">Color name</span></a>

                    </div><!-- End .product-nav -->

                </div><!-- End .product-body -->

            </div><!-- End .product -->

            @endforeach


        </div><!-- End .owl-carousel -->

    </div><!-- End .container -->

</div><!-- End .page-content -->





<div class="modal fade" id="guestCartModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 20px">
            <div class="modal-header">
                <h5 class="modal-title">Continue as Guest</h5>
            </div>

            <div class="modal-body">
                <p>You can add items to your cart without logging in. Would you like to continue?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Login</button>
                <button type="button" class="btn btn-primary" id="continueAsGuest">Continue as Guest</button>

            </div>

        </div>

    </div>

</div>



@endsection





@push('scripts')

<script>

    $(document).ready(function () {
            $('#cart-btn').click(function () {
                const productId = $(this).data('product-id');
                const quantity = $("#qty").val();
                @auth
                // For logged-in users - make AJAX call directly
                addToCart(productId, quantity);
                @else
                $('#guestCartModal').modal('show');
                @endauth

            });


            $('#continueAsGuest').click(function () {
                const productId = $('#cart-btn').data('product-id');
                const quantity = $("#qty").val();
                addToCart(productId, quantity);
                $('#guestCartModal').modal('hide');

            });


            function addToCart(productId, quantity) {

                $.ajax({
                    url: '{{ route("addToCart") }}',
                    method: 'POST',
                    data: {
                        product_id: productId,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}'
                    },

                    success: function (response) {
                        alert('Product added to cart!');
                    },
                    error: function (xhr) {
                        alert('Error adding product to cart');

                    }

                });

            }



    const whatsappNumber = '01751359305';
    const messengerPageUsername = 'your.facebook.page.username'; // Your Facebook Page username

    // --- WhatsApp Button Click Handler ---
    $('#open-whatsapp').on('click', function() {
       
        const productName = $(this).data('name');
        const productPrice = $(this).data('price');
        const productUrl = window.location.href;
        const message = encodeURIComponent(
            `Hello, I'm interested in this product:\n\n` +
            `*Product:* ${productName}\n` +
            `*Price:* TK ${productPrice}\n\n` +
            `*Link:* ${productUrl}`
        );

        const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${message}`;

        console.log(whatsappUrl);
        window.open(whatsappUrl, '_blank');
    });


    // --- Messenger Button Click Handler ---
    $('#open-messenger').on('click', function() {
        const productName = $(this).data('name');
        const messengerUrl = `https://m.me/${messengerPageUsername}`;
        window.open(messengerUrl, '_blank');
        alert(
            `We've opened Messenger for you.\n\n` +
            `Please ask us about the product: "${productName}"`
        );
    });


        function getLinkWhastapp(number, message) {
            var url = 'https://api.whatsapp.com/send?phone=' 
                + number 
                + '&text=' 
                + encodeURIComponent(message)
            return url
        }

    });





        @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.options.timeOut = 10000;
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.options.timeOut = 10000;
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.options.timeOut = 10000;
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.options.timeOut = 10000;
                toastr.error("{{ Session::get('message') }}");
                break;
        }

        @endif
</script>

@endpush