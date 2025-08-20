@extends('admin.layouts.admin-master')

    @section('title', 'Create Update Widget')
    
    @section('content')
        @include('admin.widgets.form')
    @endsection
    
    @push('styles')
        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="{{asset('admin/vendor/pnotify/pnotify.custom.css')}}" />
    @endpush
    
    @push('scripts')
        <!-- Specific Page Vendor -->

    
        <script>
            $(document).ready(function () {
    
            });
    
            (function($) {
                'use strict';
    


            }(jQuery));
    
        </script>
    @endpush
    
