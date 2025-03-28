@extends('frontend.layouts.app')
@section('title', $category->title)
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                    <!-- Vendor Image -->
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $vendor->file_path) }}" class="img-fluid rounded" alt="{{ $vendor->title }}">
                    </div>

                    <!-- Vendor Details -->
                    <div class="col-md-8">
                        <h2 class="text-primary">{{ $vendor->title }}</h2>
                        <p class="text-muted">{{ $vendor->description }}</p>

                        <div class="mt-3">
                            <h5><strong>Contact Person:</strong> {{ $vendor->contact_person }}</h5>
                            <p><strong>Phone:</strong> <a href="tel:{{ $vendor->phone }}">{{ $vendor->phone }}</a></p>
                            <p><strong>Email:</strong> <a href="mailto:{{ $vendor->email }}">{{ $vendor->email }}</a></p>
                            <p><strong>Address:</strong> {{ $vendor->address }}</p>
                            <p><strong>Business Type:</strong> {{ $vendor->business_type }}</p>
                            <p><strong>Registration No:</strong> {{ $vendor->business_registration_number }}</p>
                            <p><strong>Status:</strong> <span class="badge badge-{{ $vendor->status === 'active' ? 'success' : 'danger' }}">{{ ucfirst($vendor->status) }}</span></p>
                            <p><strong>Join Date:</strong> {{ date('F j, Y', strtotime($vendor->join_date)) }}</p>
                        </div>

                        <!-- Links -->
                        <div class="mt-3">
                            <a href="{{ $vendor->page_link }}" target="_blank" class="btn btn-info">Facebook Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subcategory Section -->
        <div class="mt-5">
            <h3>Categories</h3>
            <p>Category ID: {{ $vendor->category->title }}</p>
            <p>Sub-category ID: {{ $vendor->subCategory->title }}</p>
        </div>
    </div>
@endsection
