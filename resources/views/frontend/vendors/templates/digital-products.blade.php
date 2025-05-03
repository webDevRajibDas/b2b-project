@extends('frontend.ict.layouts.digital-page')
@section('title', 'B2B Digital Products')
@section('content')


    <section class="video-section py-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe27d 100%);">
        <div class="container-fluid">
            <img src="{{asset('assets/digital-products/digital-products-banner.jpg')}}" alt="B2B Digital Products" class="img-thumbnail img-fluid">
        </div>
    </section>
    <div class="products-container appear-animate py-5" data-animation-name="fadeIn" data-animation-delay="200">
        <div class="container-lg container">
            <h2 class="section-title text-center text-uppercase appear-animate mb-4 mt-4"
                data-animation-name="fadeInUpShorter" data-animation-delay="200">All Digital Products</h2>
        </div>

        <div class="container">
            <div class="row">
                @forelse($digital_product as $data)
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

    </style>
@endpush

