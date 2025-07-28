@extends('admin.layouts.admin-master')

    @section('title', 'Create Product')
    
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
    
            (function($) {
                'use strict';
    
                /*
                 * eCommerce Attribues - Add New
                 *
                 */
                $(document).on('click', '.ecommerce-attribute-add-new', function(e){
                    e.preventDefault();
    
                    var html = '' +
                        '<div class="form-group row justify-content-center ecommerce-attribute-row">' +
                        '<div class="col-xl-4 col-md-4">' +
                        '<div class="checkbox mb-lg-0">' +
                            '<label class="control-label text-lg-end">Chosse Option</label>'+
                        ' <input type="text" class="form-control form-control-modern" name="attr_price[]" value="" placeholder="Price" />'+     
                        '</div>' +
                        '</div>' +
                        '<div class="col-xl-8 col-md-8">' +
                        '<a href="#" class="ecommerce-attribute-remove text-color-danger float-end">Remove</a>' +
                        '<label class="control-label">Value</label>' +
                        '<input type="text" class="form-control form-control-modern" name="attr_packege[]" value="" />' +
                        '</div>' +
                        '</div>' +
                        '';
    
                    $('.ecommerce-attributes-wrapper').append( html );
                });
    
                /*
                 * eCommerce Attribues - Remove
                 *
                 */
                $(document).on('click', '.ecommerce-attribute-remove', function(e){
                    e.preventDefault();
    
                    $(this).closest('.ecommerce-attribute-row').remove();
                });
    
                /*
                 * eCommerce Form - Validation and Submit the form data
                 *
                 */
                var ecommerceFormValidate = function() {
                    var $form = $('.ecommerce-form');
    
                    $form.validate({
                        ignore: '',
                        invalidHandler: function(form, validator) {
                            var errors = validator.numberOfInvalids();
    
                            if (errors) {
                                $('.form-control.error').each(function(){
                                    var tab_id = $(this).closest('.tab-pane').attr('id');
    
                                    $('.nav-link[href="#'+ tab_id +'"]').trigger('click');
                                    return false;
                                });
                            }
                        },
                        submitHandler: function(form) {
                            // Create FormData object
                            var formData = new FormData(form);
    
                            // Append additional fields to FormData
                            var attsArray = [];
    
                            $('.ecommerce-attribute-row').each(function(){
                                var $row = $(this);
    
                                attsArray.push({
                                    attName: $row.find('input[name="attName"]').val(),
                                    attVisible: $row.find('input[name="attVisible"]').is(':checked') ? true : false,
                                    attValue: $row.find('textarea[name="attValue"]').val()
                                });
                            });
    
                            // Add "atts" param with attributes array to FormData
                            if (attsArray.length > 0) {
                                formData.append('atts', JSON.stringify(attsArray));
                            }
    
                            // Submit Button
                            var $submitButton = $('.submit-button'),
                                submitText = $submitButton.html();
    
                            $submitButton.html('<i class="mr-2 bx bx-save text-4"></i>' + $submitButton.data('loading-text'));
    
                            // AJAX request with FormData
                            $.ajax({
                                url: '{{ route("admin.cards.store") }}',
                                type: 'POST',
                                data: formData,
                                processData: false, // Prevent jQuery from processing the data
                                contentType: false, // Prevent jQuery from setting content type
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                                },
                                success: function(response) {
                                    new PNotify({
                                        title: 'Success',
                                        text: 'Product Successfully Added',
                                        type: 'success',
                                        addclass: 'notification-success',
                                        icon: 'fas fa-check'
                                    });
    
                                    $('.action-buttons').remove();
    
                                    if ($form.closest('.ecommerce-form-sidebar-overlay-wrapper').get(0)) {
                                        $('.ecommerce-form-sidebar-overlay-wrapper').removeClass('show');
                                    } else {
                                        setTimeout(function() {
                                            location.reload();
                                        }, 5000);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    $submitButton.html(submitText);
    
                                    new PNotify({
                                        title: 'Error',
                                        text: 'Unfortunately an error occurred, please try again or contact the website administrator.',
                                        type: 'error',
                                        addclass: 'notification-error',
                                        icon: 'fas fa-times'
                                    });
                                }
                            });
                        }
                    });
                };
    
                // First Load
                ecommerceFormValidate();
    
                // Sidebar Overlay Form Show
                $(window).on('ecommerce.sidebar.overlay.show', function(){
                    ecommerceFormValidate();
                });
    
    
            }(jQuery));
    
        </script>
    @endpush
    
