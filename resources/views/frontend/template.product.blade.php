<div class="product text-center">
    <figure class="product-media">
        <a href="{{ route('product.show', $ictProduct->slug) }}">
            <img src="{{ asset('storage/'.$ictProduct->image) }}" alt="Product image" class="product-image">
        </a>

        <div class="product-action-vertical">
            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><span>add to wishlist</span></a>
            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
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
        <div class="ratings-container">
            <div class="ratings">
                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
            </div><!-- End .ratings -->
            <span class="ratings-text">( 12 Reviews )</span>
        </div><!-- End .rating-container -->
    </div><!-- End .product-body -->
</div>





















