@extends('frontend.layouts.app')
@section('title')
    View Cart
@endsection
@section('content')

    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($cartItems as $item)
                                    @if($item->product)
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('storage/'.$item->product->image)}}"
                                                                 alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="#">{{$item->product->name}}</a>
                                                    </h3><!-- End .product-title -->

                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">{{$item->product->sale_price}}</td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control cart-quantity-input" value="{{ (int)$item->quantity }}" min="1" max="10" step="1"
                                                               data-decimals="0" data-product-id="{{ $item->product->id }}" data-update-url="{{ route('update.cart') }}" required
                                                        >

                                                </div>
                                            </td>

                                            <td class="total-col" id="total-{{ $item->product->id }}">
                                                {{ $item->product->sale_price * (int)$item->quantity}}
                                            </td>

                                            <td class="remove-col">
                                                <button class="btn-remove"><i class="icon-close"></i></button>
                                            </td>
                                        </tr>
                                    @else
                                        <td colspan="5">Product no longer available</td>
                                    @endif

                                @endforeach

                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required placeholder="coupon code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i
                                                        class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->

                            <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i
                                        class="icon-refresh"></i></a>
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                <tr class="summary-subtotal">
                                    <td>Subtotal:</td>
                                    <td id="grand-total">{{$grandTotal}} Tk</td>
                                </tr><!-- End .summary-subtotal -->
                                <tr class="summary-shipping">
                                    <td>Shipping:</td>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr class="summary-shipping-row">
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="free-shipping" name="shipping"
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="free-shipping">Free
                                                Shipping</label>
                                        </div><!-- End .custom-control -->
                                    </td>
                                    <td>$0.00</td>
                                </tr><!-- End .summary-shipping-row -->

                                <tr class="summary-shipping-row">
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="standart-shipping" name="shipping"
                                                   class="custom-control-input">
                                            <label class="custom-control-label"
                                                   for="standart-shipping">Standart:</label>
                                        </div><!-- End .custom-control -->
                                    </td>
                                    <td>$10.00</td>
                                </tr><!-- End .summary-shipping-row -->

                                <tr class="summary-shipping-row">
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="express-shipping" name="shipping"
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="express-shipping">Express:</label>
                                        </div><!-- End .custom-control -->
                                    </td>
                                    <td>$20.00</td>
                                </tr><!-- End .summary-shipping-row -->

                                <tr class="summary-shipping-estimate">
                                    <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                                    <td>&nbsp;</td>
                                </tr><!-- End .summary-shipping-estimate -->

                                <tr class="summary-total">
                                    <td>Total:</td>
                                    <td>$160.00</td>
                                </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO
                                CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="category.html"
                           class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i
                                    class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('change', '.cart-quantity-input', function() {
                const input = $(this);
                const productId = input.data('product-id');
                const newQuantity = input.val();
                const updateUrl = input.data('update-url');
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                // AJAX request to update cart
                $.ajax({
                    url: updateUrl,
                    method: 'POST',
                    data: {
                        product_id: productId,
                        quantity: newQuantity,
                        _token: csrfToken
                    },
                    success: function(response) {
                        if (response.success) {
                            const newTotal = parseFloat(response.subtotal.replace(/,/g, ''));
                            console.log(newTotal);
                            $(`#total-${productId}`).text(newTotal);
                            $('#grand-total').text(response.grand_total);

                        } else {
                            console.log('Failed to update cart');
                        }
                    },
                    error: function() {
                        console.log('Error updating cart');
                    }
                });
            });
        });
    </script>
@endpush