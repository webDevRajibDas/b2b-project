@extends('admin.layouts.admin-master')

@section('title', 'Edit Card Info ')

@section('content')
    @include('admin.cards.form')
@endsection

@push('styles')
    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('admin/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/pnotify/pnotify.custom.css')}}" />
@endpush

@push('scripts')
    <!-- Specific Page Vendor -->
    <script src="{{asset('admin/vendor/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('admin/vendor/select2/js/select2.js')}}"></script>

    <script src="{{asset('admin/vendor/pnotify/pnotify.custom.js')}}"></script>

    <script>
        $(document).ready(function () {

        });

    </script>
@endpush
