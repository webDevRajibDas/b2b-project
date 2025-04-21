@extends('admin.layouts.admin-master')

@section('title', 'Card Categories')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    <div class="datatables-header-footer-wrapper mt-2">
                        <div class="datatable-header">
                            <div class="row align-items-center mb-3">
                                <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                                    <a href="{{route('admin.card-categories.create')}}" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">+ Add Card Category</a>
                                </div>
                                <div class="col-8 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                        <label class="ws-nowrap me-3 mb-0">Filter By:</label>
                                        <select class="form-control select-style-1 filter-by" name="filter-by">
                                            <option value="all" selected>All</option>
                                            <option value="1">ID</option>
                                            <option value="2">Name</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-auto ps-lg-1 mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                        <label class="ws-nowrap me-3 mb-0">Show:</label>
                                        <select class="form-control select-style-1 results-per-page" name="results-per-page">
                                            <option value="12" selected>12</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto ps-lg-1">
                                    <div class="search search-style-1 search-style-1-lg mx-lg-auto">
                                        <div class="input-group">
                                            <input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="Search Category">
                                            <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-ecommerce-simple table-striped mb-0" id="datatable-ecommerce-list" style="min-width: 550px;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $data )
                                    <tr>
                                        <td><strong>{{$loop->iteration}}</strong></td>
                                        <td><strong>{{$data->name}}</strong></td>
                                        <td><strong>{{$data->status}}</strong></td>
                                        <td class="actions">
                                            <a href="{{ route('admin.card-categories.edit', $data->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#"
                                               class="delete-row"
                                               data-url="{{ route('admin.card-categories.destroy', $data->id) }}"
                                               title="Delete Category">
                                                <i class="far fa-trash-alt" style="color: red"></i>
                                            </a>
                                            <form id="delete-data" method="POST" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <hr class="solid mt-5 opacity-4">
                        <div class="datatable-footer">
                            <div class="row align-items-center justify-content-between mt-3">
                                <div class="col-md-auto order-1 mb-3 mb-lg-0">
                                    <div class="d-flex align-items-stretch">
                                        <div class="d-grid gap-3 d-md-flex justify-content-md-end me-4">
                                            <select class="form-control select-style-1 bulk-action" name="bulk-action" style="min-width: 170px;">
                                                <option value="" selected>Bulk Actions</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                            <a href="#" class="bulk-action-apply btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Apply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-auto text-center order-3 order-lg-2">
                                    <div class="results-info-wrapper"></div>
                                </div>
                                <div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
                                    <div class="pagination-wrapper"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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

        document.addEventListener('DOMContentLoaded', function() {
            // Handle delete links
            document.querySelectorAll('.delete-row').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const deleteUrl = this.getAttribute('data-url');
                    const form = document.getElementById('delete-data');

                    if (confirm('Are you sure you want to delete this category? This action cannot be undone.')) {
                        // Update form action and submit
                        form.action = deleteUrl;
                        form.submit();

                        // Optional: Show loading state
                        this.innerHTML = '<i class="fas fa-spinner fa-spin" style="color: red"></i>';
                    }
                });
            });
        });
    </script>
@endpush
