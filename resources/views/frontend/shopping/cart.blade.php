@extends('frontend.shopping.layouts.page')

@section('content')
    <div class="container">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li class="active">
                <a href="{{route('view.cart')}}">Shopping Cart</a>
            </li>
            <li>
                <a href="{{route('checkouts')}}">Checkout</a>
            </li>
            <li class="disabled">
                <a href="#">Order Complete</a>
            </li>
        </ul>

        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th class="thumbnail-col"></th>
                                    <th class="product-col">Product</th>
                                    <th class="price-col">Price</th>
                                    <th class="qty-col">Quantity</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                        <tbody>
                            @forelse($cartItems ?? [] as $data)
                                <tr class="product-row" data-product-id="{{$data->product->id}}">
                                    <td>
                                        <figure class="product-image-container">
                                            <a href="#" class="product-image">
                                                <img src="{{asset('storage/'.$data->product->image)}}"
                                                     alt="product">
                                            </a>
                                            <a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
                                        </figure>
                                    </td>
                                    <td class="product-col">
                                        <h5 class="product-title">
                                            <a href="#">{{ $data->product->name }}</a>
                                        </h5>
                                    </td>
                                    <td class="product-price">{{ number_format($data->product->price, 2) }}</td>
                                    <td>
                                        <div class="product-cart-total">
                                            <input type="text" value="{{$data->quantity}}" class="form-control cart-quantity" name="cart-quantity">
                                        </div><!-- End .product-single-qty -->
                                    </td>
                                    <td class="text-right subtotal-price">{{ number_format($data->product->price * $data->quantity, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Your cart is empty</td>
                                </tr>
                            @endforelse
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="5" class="clearfix">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- End .cart-table-container -->
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>CART TOTALS</h3>
                    <table class="table table-totals">
                        <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td id="cart_totals"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-left">
                                <h4>Shipping</h4>

                                <div class="form-group form-group-custom-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="radio"
                                               checked>
                                        <label class="custom-control-label">Local pickup</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-group -->

                                <div class="form-group form-group-custom-control mb-0">
                                    <div class="custom-control custom-radio mb-0">
                                        <input type="radio" name="radio" class="custom-control-input">
                                        <label class="custom-control-label">Flat rate</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-group -->

                            </td>
                        </tr>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td id="totalAmount"></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <a href="{{route('checkouts')}}" class="btn btn-block btn-dark">Proceed to Checkout
                            <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div><!-- End .cart-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->


    <!-- End .main -->
@endsection


@push('custom-script')
    <script>

        $(document).ready(function() {

            $("input[name='cart-quantity']").TouchSpin({
                buttondown_class: "btn btn-outline btn-down-icon",
                buttonup_class: "btn btn-outline btn-up-icon",
                min: 1,
                max: 100,
                stepinterval: 50,
                maxboostedstep: 10000000,
            });

            // Event delegation for increment and decrement buttons
            $('div.product-cart-total').off('click', '.btn-down-icon, .btn-up-icon').on('click', '.btn-down-icon, .btn-up-icon', function(e) {
                e.preventDefault();

                const $row = $(this).closest('.product-row');
                const $quantityInput = $row.find('.cart-quantity');
                const $price = $row.find('.product-price');
                const $subtotal = $row.find('.subtotal-price');
                let quantity = parseInt($quantityInput.val()) || 0;
                const price = parseFloat($price.text().replace(/,/g, ''));

                $quantityInput.val(quantity);
                const subtotal = quantity * price;
                $subtotal.text(subtotal.toLocaleString('en-US', { minimumFractionDigits: 2 }));

                updateTotalPrice('#cart_totals');
                updateTotalPrice('#totalAmount');

                updateSubtotalServer($row.data('product-id'), quantity);

            });
            updateTotalPrice('#cart_totals');
            updateTotalPrice('#totalAmount');
            function updateTotalPrice(tagID) {
                let total = 0;
                $('.subtotal-price').each(function () {
                    total += parseFloat($(this).text().replace(/,/g, '')) || 0;
                });

                $(tagID).text(total.toLocaleString('en-US', { minimumFractionDigits: 2 }));
            }


            function updateSubtotalServer(productId, quantity) {
                console.log(productId)
                console.log(quantity)

                $.ajax({
                    url: '/update-subtotal',
                    type: 'POST',
                    data: {
                        product_id: productId,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('Subtotal updated on server:', response);
                        if (response.success) {
                            console.log('Subtotal updated on server:', response.subtotal);
                            // Update the subtotal on the frontend
                            $(`tr[data-product-id="${productId}"] .subtotal-price`).text(response.subtotal);
                        } else {
                            console.log('Error:', response.message);
                        }
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            }
        });



        $(document).on('click', '.remove-cart', function (e) {
            e.preventDefault();
            const productId = $(this).data('id');
            if (!productId) {
                alert('Product ID is missing. Cannot remove the item.');
                return;
            }
            if (!confirm('Are you sure you want to remove this product from the cart?')) {
                return;
            }
            $.ajax({
                url: `/cart/remove/${productId}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    alert('Product removed successfully!');
                    location.reload();
                },
                error: function () {
                    alert('Failed to remove the product. Please try again.');
                }
            });
        });

    </script>
@endpush