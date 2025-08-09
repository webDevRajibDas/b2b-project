<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Temp Order Box</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .temp-order-card { border-radius: 12px; box-shadow: 0 8px 20px rgba(50,50,93,0.08), 0 2px 6px rgba(0,0,0,0.06); overflow: hidden; }
        .product-thumb { width: 72px; height: 72px; object-fit: cover; border-radius: 8px; }
        .tag { background: #f1f5f9; color: #334155; font-size: 12px; padding: 4px 8px; border-radius: 999px; }
        .whatsapp-btn { background: #25D366; color: #fff; }
        .messenger-btn { background: #0084FF; color: #fff; }
        .muted-small { font-size: 13px; color: #6b7280; }
    </style>
</head>
<body>
<div class="container py-4">
    <div class="card temp-order-card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h5 class="mb-1">Order #<span id="order-number">12345</span></h5>
                    <div class="muted-small">Placed: <span id="order-date">2025-08-09</span></div>
                </div>
                <div class="text-right"><div class="tag">Temp Order</div></div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-8">
                    <ul class="list-unstyled mb-0" id="product-list">
                        <li class="media py-2">
                            <img src="https://placehold.co/72x72/png?text=Item1" class="mr-3 product-thumb" alt="product">
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong class="d-block">Awesome Headphones</strong>
                                        <small class="muted-small">Qty: <span class="prod-qty">1</span> • Price: <span class="prod-price">$79.00</span></small>
                                    </div>
                                    <div class="text-right">
                                        <small class="muted-small">Subtotal</small>
                                        <div><strong>$79.00</strong></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="media py-2">
                            <img src="https://placehold.co/72x72/png?text=Item2" class="mr-3 product-thumb" alt="product">
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong class="d-block">USB-C Charger</strong>
                                        <small class="muted-small">Qty: <span class="prod-qty">2</span> • Price: <span class="prod-price">$19.50</span></small>
                                    </div>
                                    <div class="text-right">
                                        <small class="muted-small">Subtotal</small>
                                        <div><strong>$39.00</strong></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-4 text-center">
                    <div class="mb-2">
                        <div class="muted-small">Customer</div>
                        <div><strong id="customer-name">John Doe</strong></div>
                        <div class="muted-small">Mobile: <a href="#" id="mobile-link">+880123456789</a></div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12 d-flex flex-column">
                            <button id="open-messenger" class="btn messenger-btn btn-sm mb-1">Send via Messenger</button>
                            <button id="open-whatsapp" class="btn whatsapp-btn btn-sm">Send via WhatsApp</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="muted-small">Notes</small>
                    <div id="order-notes">Deliver between 10am-5pm. Call on arrival.</div>
                </div>
                <div class="text-right">
                    <div class="muted-small">Total</div>
                    <h5 id="order-total">$118.00</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function buildMessage() {
        const orderNo = $('#order-number').text().trim();
        const customer = $('#customer-name').text().trim();
        const notes = $('#order-notes').text().trim();
        const total = $('#order-total').text().trim();
        const products = [];
        $('#product-list li.media').each(function(){
            const title = $(this).find('strong').first().text().trim();
            const qty = $(this).find('.prod-qty').text().trim();
            const price = $(this).find('.prod-price').text().trim();
            products.push(`${title} (x${qty}) - ${price}`);
        });
        return `Order No: ${orderNo}\nCustomer: ${customer}\n\nItems:\n${products.join('\n')}\n\nTotal: ${total}\nNotes: ${notes}`;
    }
    $('#open-whatsapp').click(function(){
        const mobile = $('#mobile-link').text().replace(/[^+0-9]/g, '');
        window.open(`https://wa.me/${mobile.replace(/^\+/, '')}?text=${encodeURIComponent(buildMessage())}`, '_blank');
    });
    $('#open-messenger').click(function(){
        const mobile = $('#mobile-link').text().replace(/[^+0-9]/g, '');
        alert('Open Messenger for number: ' + mobile); // Replace with Messenger API logic
    });
</script>
</body>
</html>
