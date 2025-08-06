<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your business description here - highlighting key services and benefits.">
    <title>Your Business Name | Welcome</title>
    <!-- Link to CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Optional: Link to a font library like Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
        /* Banner Styles (Add to existing CSS) */
        .banner {
            /* Common styles for both banners */
            height: 80vh; /* Example height */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .banner::before { /* Overlay for text readability */
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* Adjust opacity */
            z-index: 1;
        }

        .banner-content {
            position: relative; /* Ensure content is above overlay */
            z-index: 2;
            max-width: 800px;
            padding: 20px;
        }

        /* Specific Banner 1 */
        .banner-1 {
            background-image: url('images/your-hero-image.jpg'); /* Optimized image */
        }
        .banner-1 h1 { /* Ensure headings are white */
            color: #fff;
            font-size: 3rem; /* Adjust size as needed */
        }
        .banner-1 p {
            font-size: 1.2rem;
        }


        /* Specific Banner 2 */
        .banner-2 {
            background-image: url('images/your-services-bg.jpg'); /* Another optimized image or solid color */
            height: auto; /* Allow height to adjust */
            min-height: 60vh; /* Minimum height */
            padding: 60px 0; /* Vertical padding */
            background-color: #2c3e50; /* Example: Use a dark color if no image */
        }
        .banner-2 h2 {
            color: #fff; /* White heading */
            margin-bottom: 2rem;
        }

        .service-highlight-grid {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px; /* Spacing between items */
        }

        .highlight-item {
            flex: 1;
            min-width: 220px; /* Minimum width */
            max-width: 300px; /* Max width */
            background-color: rgba(255, 255, 255, 0.15); /* Light transparent background */
            padding: 25px 20px;
            border-radius: 8px;
            text-align: center;
            color: #fff; /* White text */
            transition: transform 0.2s ease-in-out;
        }
        .highlight-item:hover {
            transform: translateY(-5px); /* Subtle lift on hover */
        }

        .highlight-item img {
            width: 60px;
            height: 60px;
            margin-bottom: 1rem;
            filter: brightness(0) invert(1); /* Make icons white */
        }

        .highlight-item h3 {
            color: #fff; /* White titles */
            margin-bottom: 0.5rem;
        }

        .highlight-item p {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.9); /* Slightly faded white */
        }

        /* Responsive adjustments for banners */
        @media (max-width: 768px) {
            .banner { height: 60vh; }
            .banner h1 { font-size: 2.5rem; }
            .banner p { font-size: 1.1rem; }

            .service-highlight-grid {
                flex-direction: column; /* Stack items vertically */
                align-items: center;
            }
            .highlight-item {
                max-width: 90%; /* Wider items on mobile */
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <div class="container">
        <div class="logo">
            <a href="/">YourBusinessName</a>
        </div>
        <nav>
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Banner 1 (Hero) -->
<section class="banner banner-1">
    <div class="banner-content">
        <h1>Your Business Name | Your Core Benefit</h1>
        <p>A short, impactful tagline explaining what you do and for whom.</p>
        <a href="#services" class="btn btn-primary">Explore Our Offerings</a>
    </div>
</section>

<!-- ... Other Sections (About, etc.) ... -->

<!-- Banner 2 (Services/Highlights) -->
<section id="services" class="banner banner-2">
    <div class="banner-content">
        <h2>Key Services We Provide</h2>
        <div class="service-highlight-grid">
            <div class="highlight-item">
                <img src="images/icon-service-1.png" alt="Service 1">
                <h3>Service Title One</h3>
                <p>Brief description emphasizing the benefit.</p>
            </div>
            <div class="highlight-item">
                <img src="images/icon-service-2.png" alt="Service 2">
                <h3>Service Title Two</h3>
                <p>Brief description emphasizing the benefit.</p>
            </div>
            <div class="highlight-item">
                <img src="images/icon-service-3.png" alt="Service 3">
                <h3>Service Title Three</h3>
                <p>Brief description emphasizing the benefit.</p>
            </div>
        </div>
        <a href="#contact" class="btn btn-secondary">Get a Custom Quote</a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section">
    <div class="container">
        <h2>About Us</h2>
        <p>
            Provide a brief, engaging description of your business.
            What problem do you solve? What is your mission or vision?
            Keep it concise and customer-focused.
        </p>
        <div class="about-features">
            <div class="feature-item">
                <img src="images/icon-quality.png" alt="Quality Icon"> <!-- Placeholder -->
                <h3>Quality Focused</h3>
                <p>We are committed to delivering the highest quality products/services.</p>
            </div>
            <div class="feature-item">
                <img src="images/icon-innovation.png" alt="Innovation Icon"> <!-- Placeholder -->
                <h3>Innovative Solutions</h3>
                <p>Leveraging the latest technology for cutting-edge results.</p>
            </div>
            <div class="feature-item">
                <img src="images/icon-support.png" alt="Support Icon"> <!-- Placeholder -->
                <h3>Customer Support</h3>
                <p>Dedicated support to ensure your satisfaction.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section / Banner 2 -->
<section id="services" class="banner banner-2">
    <div class="banner-content">
        <h2>Our Core Services</h2>
        <div class="service-list">
            <div class="service-item">
                <img src="images/icon-service-1.png" alt="Service 1 Icon"> <!-- Placeholder -->
                <h3>Service One</h3>
                <p>Brief description of the first key service.</p>
            </div>
            <div class="service-item">
                <img src="images/icon-service-2.png" alt="Service 2 Icon"> <!-- Placeholder -->
                <h3>Service Two</h3>
                <p>Brief description of the second key service.</p>
            </div>
            <div class="service-item">
                <img src="images/icon-service-3.png" alt="Service 3 Icon"> <!-- Placeholder -->
                <h3>Service Three</h3>
                <p>Brief description of the third key service.</p>
            </div>
        </div>
        <a href="#contact" class="btn btn-secondary">Get a Quote</a>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <h2>Get In Touch</h2>
        <p>Have questions or want to discuss your needs? Contact us!</p>
        <div class="contact-info">
            <p><strong>Email:</strong> <a href="mailto:info@yourbusiness.com">info@yourbusiness.com</a></p>
            <p><strong>Phone:</strong> <a href="tel:+1234567890">+1 (234) 567-890</a></p>
            <p><strong>Address:</strong> 123 Business St, Suite 100, City, State, ZIP</p>
        </div>
        <!-- Optional: Simple contact form -->
        <form action="/submit-contact" method="POST" class="contact-form">
            <!-- CSRF Token for Laravel -->
            {{-- @csrf --}}
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <p>© 2023 Your Business Name. All rights reserved.</p>
        <div class="social-links">
            <a href="#" aria-label="Facebook">FB</a>
            <a href="#" aria-label="Twitter">TW</a>
            <a href="#" aria-label="LinkedIn">LI</a>
        </div>
    </div>
</footer>



@foreach($menuCategories as $category)
    <li class="menu-item">
        <a href="#">{{ $category->title }}</a>

        @if($category->subcategories->count())
            <ul class="sub-menu">
                @foreach($category->subcategories as $subcategory)
                    <li class="menu-item">
                        <a href="#">
                            {{ $subcategory->title }}
                        </a>

                        @if($subcategory->subSubcategories->count())
                            <ul class="sub-sub-menu">
                                @foreach($subcategory->subSubcategories as $subSubcategory)
                                    <li class="menu-item">
                                        <a href="#">
                                            {{ $subSubcategory->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach

<!-- Optional: JavaScript for smoother scrolling or animations -->
<!-- <script src="js/scripts.js"></script> -->
</body>
</html>