@extends('frontend.layouts.app')
@section('title', 'Terms And Condition')
@section('content')

<!-- Main Content -->
<div class="container">
    <div class="terms-container">
        <div class="terms-header">
            <h1><i class="fas fa-file-contract mr-2"></i>Terms & Conditions</h1>
            <p class="text-muted">Last updated: January 1, 2025</p>
        </div>

        <div class="terms-content">
            <p>Welcome to <strong>YourStore</strong>. By accessing or using our website, you agree to comply with and be bound by the following terms and conditions.</p>

            <h2>1. General Terms</h2>
            <p>By accessing and placing an order with YourStore, you confirm that you are at least 18 years old and have the legal capacity to enter into a binding contract.</p>

            <h2>2. Products & Services</h2>
            <p>We reserve the right to limit or prohibit orders that appear to be placed by dealers, resellers, or distributors.</p>
            <div class="highlight">
                <p><strong>Note:</strong> Product descriptions and prices are subject to change without notice.</p>
            </div>

            <h2>3. Order Acceptance & Payment</h2>
            <p>Your receipt of an order confirmation does not signify our acceptance of your order. We reserve the right to refuse any order.</p>
            <ul>
                <li>We accept payments via credit/debit cards, PayPal, and other methods as displayed.</li>
                <li>All payments are processed securely.</li>
            </ul>

            <h2>4. Shipping & Delivery</h2>
            <p>Shipping times are estimates and not guaranteed. We are not responsible for delays caused by carriers or unforeseen circumstances.</p>

            <h2>5. Returns & Refunds</h2>
            <p>Our return policy lasts 30 days. To be eligible for a return, your item must be unused and in its original packaging.</p>

            <h2>6. Intellectual Property</h2>
            <p>All content on this website (images, text, logos) is the property of YourStore and protected by copyright laws.</p>

            <h2>7. Limitation of Liability</h2>
            <p>YourStore shall not be liable for any indirect, incidental, or consequential damages arising from the use of our products.</p>

            <h2>8. Governing Law</h2>
            <p>These terms shall be governed by and construed in accordance with the laws of [Your Country/State].</p>

            <h2>9. Changes to Terms</h2>
            <p>We reserve the right to modify these terms at any time. Changes will be posted on this page.</p>

            <h2>10. Contact Us</h2>
            <p>If you have any questions about these Terms, please contact us at:</p>
            <address>
                <strong>B2BStore</strong><br>
                Email: <a href="mailto:hello@b2bplatformbd.com">hello@b2bplatformbd.com</a><br>
                Phone: 01824929282
            </address>
        </div>
    </div>
</div>





@endsection

@push('styles')
<style>
    .terms-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 30px;
        margin-bottom: 30px;
    }
    .terms-header {
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }
    h1 {
        color: #333;
        font-weight: 700;
    }
    h2 {
        color: #444;
        margin-top: 25px;
        font-size: 1.5rem;
    }
    p, li {
        color: #666;
        line-height: 1.6;
    }
    .highlight {
        background-color: #f8f9fa;
        padding: 15px;
        border-left: 4px solid #007bff;
        margin: 15px 0;
    }
</style>
@endpush

@push('scripts')

@endpush
