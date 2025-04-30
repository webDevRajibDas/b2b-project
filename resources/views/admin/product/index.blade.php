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

        </div>
    </div>
    <div class="row row-gutter-sm mb-5">
        {{ $dataTable->table() }}
    </div>

@endsection

@push('styles')
    <style>

    </style>
@endpush

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).ready(function () {

        });
    </script>
@endpush
