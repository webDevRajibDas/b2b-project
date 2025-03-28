@extends('frontend.ict.layouts.page')
@section('title', 'B2B Smart Card')
@section('content')

    <div class="slider-container rev_slider_wrapper" style="height: 100vh;">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider
             data-plugin-options="{'sliderLayout': 'fullscreen', 'delay': 9000, 'gridwidth': 1170, 'gridheight': 600, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'enterpoint', 'speed': 1000, 'levels': [2,3,4,5,6,7,8,9,12,50], 'disable_onmobile': 'on' }}">
            <ul>
                <li class="slide-overlay" data-transition="fade">
                    <img src="{{asset('assets/ict/slides/slide-corporate-7-1.jpg')}}"
                         alt=""
                         data-bgposition="center center"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat"
                         class="rev-slidebg">

                    <div class="tp-caption"
                         data-x="center" data-hoffset="['-165','-165','-165','-215']"
                         data-y="center" data-voffset="['-110','-110','-110','-135']"
                         data-start="1000"
                         data-transform_in="x:[-300%];opacity:0;s:500;"
                         data-transform_idle="opacity:0.2;s:500;"><img
                                src="{{asset('img/ict/images/slide-title-border.png')}}" alt=""></div>

                    <div class="tp-caption text-color-light font-weight-normal"
                         data-x="center"
                         data-y="center" data-voffset="['-110','-110','-110','-135']"
                         data-start="700"
                         data-fontsize="['22','22','22','40']"
                         data-lineheight="['25','25','25','45']"
                         data-transform_in="y:[-50%];opacity:0;s:500;">WE ROCK AND WE MAKE
                    </div>

                    <div class="tp-caption"
                         data-x="center" data-hoffset="['165','165','165','215']"
                         data-y="center" data-voffset="['-110','-110','-110','-135']"
                         data-start="1000"
                         data-transform_in="x:[300%];opacity:0;s:500;"
                         data-transform_idle="opacity:0.2;s:500;"><img
                                src="{{asset('img/ict/slides/slide-title-border.png')}}" alt=""></div>

                    <h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
                        data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                        data-x="center"
                        data-y="center" data-voffset="['-60','-60','-60','-85']"
                        data-fontsize="['50','50','50','90']"
                        data-lineheight="['55','55','55','95']"> B2B Smart Digital Card</h1>

                    <div class="tp-caption font-weight-light text-center"
                         data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                         data-x="center"
                         data-y="center" data-voffset="['-10','-10','-10','-25']"
                         data-fontsize="['18','18','18','50']"
                         data-lineheight="['29','29','29','40']"
                         style="color: #b5b5b5;">NFC & QR Code Digital Business Card for teams and individuals.
                        Instantly share anything with just a tap or scan📲
                    </div>


                </li>
                <li class="slide-overlay" data-transition="fade">
                    <img src="{{asset('assets/ict/slides/slide-corporate-7-1.jpg')}}"
                         alt=""
                         data-bgposition="center center"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat"
                         class="rev-slidebg">

                    <div class="tp-caption"
                         data-x="center" data-hoffset="['-165','-165','-165','-215']"
                         data-y="center" data-voffset="['-110','-110','-110','-135']"
                         data-start="1000"
                         data-transform_in="x:[-300%];opacity:0;s:500;"
                         data-transform_idle="opacity:0.2;s:500;"><img
                                src="{{asset('img/ict/images/slide-title-border.png')}}" alt=""></div>

                    <div class="tp-caption text-color-light font-weight-normal"
                         data-x="center"
                         data-y="center" data-voffset="['-110','-110','-110','-135']"
                         data-start="700"
                         data-fontsize="['22','22','22','40']"
                         data-lineheight="['25','25','25','45']"
                         data-transform_in="y:[-50%];opacity:0;s:500;">WE ROCK AND WE MAKE
                    </div>

                    <div class="tp-caption"
                         data-x="center" data-hoffset="['165','165','165','215']"
                         data-y="center" data-voffset="['-110','-110','-110','-135']"
                         data-start="1000"
                         data-transform_in="x:[300%];opacity:0;s:500;"
                         data-transform_idle="opacity:0.2;s:500;"><img
                                src="{{asset('img/ict/slides/slide-title-border.png')}}" alt=""></div>

                    <h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
                        data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                        data-x="center"
                        data-y="center" data-voffset="['-60','-60','-60','-85']"
                        data-fontsize="['50','50','50','90']"
                        data-lineheight="['55','55','55','95']"> B2B Smart Digital Card</h1>

                    <div class="tp-caption font-weight-light text-center"
                         data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                         data-x="center"
                         data-y="center" data-voffset="['-10','-10','-10','-25']"
                         data-fontsize="['18','18','18','50']"
                         data-lineheight="['29','29','29','40']"
                         style="color: #b5b5b5;">AWESOME DESIGNS
                    </div>


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



    {{--    <section class="section section-secondary border-0 py-0 m-0 appear-animation" data-appear-animation="fadeIn" style="height: 450px;">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row align-items-center justify-content-center justify-content-lg-between pb-5 pb-lg-0">--}}
    {{--                <h2 class="font-weight-bold text-color-light text-7 mb-2 mt-4">BRANDED PRODUCTS</h2>--}}
    {{--            </div>--}}
    {{--            <div class="row mb-5 pb-3">--}}
    {{--                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">--}}
    {{--                    <div class="card flip-card text-center rounded-0">--}}
    {{--                        <div class="flip-front p-5">--}}
    {{--                            <div class="flip-content my-4">--}}
    {{--                                <strong class="font-weight-extra-bold text-color-dark line-height-1 text-13 mb-3 d-inline-block">01</strong>--}}
    {{--                                <h4 class="font-weight-bold text-color-primary text-4">FIRST STEP</h4>--}}
    {{--                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius.</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="flip-back d-flex align-items-center p-5"--}}
    {{--                             style="background-image: url({{ asset('assets/ict/images/generic-corporate-17-1.jpg') }});--}}
    {{--            background-size: cover;--}}
    {{--            background-position: center;">--}}
    {{--                            <div class="flip-content my-4">--}}
    {{--                                <h4 class="font-weight-bold text-color-light">FIRST MEETING</h4>--}}
    {{--                                <p class="font-weight-light text-color-light opacity-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius.</p>--}}
    {{--                                <a href="#" class="btn btn-light btn-modern text-color-dark font-weight-bold">LEARN MORE</a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}



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

    </style>
@endpush

