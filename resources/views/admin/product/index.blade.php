@extends('admin.layouts.admin-master')

@section('title', 'Product List')

@section('content')

    <div class="ecommerce-form-sidebar-overlay-wrapper">
        <div class="ecommerce-form-sidebar-overlay-body">
            <a href="#" class="ecommerce-form-sidebar-overlay-close"><i class="bx bx-x"></i></a>
            <div class="scrollable h-100 loading-overlay-showing" data-plugin-scrollable>
                <div class="loading-overlay">
                    <div class="bounce-loader">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                </div>
                <div class="ecommerce-form-sidebar-overlay-content scrollable-content px-3 pb-3 pt-1"></div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center justify-content-sm-between pt-2">
        <div class="col-sm-auto text-center mb-4 mb-sm-0 mt-2 mt-sm-0">
            <a href="{{url('admin/products/create')}}" class="ecommerce-sidebar-link btn btn-primary btn-md font-weight-semibold btn-py-2 px-4" data-ajax-url="ajax/ajax-products-form-empty.html">+ Add Product</a>
        </div>
        <div class="col-sm-auto">
            <form action="#" class="search search-style-1 search-style-1-light mx-auto" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="product-term" id="product-term" placeholder="Search Product">
                    <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row row-gutter-sm mb-5">
        @foreach($products as $product)
            <div class="col-sm-6 col-xl-2 mb-4">
                <div class="card card-modern card-modern-alt-padding">
                    <div style="padding: 10px;" class="card-body bg-light">
                        <div class="image-frame mb-2">
                            <div class="image-frame-wrapper">
                                <a href="{{ route('admin.products.edit', $product->id) }}">
                                    <img src="{{asset('storage/'.$product->image)}}" class="img-fluid" alt="{{$product->name}}" />
                                </a>
                            </div>
                        </div>
                        <small>
                            <a href="#" class="ecommerce-sidebar-link text-color-grey text-color-hover-primary text-decoration-none">CATEGORY</a>
                        </small>
                        <h4 class="text-4 line-height-2 mt-0 mb-2 text-black">
                            {{$product->name}}
                        </h4>
                        <div class="product-price">
                            <div class="regular-price on-sale">{{$product->price}}</div>
                            <div class="sale-price">{{$product->sale_price}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row row-gutter-sm justify-content-between">
        <div class="col-lg-auto order-2 order-lg-1">
            <p class="text-center text-lg-left mb-0">Showing 1-8 of 60 results</p>
        </div>
        <div class="col-lg-auto order-1 order-lg-2 mb-3 mb-lg-0">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-modern pagination-modern-spacing justify-content-center justify-content-lg-start mb-0">
                    <li class="page-item">
                        <a class="page-link prev" href="#" aria-label="Previous">
                            <span><i class="fas fa-chevron-left" aria-label="Previous"></i></span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#" disabled="true">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">15</a></li>
                    <li class="page-item">
                        <a class="page-link next" href="#" aria-label="Next">
                            <span><i class="fas fa-chevron-right" aria-label="Next"></i></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection

@push('styles')
    <style>

    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {

        });
    </script>
@endpush
