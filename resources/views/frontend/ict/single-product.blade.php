@extends('frontend.ict.layouts.page')
@section('title', 'B2B Smart Card')
@section('content')

   <section style="margin-top: 100px">
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                   <div class="thumb-gallery">
                       <div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">
                           @if($cardDetail->gallery && $cardDetail->gallery->count() > 0)
                               @foreach($cardDetail->gallery as $image)
                                   <div>
                                       <span class="img-thumbnail img-thumbnail-no-borders d-block">
                                           <img alt="{{$image->title}}" class="img-fluid" src="{{asset('storage/'.$image->image)}}">
                                       </span>
                                   </div>
                               @endforeach
                           @else
                               <p>No images available.</p>
                           @endif
                       </div>

                       <div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
                           @if($cardDetail->gallery && $cardDetail->gallery->count() > 0)
                               @foreach($cardDetail->gallery as $image)
                                   <div>
                                       <span class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer">
                                           <img alt="{{$image->title}}" class="img-fluid" src="{{asset('storage/'.$image->image)}}">
                                        </span>
                                   </div>
                               @endforeach
                           @else
                               <p>No images available.</p>
                           @endif

                       </div>
                   </div>

               </div>

               <div class="col-lg-6">

                   <div class="summary entry-summary">
                       <h1 class="mb-0 font-weight-bold text-7">{{$cardDetail->title}}</h1>
                       <div class="pb-0 clearfix">
                           <div title="Rated 3 out of 5" class="float-left">
                               <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                           </div>
                           <div class="review-num">
                               <span class="count" itemprop="ratingCount"></span>
                           </div>
                       </div>

                       <p class="price">
                           <span class="amount"><span style="font-size: x-large;" class="badge badge-dark badge-lg badge-pill text-uppercase px-2 py-1 mr-1">৳ : {{$cardDetail->sale_price}}</span></span>
                       </p>

                       <p class="mb-4">{{$cardDetail->description}}</p>

                       <div class="quantity quantity-lg card">
                          <div class="card-body" style="box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding:20px">
                              <div class="">
                                  <div class="implant-section">
                                      <div class="implant-title">ডেলিভারি চার্জ:</div>
                                      <div class="implant-detail">
                                          ঢাকার ভিতরে - <span class="implant-count">70 টাকা</span><br>
                                          ঢাকার বাইরে - <span class="implant-count">120 টাকা</span>
                                      </div>
                                  </div>
                              </div>

                              <div class="d-flex justify-content-between">
                                  <div class="implant-section">
                                      <div class="implant-title">সারাদেশ এ ক্যাশ অন ডেলিভারি</div>
                                  </div>

                                  <div class="implant-section">
                                      <div class="implant-title">নিরাপদ পেমেন্ট করার সহজ মাধ্যম</div>
                                  </div>
                              </div>

                              <div class="d-flex justify-content-between">
                                  <div class="implant-section">
                                      <div class="implant-title">যোগাযোগ ও অর্ডার করতে :</div>
                                      <div class="implant-title"> <a aria-label="Chat on WhatsApp" href="https://wa.me/01824929282">
                                              <img alt="Chat on WhatsApp" src="{{asset('assets/ict/images/WhatsAppButtonGreenLarge.svg')}}" />
                                          </a>

                                          <a href="https://m.me/YourPageUsername" target="_blank" class="messenger-button">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16">
                                                  <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.64.64 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.64.64 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76m5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"/>
                                              </svg> Message Us on
                                          </a></div>
                                  </div>
                              </div>
                          </div>
                       </div>

                       <div class="product-meta">
                           <span class="posted-in">Categories: <a rel="tag" href="#">ICT</a></span>
                       </div>

                   </div>


               </div>
           </div>
           <div class="row">
               <div class="col">
                   <div class="tabs tabs-product mb-2">
                       <ul class="nav nav-tabs">
                           <li class="nav-item active"><a class="nav-link py-3 px-4" href="#productDescription" data-toggle="tab">Description</a></li>
                           <li class="nav-item"><a class="nav-link py-3 px-4" href="#productInfo" data-toggle="tab">Additional Information</a></li>
                           <li class="nav-item"><a class="nav-link py-3 px-4" href="#productReviews" data-toggle="tab">Reviews (2)</a></li>
                       </ul>
                       <div class="tab-content p-0">
                           <div class="tab-pane p-4 active" id="productDescription">
                               {!! $cardDetail->content  !!}
                           </div>
                           <div class="tab-pane p-4" id="productInfo">
                               <table class="table m-0">
                                   <tbody>
                                   <tr>
                                       <th class="border-top-0">Size:</th>
                                       <td class="border-top-0">Unique</td>
                                   </tr>
                                   <tr>
                                       <th>Colors</th>
                                       <td>Black, Blue</td>
                                   </tr>
                                   <tr>
                                       <th>Material</th>
                                       <td>100% Waterproof</td>
                                   </tr>
                                   </tbody>
                               </table>
                           </div>
                           <div class="tab-pane p-4" id="productReviews">
                               <ul class="comments">
                                   <li>

                                   </li>

                               </ul>
                               <hr class="solid my-5">
                               <h4>Add a review</h4>
                               <div class="row">
                                   <div class="col">

                                       <form action="" id="submitReview" method="post">
                                           <div class="form-row">
                                               <div class="form-group col pb-2">
                                                   <label class="required font-weight-bold text-dark">Rating</label>
                                                   <input type="text" class="rating-loading" value="0" title="" data-plugin-star-rating data-plugin-options="{'color': 'primary', 'size':'xs'}">
                                               </div>
                                           </div>
                                           <div class="form-row">
                                               <div class="form-group col-lg-6">
                                                   <label class="required font-weight-bold text-dark">Name</label>
                                                   <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required>
                                               </div>
                                               <div class="form-group col-lg-6">
                                                   <label class="required font-weight-bold text-dark">Email Address</label>
                                                   <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required>
                                               </div>
                                           </div>
                                           <div class="form-row">
                                               <div class="form-group col">
                                                   <label class="required font-weight-bold text-dark">Review</label>
                                                   <textarea maxlength="5000" data-msg-required="Please enter your review." rows="8" class="form-control" name="review" id="review" required></textarea>
                                               </div>
                                           </div>
                                           <div class="form-row">
                                               <div class="form-group col mb-0">
                                                   <input type="submit" value="Post Review" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                                               </div>
                                           </div>
                                       </form>
                                   </div>

                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
@endsection

@push('custom-css')
    <style>
        .implant-section {
            margin-bottom: 25px;
            padding: 10px;
            border-radius: 8px;
            background-color: #f9f9f9;
            border-left: 2px solid #3498db;

        }

        .implant-title {
            font-weight: bold;
            font-size: 14px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .implant-detail {
            margin-left: 5px;
            font-size: 16px;
            line-height: 1.6;
        }

        .implant-count {
            font-weight: bold;
            color: #e74c3c;
        }

        .note-section {
            margin-top: 30px;
            padding: 15px;
            background-color: #fff8e1;
            border-radius: 8px;
            border-left: 4px solid #ffc107;
            font-size: 16px;
        }
    </style>
@endpush

@push('custom-script')
    <script src="{{asset('assets/ict/examples.gallery.js')}}"></script>
@endpush
<!-- Examples -->
