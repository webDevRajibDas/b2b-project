@extends('frontend.layouts.app')
@section('title')
    View Cart
@endsection
@section('content')

    <div class="text-center page-header" style="background-image: url({{asset('assets/images/page-header-bg.jpg')}})">
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
                                    @if($item)
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('storage/'.$item->attributes->image)}}" alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="#">{{$item->name}}</a>
                                                    </h3><!-- End .product-title -->

                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">{{$item->price}}</td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control cart-quantity-input"
                                                           value="{{$item->quantity}}" min="1" max="10" step="1"
                                                           data-decimals="0" data-product-id=""
                                                           data-update-url="" required
                                                    >
                                                </div>
                                            </td>

                                            <td class="total-col" id="total" style="font-size: 12px;">
                                                ৳ {{ number_format($item->quantity * $item->price,2)}}
                                            </td>

                                            <td class="remove-col">
                                                <button type="button" class="btn-remove remove-from-cart"
                                                        data-product-id="{{$item->id}}"
                                                        data-remove-url="">
                                                    <i class="icon-close"></i>
                                                </button>
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
                                    <td id="grand-total">{{$total}} Tk</td>
                                </tr><!-- End .summary-subtotal -->
                                <tr class="summary-total">
                                    <td>Total:</td>
                                    <td>৳ :{{$total}}</td>
                                </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{route('cart.checkout')}}"
                               class="btn btn-outline-primary-2 btn-order btn-block"
                               id="proceedToCheckout">
                                PROCEED TO CHECKOUT
                            </a>
                        </div><!-- End .summary -->

                        <a href="#"
                           class="mb-3 btn btn-outline-dark-2 btn-block"><span>CONTINUE SHOPPING</span><i
                                    class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->


    <!-- Modal for guest users -->
    <div class="modal fade" id="loginRequiredModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 20px">
                <div class="modal-header">
                    <h5 class="modal-title">Login Required</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You need to login or register to proceed to checkout.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Continue Shopping</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('change', '.cart-quantity-input', function () {
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
                    success: function (response) {
                        if (response.success) {
                            const newTotal = parseFloat(response.subtotal.replace(/,/g, ''));
                            console.log(newTotal);
                            $(`#total-${productId}`).text(newTotal);
                            $('#grand-total').text(response.grand_total);

                        } else {
                            console.log('Failed to update cart');
                        }
                    },
                    error: function () {
                        console.log('Error updating cart');
                    }
                });
            });


            $(document).on('click', '.remove-from-cart', function (e) {
                e.preventDefault();
                const button = $(this);
                const productId = button.data('product-id');
                const url = button.data('remove-url');

                if (confirm("Are you sure want to remove product from the cart.")) {
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: {
                            product_id: productId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                button.closest('tr').remove();
                                window.location.reload();
                            }
                        },
                        error: function () {
                            alert('Failed to remove item from cart.');
                        }
                    });
                }
            });



            $(".remove-from-cart").click(function(e) {
                e.preventDefault();

                var ele = $(this);

                if (confirm("Are you sure want to remove product from the cart.")) {
                    $.ajax({
                        url: '{{ url("remove-from-cart") }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.attr("data-id")
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });

        });



        document.addEventListener('DOMContentLoaded', function () {
            const checkoutBtn = document.getElementById('proceedToCheckout');
            checkoutBtn.addEventListener('click', function (e) {
                e.preventDefault();
                window.location.href = "{{ route('cart.checkout') }}";
            });
        });

        

        $(document).on('click', '.removeFromCart', function(e) {
            e.preventDefault();
            var itemId = $(this).closest('.cart-item').data('id'); // Get item ID

            $.ajax({
                url: '/cart/remove/' + itemId, // Your Laravel route
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(response) {
                    // Remove the item's HTML element from the DOM
                    $(`div.cart-item[data-id="${itemId}"]`).remove();
                    // Optionally, update cart total or display a success message
                    console.log(response.message);
                },
                error: function(xhr) {
                    console.error('Error removing item:', xhr.responseText);
                }
            });
        });

        $('.update-btn').on('click', function() {
            var button = $(this);
            var productId = button.data('product-id');
            var quantity = button.closest('td').find('.quantity-input').val();

            button.find('.update-text').addClass('d-none');
            button.find('.updating-text').removeClass('d-none');

            // Make an AJAX request to update the product to the cart
            $.ajax({
                type: 'POST',
                url: '{{ route('update.cart') }}',
                data: {
                    product_id: productId,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    button.find('.updating-text').addClass('d-none');
                    button.find('.updated-text').removeClass('d-none');
                    location.reload();
                },
                error: function(error) {
                    console.error('Error updating product to cart:', error);
                }
            });
        });


        

    </script>
@endpush