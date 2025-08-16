{{-- This partial receives a $product variable --}}
<div class="col-6 col-md-4 col-lg-4 col-xl-3">
    <div class="product">
        <figure class="product-media">
            @if($product->on_sale)
                <span class="product-label label-sale">Sale</span>
            @endif
            <a href="{{ route('product.show', $product->slug) }}">
                {{-- Use a placeholder if the image is missing --}}
                <img style="height: 275px;" src="{{ asset('storage/'.$product->image) ?? asset('path/to/placeholder.jpg') }}" alt="{{ $product->name }}" class="product-image img-thumbnail img-fluid">
            </a>

            <div class="product-action-vertical">
                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
            </div>

            <div class="product-action action-icon-top">
                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                <a href="#" class="btn-product-icon btn-quickview" title="Quick view" data-product-id="{{ $product->id }}">
                    <span>Quick view</span>
                </a>
            </div>
        </figure>

        <div class="product-body">
            <div class="product-cat">
                {{-- Eager load the category to avoid N+1 issues --}}
                <a href="#">{{ $product->category->title ?? 'Uncategorized' }}</a>
            </div>
            <h3 class="product-title"><a href="{{ route('product.show', $product->slug) }}">{{$product->name}}</a></h3>
            <div class="product-price">
                ৳&nbsp;{{ number_format($product->sale_price, 2) }}
            </div>
            <div class="ratings-container">
                <div class="ratings">
                    <div class="ratings-val" style="width: 0%;"></div>
                </div>
                <span class="ratings-text">( 0 Reviews )</span>
            </div>

            <div class="product-nav product-nav-dots">
                <a href="#" style="background: #cc9966;"><span class="sr-only">Color name</span></a>
                <a href="#" class="active" style="background: #ebebeb;"><span class="sr-only">Color name</span></a>
            </div>
        </div>
    </div>
</div>