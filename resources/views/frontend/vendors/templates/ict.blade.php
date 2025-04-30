@extends('frontend.ict.layouts.page')
@section('title', 'B2B ICT Products')
@section('content')

    <!-- YouTube Video Section -->

    <div class="container-fluid">
        <div class="video-hero jquery-background-video-wrapper demo-video-wrapper">
            <video class="jquery-background-video" autoplay muted loop poster="https://d2ezlykacdqcnj.cloudfront.net/_assets/home-video/beach-waves-loop.jpg">
                <source src="{{asset('assets/ict/smart-card.mp4')}}" type="video/mp4">
            </video>
            <div class="video-overlay"></div>
            <div class="page-width">
                <div class="video-hero--content">
                    <div class="video-hero--content-inner">
                        <h2>Background Video Demo</h2>
                        <p>Full width video hero</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="video-section py-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe27d 100%);">
        <div class="container">
            <img src="{{asset('assets/ict/images/digital-card-banner.jpg')}}" alt="B2B digital-card-banner" class="img-thumbnail img-fluid">
        </div>
    </section>
    <div class="products-container appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
        <div class="container-lg container">
            <h2 class="section-title text-center text-uppercase appear-animate mb-4 mt-4"
                data-animation-name="fadeInUpShorter" data-animation-delay="200">Our Products (Smart Card)</h2>
        </div>

        <div class="container">
            <div class="row">
                @forelse($cards as $data)
                    <div class="col-md-4">
                        <a href="{{ route('card.show', $data->slug) }}">
                            <div class="product-card">
                                <div class="product-tumb">
                                    <img src="{{ asset('storage/' . $data->image) }}" alt="B2B Smart Card">
                                </div>
                                <div class="product-details">
                                    <span class="product-catagory">
                                         @if($data->cardCategory && $data->cardCategory->name)
                                            {{ $data->cardCategory->name }}
                                        @else
                                            Uncategorized
                                        @endif
                                    </span>
                                    <h5><a href="{{ route('card.show', $data->slug) }}">{{$data->title}}</a></h5>
                                    <div class="product-bottom-details">
                                        <div class="product-price"><img width="12" src="{{asset('assets/ict/images/taka-sign.svg')}}" alt=""> : <small>{{$data->price}}</small>{{$data->sale_price}}</div>
                                        <div class="product-links">
                                            <a href="{{ route('card.show', $data->slug) }}" class="btn card-buy-button">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="text-center w-100">
                        <p class="text-muted">No Data Available !!</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>





    <section class="section section-default border-0"
             style="box-shadow: rgba(0, 0, 0, 0.16) 0 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 match-height p-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                <div class="video-container shadow-lg rounded-lg overflow-hidden">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/lEQlcAkOCGU?si=gRVvCYzTlqtfL53r"
                                allowfullscreen
                                title="Featured Video"></iframe>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
                <section class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h2 class="font-weight-normal text-7 mb-2">Frequently Asked <strong class="font-weight-extra-bold">Questions</strong></h2>
                                <hr class="solid my-3">
                                <div class="toggle toggle-primary" data-plugin-toggle>
                                    <section class="toggle active">
                                        <a class="toggle-title">Does the other person need Info Card?</a>
                                        <div class="toggle-content">
                                            <p>No! When someone taps your Info Digital Smart Card or scans your QR code your profile will instantly appear on their device via a web browser. No app is needed for them to receive your information.</p>
                                        </div>
                                    </section>

                                    <section class="toggle">
                                        <a class="toggle-title">How does Info work?</a>
                                        <div class="toggle-content">
                                            <p>Our product is Digital Smart Business Card, Employee card, Unity Card, Freelancer Card and Smart Student Card. Our cards have a built-in NFC chip. When you purchase a card, you have to create a profile. In your profile you may include name, designation, company name, website, social media links, address, email, phone number, profile picture etc.
                                                Once the profile is set your card is ready to use. Whenever you want to share your contact information with someone, just tap the card with his/her smartphone and your profile will show up on their screen. The other person does not need any app. They can then save your contact information and also send their contact information in your email.
                                                You can change your profile information anytime. The tap function only works with NFC enabled smartphones. If a smartphone does not have NFC then QR Code will work the same way.</p>
                                        </div>
                                    </section>

                                    <section class="toggle">
                                        <a class="toggle-title">What phones are compatible? </a>
                                        <div class="toggle-content">
                                            <p>Many modern smartphones are equipped with Near Field Communication (NFC) capabilities, including.
                                                •	Apple iPhone 7 and newer
                                                •	Samsung Galaxy S7 and newer
                                                •	Google Pixel 2 and newer
                                                •	Huawei P30 and newer
                                                •	LG G6 and newer
                                                •	Sony Xperia XZ2 and newer
                                                •	OnePlus 6 and newer
                                                This list is not exhaustive, and many other phone models may also have NFC capabilities. To be sure, you can check the specifications of your device or consult the manufacturer’s website.</p>
                                        </div>
                                    </section>

                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </section>




    <section class="section section-default border-0"
             style="box-shadow: rgba(0, 0, 0, 0.16) 0 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 match-height p-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                    <div class="embed-responsive embed-responsive-9by16">
                        <iframe class="embed-responsive-item" src="{{asset('assets/ict/promo-video.mp4')}}"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
                    <section class="card">
                        <div class="card-header display-5 bg-info text-white">
                            কার্ডের বৈশিষ্ট্য
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">অনুমোদিত মেম্বারশিপ কার্ড:</h5>
                            <p class="card-text">আপনি B2B প্ল্যাটফর্মের অনুমোদিত ডিলার বা রিটেইলার হিসেবে পার্টটাইম বা ফুলটাইম কাজ করার সুযোগ পাবেন।</p>


                            <h5 class="card-title">ডিজিটাল পরিচয়:</h5>
                            <p class="card-text">প্রত্যেক অনুমোদিত ডিলার বা রিটেইলার Info Uddokta Card-কে তাদের ডিজিটাল পরিচয়পত্র হিসেবে ব্যবহার করতে পারবেন।</p>


                            <h5 class="card-title"> বিনা পুঁজি বা অল্প পুঁজিতে ব্যবসার সুযোগ:</h5>
                            <p class="card-text"> উদ্যোক্তারা এই কার্ড ব্যবহার করে নিজের স্বাধীনভাবে ব্যবসা শুরু করতে পারবেন, এমনকি পুঁজির ঘাটতি থাকলেও।</p>


                            <h5 class="card-title"> বিনামূল্যে স্কিল ডেভেলপমেন্ট:</h5>
                            <p class="card-text"> উদ্যোক্তাদের জন্য রয়েছে সম্পূর্ণ ফ্রি স্কিল ডেভেলপমেন্ট প্রশিক্ষণের সুবিধা, যা তাদের দক্ষতা উন্নয়নে সহায়ক হবে।</p>


                            <h5 class="card-title"> প্রিভিলেজ সুবিধা:</h5>
                            <p class="card-text">  কার্ডধারীরা বিশেষ প্রিভিলেজ সুবিধা পাবেন, যেমন ডিসকাউন্ট, বিশেষ অফার বা এক্সক্লুসিভ অ্যাক্সেস</p>



                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>





    <section class="section section-default border-0"
             style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
        <div class="container">
            <div class="row">
                <div class="col mt-5 mb-2">

                    <h4 class="mb-2">Ordering Process To Smart Card</h4>
                    <div class="row process my-5">
                        <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation"
                             data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                            <div class="process-step-circle">
                                <strong class="process-step-circle-content"><i
                                            class="icons icon-user text-5 text-primary"></i></strong>
                            </div>
                            <div class="process-step-content">
                                <h4 class="mb-1 text-5 font-weight-bold">First Step : Order</h4>
                                <p class="mb-0">Just place an order form website or contact on
                                    <strong>WhatsApp:</strong>
                                    <br> <a href="tel:+8801751359305" class="text-primary">+8801751359305</a>
                                    <br> <a href="tel:+8801824929282" class="text-primary">+8801824929282</a>
                                </p>
                            </div>
                        </div>
                        <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation"
                             data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                            <div class="process-step-circle">
                                <strong class="process-step-circle-content"><i
                                            class="icons icon-layers text-5 text-primary"></i></strong>
                            </div>
                            <div class="process-step-content">
                                <h4 class="mb-1 text-5 font-weight-bold">Second Step : Design</h4>
                                <p class="mb-0">Designed with your own logo, colors, fonts and branding. Front and back
                                    side are customizable.</p>
                            </div>
                        </div>
                        <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation"
                             data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                            <div class="process-step-circle">
                                <strong class="process-step-circle-content"><i
                                            class="icons icon-screen-desktop text-5 text-primary"></i></strong>
                            </div>
                            <div class="process-step-content">
                                <h4 class="mb-1 text-5 font-weight-bold">Third Step : Setup</h4>
                                <p class="mb-0">After receiving the card, You can setup your own profile yourself.
                                    Please watch the video</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h4 class="display-8">Videos Gallery</h4>
            </div>
        </div>

        <div class="row">
            <!-- Video 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
                    <div class="embed-responsive embed-responsive-16by9 shadow-sm rounded video-height--500px">
                        <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/GhKoIL_44nI"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <!-- Video 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
                    <div class="embed-responsive embed-responsive-16by9 shadow-sm rounded video-height--500px">
                        <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/GhKoIL_44nI"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <!-- Video 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
                    <div class="embed-responsive embed-responsive-16by9 shadow-sm rounded video-height--500px">
                        <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/GhKoIL_44nI"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('custom-script')
    <script src="{{asset('assets/ict/player.min.js')}}"></script>
<script>

</script>


@endpush

@push('custom-css')

    <style>

        .video-height--500px{
            height: 500px;
        }
        .glass-effect {
            -webkit-backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
            width: 100%;
            max-width: 100%;
            color: white;
        }

        .embed-responsive-9by16 {
            padding-bottom: 120%;  /* 16 / 9 * 100 = 177.77% rounded to 160% for demonstration */
            height: 0;
            position: relative;
        }
        .embed-responsive-9by16 > * {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }


    </style>
@endpush

