@foreach ($cartItems as $item)
    <div class="product">
        <div class="product-details">
            <h4 class="product-title">
                <a href="#">{{ $item->products->name }}</a>
            </h4>

            <span class="cart-product-info">
                <span class="cart-product-qty">{{ $item->quantity }}</span> × ${{ number_format($item->products->price, 2) }}
            </span>
        </div>

        <figure class="product-image-container">
            <a href="#" class="product-image">
                <img src="{{ asset('storage/'.$item->products->image) }}" alt="product" width="80" height="80">
            </a>

            <a href="javascript:;" class="btn-remove remove-cart" data-id="{{ $item->id }}" title="Remove Product"><span>×</span></a>
        </figure>
    </div>
@endforeach
