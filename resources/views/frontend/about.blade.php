@extends('frontend.layouts.app')

@section('content')

    <div class="page-header page-header-bg d-flex align-items-center text-left"
         style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), center/cover no-repeat url('assets/images/page-header-bg.jpg'), #D4E1EA; min-height: 300px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="text-white mb-3">
                        <span class="d-block font-weight-light">ABOUT US</span>B2B Platform
                    </h1>
                    <a href="#" class="btn btn-dark btn-lg px-4 py-2">Contact Us</a>
                </div>
            </div>
        </div>
    </div>

    <div class="features-section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img class="img-fluid img-thumbnail" alt="" src="{{asset('assets/images/about/about1.jpg')}}">
                </div>
                <div class="col-12">
                    <img class="img-fluid img-thumbnail" alt="" src="{{asset('assets/images/about/about2.jpg')}}">
                </div>
                <div class="col-12">
                    <img class="img-fluid img-thumbnail" alt="" src="{{asset('assets/images/about/about3.jpg')}}">
                </div>

                <div class="col-12">
                    <img class="img-fluid img-thumbnail" alt="" src="{{asset('assets/images/about/about4.jpg')}}">
                </div>

                <div class="col-12">
                    <img class="img-fluid img-thumbnail" alt="" src="{{asset('assets/images/about/about5.jpg')}}">
                </div>
            </div>
        </div>
    </div>





    <div class="features-section bg-gray">
        <div class="container">
            <h2 class="subtitle">WHY CHOOSE US</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="icon-shipped"></i>

                        <div class="feature-box-content p-0">
                            <h3>Free Shipping</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industr.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="icon-us-dollar"></i>

                        <div class="feature-box-content p-0">
                            <h3>100% Money Back Guarantee</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industr.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="icon-online-support"></i>

                        <div class="feature-box-content p-0">
                            <h3>Online Support 24/7</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industr.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .features-section -->



    <div class="counters-section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4 count-container">
                    <div class="count-wrapper">
								<span class="count-to" data-from="0" data-to="200" data-speed="2000"
                                      data-refresh-interval="50">200</span>+
                    </div><!-- End .count-wrapper -->
                    <h4 class="count-title">MILLION CUSTOMERS</h4>
                </div><!-- End .col-md-4 -->

                <div class="col-6 col-md-4 count-container">
                    <div class="count-wrapper">
								<span class="count-to" data-from="0" data-to="1800" data-speed="2000"
                                      data-refresh-interval="50">1800</span>+
                    </div><!-- End .count-wrapper -->
                    <h4 class="count-title">TEAM MEMBERS</h4>
                </div><!-- End .col-md-4 -->

                <div class="col-6 col-md-4 count-container">
                    <div class="count-wrapper line-height-1">
								<span class="count-to" data-from="0" data-to="24" data-speed="2000"
                                      data-refresh-interval="50">24</span><span>HR</span>
                    </div><!-- End .count-wrapper -->
                    <h4 class="count-title">SUPPORT AVAILABLE</h4>
                </div><!-- End .col-md-4 -->

                <div class="col-6 col-md-4 count-container">
                    <div class="count-wrapper">
								<span class="count-to" data-from="0" data-to="265" data-speed="2000"
                                      data-refresh-interval="50">265</span>+
                    </div><!-- End .count-wrapper -->
                    <h4 class="count-title">SUPPORT AVAILABLE</h4>
                </div><!-- End .col-md-4 -->

                <div class="col-6 col-md-4 count-container">
                    <div class="count-wrapper line-height-1">
								<span class="count-to" data-from="0" data-to="99" data-speed="2000"
                                      data-refresh-interval="50">99</span><span>%</span>
                    </div><!-- End .count-wrapper -->
                    <h4 class="count-title">SUPPORT AVAILABLE</h4>
                </div><!-- End .col-md-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .counters-section -->

@endsection

@push('styles')

@endpush

@push('scripts')

@endpush
