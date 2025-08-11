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
            <a href="{{url('admin/products/create')}}" class="ecommerce-sidebar-link btn btn-primary btn-md font-weight-semibold btn-py-2 px-2">+ Add Product</a>
            <a href="{{url('admin/products')}}" class="mb-1 mt-1 me-1 btn btn-default btn"><i class="fas fa-sync"></i>Refresh</a>
        </div>
        <div class="col-sm-auto">
            <form action="#" class="search search-style-1 search-style-1-light mx-auto" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search products..."
                           value="{{ $search }}">
                    <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row row-gutter-sm mb-5">
        @foreach($products as $product)
            <div class="col-sm-12 col-xl-2 mb-4">
                <div class="card card-modern card-modern-alt-padding">
                    <div class="card-body bg-light">
                        <div class="image-frame mb-2">
                            <div class="image-frame-wrapper">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail" style="height: 140px; width: 180px" alt="{{ $product->name }}" />
                            </div>
                        </div>
                        <small><a href="#" class="ecommerce-sidebar-link text-color-grey text-color-hover-primary text-decoration-none">
                               {{ $product->category['title']}}
                            </a></small>
                        <h4 class="text-4 line-height-2 mt-0 mb-2"><a href="#" class="ecommerce-sidebar-link text-color-dark text-color-hover-primary text-decoration-none">{{ $product->name }}</a></h4>
                        <div class="stars-wrapper">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="product-price">
                            <div class="regular-price on-sale"></div>
                            <div class="sale-price">{{ number_format($product->sale_price, 2) }}</div>
                        </div>

                        <a href="{{route('admin.products.edit',$product->id)}}" class="mb-1 mt-1 me-1 btn btn-sm btn-info">Edit</a>
                        <a href="" class="mb-1 mt-1 me-1 btn btn-sm btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="row row-gutter-sm justify-content-between">
        <div class="col-lg-auto order-2 order-lg-1">
            <p class="text-center text-lg-left mb-0">
                Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} results
            </p>
        </div>
        <div class="col-lg-auto order-1 order-lg-2 mb-3 mb-lg-0">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-modern pagination-modern-spacing justify-content-center justify-content-lg-start mb-0">
                    {{-- Previous Page Link --}}
                    <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link prev" href="{{ $products->previousPageUrl() }}" aria-label="Previous" {{ $products->onFirstPage() ? 'tabindex="-1" aria-disabled="true"' : '' }}>
                            <span><i class="fas fa-chevron-left" aria-label="Previous"></i></span>
                        </a>
                    </li>

                    {{-- First Page Link --}}
                    @if ($products->currentPage() > 3)
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->url(1) }}">1</a>
                        </li>
                        @if ($products->currentPage() > 4)
                            <li class="page-item disabled">
                                <a class="page-link" href="#" disabled="true">...</a>
                            </li>
                        @endif
                    @endif

                    {{-- Middle Pages --}}
                    @foreach ($products->getUrlRange(
                        max(1, $products->currentPage() - 2),
                        min($products->lastPage(), $products->currentPage() + 2)
                    ) as $page => $url)
                        <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    {{-- Last Page Link --}}
                    @if ($products->currentPage() < $products->lastPage() - 2)
                        @if ($products->currentPage() < $products->lastPage() - 3)
                            <li class="page-item disabled">
                                <a class="page-link" href="#" disabled="true">...</a>
                            </li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link next" href="{{ $products->nextPageUrl() }}" aria-label="Next" {{ !$products->hasMorePages() ? 'tabindex="-1" aria-disabled="true"' : '' }}>
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
