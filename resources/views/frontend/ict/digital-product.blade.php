@extends('frontend.ict.layouts.digital-page')
@section('title', 'B2B Digital Subscription')
@section('content')

   <section style="margin-top: 100px">
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                   <div class="thumb-gallery">
                       @if($digitalProduct->image > 0)
                           <img alt="{{$digitalProduct->title}}" class="img-fluid" src="{{asset('storage/'.$digitalProduct->image)}}">
                       @else
                           <p>No images available.</p>
                       @endif
                   </div>

               </div>

               <div class="col-lg-6">

                   <div class="summary entry-summary">
                       <h1 class="mb-0 font-weight-bold text-7">{{$digitalProduct->title}}</h1>
                       <div class="clearfix pb-0">
                           <div title="Rated 3 out of 5" class="float-left">
                               <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                           </div>
                           <div class="review-num">
                               <span class="count" itemprop="ratingCount"></span>
                           </div>
                       </div>

                       <p class="price">
                           <span class="amount">
                            <span style="font-size: x-large;" class="px-2 py-1 mr-1 badge badge-dark badge-lg badge-pill text-uppercase">৳ : {{$digitalProduct->price}} - {{$digitalProduct->sale_price}}</span>
                        </span>
                       </p>

                       <p class="mb-4">{{$digitalProduct->description}}</p>


                       <div class="form-group">
                        <label for="exampleFormControlSelect1">Choose an option</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>1 Month </option>
                          <option>3 Month </option>
                          <option>6 Month </option>
                          <option>12 Month </option>
                        </select>
                      </div>
                       

                       <div class="quantity quantity-lg card">
                          <div class="card-body" style="box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding:20px">
                            <div class="d-flex justify-content-between">
                                <div class="implant-section">
                                    <div class="implant-title">যোগাযোগ ও অর্ডার করতে :</div>
                                    <div class="implant-title"> <a aria-label="Chat on WhatsApp" href="https://wa.me/01751359305">
                                            <img alt="Chat on WhatsApp" id="whats_app_button" src="{{asset('assets/ict/images/WhatsAppButtonGreenLarge.svg')}}" />
                                        </a>

                                        <a href="https://m.me/622321657625228" target="_blank" class="messenger-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16">
                                                <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.64.64 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.64.64 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76m5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"/>
                                            </svg> Chat on messenger
                                        </a></div>
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

                          </div>
                       </div>

                       <div class="product-meta">
                           <span class="posted-in">Categories: <a rel="tag" href="#">Digital Product</a></span>
                       </div>

                   </div>

               </div>
           </div>
           <div class="row">
               <div class="col">
                   <div class="mb-2 tabs tabs-product">
                       <ul class="nav nav-tabs">
                           <li class="nav-item active"><a class="px-4 py-3 nav-link" href="#productDescription" data-toggle="tab">Description</a></li>
                           <li class="nav-item"><a class="px-4 py-3 nav-link" href="#productInfo" data-toggle="tab">Additional Information</a></li>
                       </ul>
                       <div class="p-0 tab-content">
                           <div class="p-4 tab-pane active" id="productDescription">
                               {!! $digitalProduct->content  !!}
                           </div>
                           <div class="p-4 tab-pane" id="productInfo">
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
                           <div class="p-4 tab-pane" id="productReviews">
                               <ul class="comments">
                                   <li>

                                   </li>

                               </ul>
                               <hr class="my-5 solid">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>


   <div class="py-5 products-container appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
    <div class="container container-lg">
        <h4 class="mt-4 mb-4 text-center section-title text-uppercase appear-animate"
            data-animation-name="fadeInUpShorter" data-animation-delay="200">Related Products</h2>
    </div>

    <div class="container">
        <div class="row">
            @forelse($relatedProducts as $data)
                <div class="col-md-4">
                    <a href="{{ route('digital-product.show', $data->slug) }}">
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
                                <h5><a href="{{ route('digital-product.show', $data->slug) }}">{{$data->title}}</a></h5>
                                <div class="product-bottom-details">
                                    <div class="product-price">Tk :<span>{{$data->price}} </span> - <span>{{$data->sale_price}}</span></div>
                                    <div class="product-links">
                                        <a href="{{ route('digital-product.show', $data->slug) }}" class="btn card-buy-button">Buy Now</a>
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
