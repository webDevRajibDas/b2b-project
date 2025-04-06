@extends('frontend.ict.layouts.page')
@section('title', 'B2B ICT Products')
@section('content')

    <div class="slider-container rev_slider_wrapper" style="height: 100vh;">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider
             data-plugin-options="{'sliderLayout': 'fullscreen', 'delay': 9000, 'gridwidth': 1170, 'gridheight': 600, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'enterpoint', 'speed': 1000, 'levels': [2,3,4,5,6,7,8,9,12,50], 'disable_onmobile': 'on' }}">
            <ul>
                <li class="slide-overlay" data-transition="fade">

                    <img src="{{asset('assets/images/blank.gif')}}"
                         alt=""
                         data-bgposition="center center"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat"
                         class="rev-slidebg">

                    <div class="rs-background-video-layer"
                         data-forcerewind="on"
                         data-volume="mute"
                         data-videowidth="100%"
                         data-videoheight="100%"
                         data-videomp4="{{asset('assets/ict/smart-card.mp4')}}"
                         data-videopreload="preload"
                         data-videoloop="loop"
                         data-forceCover="1"
                         data-aspectratio="16:9"
                         data-autoplay="true"
                         data-autoplayonlyfirsttime="false"
                         data-nextslideatend="false">
                    </div>

                    <h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
                        data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                        data-x="center"
                        data-y="center" data-voffset="['-60','-60','-60','-85']"
                        data-fontsize="['50','50','50','90']"
                        data-lineheight="['55','55','55','95']"></h1>


                </li>

            </ul>
        </div>
    </div>



    <!-- Full Width Section -->
    <section class="full-width-section" style="margin: 50px 0px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="video-container">
                        <iframe width="560" height="315"
                                src="https://www.youtube-nocookie.com/embed/GhKoIL_44nI?si=tzE6Diwge9zojC0X"
                                title="B2B Smart Card" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 text-center-vertical">
                    <div class="bgblue">
                        <div class="promo-card">
                            <h4 class="text-white font-weight-bold text-4">B2B Smart Uddokta Card হলো অনুমোদিত B2B
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
                    </div>

                </div>
            </div>
        </div>
    </section>


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


        <section class="section border-0 py-0 m-0 appear-animation glass-effect" data-appear-animation="fadeIn" style="height: auto; padding: 80px 0 !important;">
            <div class="container">
                <div class="row align-items-center justify-content-center justify-content-lg-between pb-5 pb-lg-0">
                    <h2 class="font-weight-bold  text-7 mb-2 mt-4">Our Smart Cards</h2>
                </div>
                <div class="row mb-5 pb-3">
                    <div class="col-md-6 col-lg-6 mb-2 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        <div class="card flip-card text-center rounded-0">
                            <div class="flip-front p-2">
                                <img width="450" src="{{asset('assets/ict/images/cards/business-card-front.jpg')}}" alt="">
                            </div>
                            <div class="flip-back d-flex align-items-center p-1">
                                <div class="flip-content my-2">
                                    <img width="450" src="{{asset('assets/ict/images/cards/business-card-back.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-2 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        <div class="card flip-card text-center rounded-0">
                            <div class="flip-front p-2">
                                <img width="450" src="{{asset('assets/ict/images/cards/freelancer-card-front.jpg')}}" alt="">
                            </div>
                            <div class="flip-back d-flex align-items-center p-1">
                                <div class="flip-content my-2">
                                    <img width="450" src="{{asset('assets/ict/images/cards/freelancer-card-back.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mb-5 pb-3">
                    <div class="col-md-6 col-lg-6 mb-2 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        <div class="card flip-card text-center rounded-0">
                            <div class="flip-front p-2">
                                <img width="450" src="{{asset('assets/ict/images/cards/smart-agent-card-front.jpg')}}" alt="">
                            </div>
                            <div class="flip-back d-flex align-items-center p-1">
                                <div class="flip-content my-2">
                                    <img width="450" src="{{asset('assets/ict/images/cards/smart-agent-card-back.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-2 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        <div class="card flip-card text-center rounded-0">
                            <div class="flip-front p-2">
                                <img width="450" src="{{asset('assets/ict/images/cards/unity-card-front.jpg')}}" alt="">
                            </div>
                            <div class="flip-back d-flex align-items-center p-1">
                                <div class="flip-content my-2">
                                    <img width="450" src="{{asset('assets/ict/images/cards/unity-card-back.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-5 pb-3">
                    <div class="col-md-6 col-lg-6 mb-2 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        <div class="card flip-card text-center rounded-0">
                            <div class="flip-front p-2">
                                <img width="450" src="{{asset('assets/ict/images/cards/smart-edu-card-front.jpg')}}" alt="">
                            </div>
                            <div class="flip-back d-flex align-items-center p-1">
                                <div class="flip-content my-2">
                                    <img width="450" src="{{asset('assets/ict/images/cards/smart-edu-card-back.jpg')}}" alt="">
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

