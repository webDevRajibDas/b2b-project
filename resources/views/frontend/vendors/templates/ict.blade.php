@extends('frontend.ict.layouts.page')
@section('title', 'B2B ICT Products')
@section('content')

    <div class="slider-container rev_slider_wrapper" style="height: 570px;">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 670, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'enterpoint', 'speed': 1000, 'levels': [2,3,4,5,6,7,8,9,12,50], 'disable_onmobile': 'on' }, 'navigation' : {'arrows': { 'enable': false }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
            <ul>
                <li class="slide-overlay slide-overlay-primary" data-transition="fade">
                    <div class="rs-background-video-layer"
                         data-forcerewind="on"
                         data-volume="mute"
                         data-videowidth="100%"
                         data-videoheight="70%"
                         data-videomp4="{{asset('assets/ict/smart-card.mp4')}}"
                         data-videopreload="preload"
                         data-videoloop="loop"
                         data-forceCover="1"
                         data-aspectratio="16:9"
                         data-autoplay="true"
                         data-autoplayonlyfirsttime="false"
                         data-nextslideatend="false">
                    </div>

                </li>

            </ul>
        </div>
    </div>



    <!-- Full Width Section -->
    <section class="section section-default border-0"
             style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 match-height p-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                <div class="video-container">
                    <iframe width="560" height="315"
                            src="https://www.youtube-nocookie.com/embed/GhKoIL_44nI?si=tzE6Diwge9zojC0X"
                            title="B2B Smart Card" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
                <section class="card">
                    <div class="card-header text-6">B2B Smart Card</div>
                    <div class="card-body">
                        <h4 class="text-dark font-weight-bold text-4">B2B Smart Uddokta Card হলো অনুমোদিত B2B
                            এজেন্টদের পরিচয়পত্র, যা কমিশন সুবিধা ও স্বীকৃতি নিশ্চিত করে। এটি ফিজিক্যাল বা ডিজিটাল
                            হতে পারে । প্রয়োজনীয়তা:</h4>
                        <ul class="list list-icons list-icons-style-3 list-primary">
                            <li><i class="fas fa-check"></i> ফ্রি অনলাইন ও অফলাইন ট্রেনিং – দক্ষতা বৃদ্ধির জন্য
                                বিনামূল্যে প্রশিক্ষণ।
                            </li>
                            <li><i class="fas fa-check"></i> পার্ট টাইম ও ফুল টাইম কাজের সুযোগ – আকর্ষণীয় বেতন,
                                কমিশন ও ইনসেনটিভ
                            </li>
                            <li><i class="fas fa-check"></i> ২৪/৭ গাইডলাইন ও সাপোর্ট – ব্যবসায়িক সহায়তা সার্বক্ষণিক।
                            </li>
                            <li><i class="fas fa-check"></i> ফ্রিল্যান্সিং ক্যারিয়ারের সুযোগ – স্বাধীনভাবে উপার্জন ও
                                ক্যারিয়ার গড়ার সুযোগ।
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </section>


    <div class="products-container appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
        <div class="container-lg container">
            <h2 class="section-title text-center text-uppercase appear-animate mb-4"
                data-animation-name="fadeInUpShorter" data-animation-delay="200">Our Products (Smart Card)</h2>

        </div>

        <div class="container">
            <div class="row">
                @forelse($cards as $data)
                    <div class="col-md-4">
                        <a href="{{ route('card.show', $data->slug) }}">
                            <div class="product-card">
                                <div class="card-badge">Hot</div>
                                <div class="product-tumb">
                                    <img src="{{ asset('storage/' . $data->image) }}" alt="B2B Smart Card">
                                </div>
                                <div class="product-details">
                                    <span class="product-catagory">B2B Smart Card</span>
                                    <h5><a href="{{ route('card.show', $data->slug) }}">{{$data->title}}</a></h5>
                                    <div class="product-bottom-details">
                                        <div class="product-price">Price : <small>{{$data->price}}</small>{{$data->sale_price}}</div>
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
             style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
        <div class="container">
            <div class="row">
                <div class="col mt-5 mb-2">

                    <h4 class="mb-2 text-10">Ordering Process To Smart Card</h4>
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



    <div class="container">
        <div class="row py-5 my-5">
            <div class="col">

                <div class="owl-carousel owl-theme mb-0"
                     data-plugin-options="{'responsive': {'0': {'items': 1}, '476': {'items': 1}, '768': {'items': 5}, '992': {'items': 7}, '1200': {'items': 7}}, 'autoplay': true, 'autoplayTimeout': 3000, 'dots': false}">
                    <div>
                        <img class="img-fluid opacity-2" src="{{asset('img/ict/logos/logo-1.png')}}" alt="">
                    </div>
                    <div>
                        <img class="img-fluid opacity-2" src="{{asset('img/ict/logos/logo-2.png')}}" alt="">
                    </div>
                    <div>
                        <img class="img-fluid opacity-2" src="{{asset('img/ict/logos/logo-3.png')}}" alt="">
                    </div>
                    <div>
                        <img class="img-fluid opacity-2" src="{{asset('img/ict/logos/logo-4.png')}}" alt="">
                    </div>
                    <div>
                        <img class="img-fluid opacity-2" src="{{asset('img/ict/logos/logo-4.png')}}" alt="">
                    </div>
                    <div>
                        <img class="img-fluid opacity-2" src="{{asset('img/ict/logos/logo-6.png')}}" alt="">
                    </div>
                    <div>
                        <img class="img-fluid opacity-2" src="{{asset('img/ict/logos/logo-4.png')}}" alt="">
                    </div>
                    <div>
                        <img class="img-fluid opacity-2" src="{{asset('img/ict/logos/logo-2.png')}}" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


@push('custom-css')

    <style>
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
    </style>
@endpush

