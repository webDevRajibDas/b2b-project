@extends('frontend.layouts.app')

@section('title', 'Page Title')

@section('content')
    <p>Your content here...</p>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('custom-style.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('custom-script.js') }}"></script>
@endpush
