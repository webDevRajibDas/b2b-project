
@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $category->name }}</h2>

        <div class="row">
            @forelse ($category->products as $product)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>{{ $product->name }}</h5>
                            <p>{{ format_currency($product->price) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>No products available in this category.</p>
            @endforelse
        </div>
    </div>
@endsection