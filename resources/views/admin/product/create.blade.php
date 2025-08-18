@extends('admin.layouts.admin-master')

@section('title', 'Create Product')

@section('content')

    @include('admin.product.form')

@endsection

@push('styles')
    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('admin/vendor/select2/css/select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/vendor/pnotify/pnotify.custom.css')}}"/>
@endpush

@push('scripts')
    <!-- Specific Page Vendor -->
    <script src="{{asset('admin/vendor/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('admin/vendor/select2/js/select2.js')}}"></script>

    <script src="{{asset('admin/vendor/pnotify/pnotify.custom.js')}}"></script>

    <script>

        $(document).ready(function () {


            const $categorySelect = $('#categorieId');
            const $subCategorySelect = $('#subCategorie');
            const $subSubCategorySelect = $('#subSubCategories');


            $categorySelect.on('change', function (e) {
                e.preventDefault();
                const categoryId = $(this).val();
                $subCategorySelect.empty().prop('disabled', true).append($('<option>', {
                    value: '',
                    text: 'Select a category'
                }));
                $subSubCategorySelect.empty().prop('disabled', true).append($('<option>', {
                    value: '',
                    text: 'Select a subcategory first'
                }));

                if (categoryId) {
                    $.ajax({
                        url: "{{ route('admin.get.subCategories.list') }}",
                        type: 'GET',
                        data: {category_id: categoryId},
                        success: function (response) {
                            $subCategorySelect.empty().prop('disabled', false).append($('<option>', {
                                value: '',
                                text: 'Select a subcategory'
                            }));
                            if (response && response.length > 0) {
                                $.each(response, function (index, subcategory) {
                                    $subCategorySelect.append($('<option>', {
                                        value: subcategory.id,
                                        text: subcategory.title
                                    }));
                                });
                            } else {
                                $subCategorySelect.append($('<option>', {value: '', text: 'No subcategories found'}));
                            }
                            // Re-init Select2 if necessary: $subCategorySelect.select2();
                        },
                        error: function (xhr, status, error) { /* ... error handling ... */
                        }
                    });
                }
            });

            // --- NEW Event Listener for Subcategory Change ---
            $subCategorySelect.on('change', function (e) {
                e.preventDefault();
                const subcategoryId = $(this).val();
                console.log(subcategoryId)

                $subSubCategorySelect.empty().prop('disabled', true).append($('<option>', {
                    value: '',
                    text: 'Loading...'
                }));

                if (subcategoryId) {
                    $.ajax({
                        url: "{{ route('admin.get.subsubCategories.list') }}",
                        type: 'GET',
                        data: {
                            subcategory_id: subcategoryId // Send the selected subcategory ID
                        },
                        success: function (response) {
                            //console.log(response)
                            $subSubCategorySelect.empty().prop('disabled', false).append($('<option>', {
                                value: '',
                                text: 'Select a sub-subcategory'
                            }));

                            if (response && response.length > 0) {
                                $.each(response, function (index, subSubcategory) {
                                    $subSubCategorySelect.append($('<option>', {
                                        value: subSubcategory.id,
                                        text: subSubcategory.title
                                    }));
                                });
                            } else {
                                $subSubCategorySelect.append($('<option>', {
                                    value: '',
                                    text: 'No sub-subcategories found'
                                }));
                            }
                            // Re-init Select2 if necessary: $subSubCategorySelect.select2();
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX Error fetching sub-subcategories:", status, error);
                            $subSubCategorySelect.empty().prop('disabled', false);
                            $subSubCategorySelect.append($('<option>', {
                                value: '',
                                text: 'Error loading sub-subcategories'
                            }));
                        }
                    });
                } else {

                    $subSubCategorySelect.empty().prop('disabled', true).append($('<option>', {
                        value: '',
                        text: 'Select a category first' // Or 'Select a subcategory'
                    }));

                }
            });

            if ($categorySelect.val()) {
                $categorySelect.trigger('change');
            }


            var fileArr = [];
            $("#images").change(function () {
                // check if fileArr length is greater than 0
                if (fileArr.length > 0) fileArr = [];

                $('#image_preview').html("");
                var total_file = document.getElementById("images").files;
                if (!total_file.length) return;
                for (var i = 0; i < total_file.length; i++) {
                    if (total_file[i].size > 1048576) {
                        return false;
                    } else {
                        fileArr.push(total_file[i]);
                        $('#image_preview').append("<div class='img-div' id='img-div" + i + "'><img src='" + URL.createObjectURL(event.target.files[i]) + "' class='img-responsive gallery_image img-thumbnail' title='" + total_file[i].name + "'><div class='middle'><button id='action-icon' value='img-div" + i + "' class='btn btn-danger' role='" + total_file[i].name + "'><i class='fa fa-trash-alt'></i></button></div></div>");
                    }
                }
            });

            $('body').on('click', '#action-icon', function (evt) {
                var divName = this.value;
                var fileName = $(this).attr('role');
                $(`#${divName}`).remove();

                for (var i = 0; i < fileArr.length; i++) {
                    if (fileArr[i].name === fileName) {
                        fileArr.splice(i, 1);
                    }
                }
                document.getElementById('images').files = FileListItem(fileArr);
                evt.preventDefault();
            });


        });

        function FileListItem(file) {
            file = [].slice.call(Array.isArray(file) ? file : arguments)
            for (var c, b = c = file.length, d = !0; b-- && d;) d = file[b] instanceof File
            if (!d) throw new TypeError("expected argument to FileList is File or array of File objects")
            for (b = (new ClipboardEvent("")).clipboardData || new DataTransfer; c--;) b.items.add(file[c])
            return b.files
        }


        (function ($) {
            'use strict';

            /*
             * eCommerce Attribues - Add New
             *
             */
            $(document).on('click', '.ecommerce-attribute-add-new', function (e) {
                e.preventDefault();

                var html = '' +
                    '<div class="form-group row justify-content-center ecommerce-attribute-row">' +
                    '<div class="col-xl-3">' +
                    '<label class="control-label">Name</label>' +
                    '<input type="text" class="form-control form-control-modern" name="attName" value="" />' +
                    '<div class="checkbox mt-3 mb-3 mb-lg-0">' +
                    '<label class="my-2">' +
                    '<input type="checkbox" name="attVisible" value="">' +
                    'Visible on the item page' +
                    '</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-xl-6">' +
                    '<a href="#" class="ecommerce-attribute-remove text-color-danger float-end">Remove</a>' +
                    '<label class="control-label">Value(s)</label>' +
                    '<textarea class="form-control form-control-modern" name="attValue" rows="4" placeholder="Enter some text, or some attributes by | separating values"></textarea>' +
                    '</div>' +
                    '</div>' +
                    '';

                $('.ecommerce-attributes-wrapper').append(html);
            });

            /*
             * eCommerce Attribues - Remove
             *
             */
            $(document).on('click', '.ecommerce-attribute-remove', function (e) {
                e.preventDefault();
                $(this).closest('.ecommerce-attribute-row').remove();
            });

            /*
             * eCommerce Form - Validation and Submit the form data
             *
             */
            var ecommerceFormValidate = function () {
                var $form = $('.ecommerce-form');

                $form.validate({
                    ignore: '',
                    invalidHandler: function (form, validator) {
                        var errors = validator.numberOfInvalids();

                        if (errors) {
                            $('.form-control.error').each(function () {
                                var tab_id = $(this).closest('.tab-pane').attr('id');

                                $('.nav-link[href="#' + tab_id + '"]').trigger('click');
                                return false;
                            });
                        }
                    },
                    submitHandler: function (form) {
                        var formData = new FormData(form);
                        var attsArray = [];

                        $('.ecommerce-attribute-row').each(function () {
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

                        $submitButton.html('<i class="bx bx-save text-4 mr-2"></i>' + $submitButton.data('loading-text'));

                        // AJAX request with FormData
                        $.ajax({
                            url: '{{ route("admin.products.store") }}',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                            },
                            success: function (response) {
                                console.log(response)
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
                                    setTimeout(function () {
                                        location.reload();
                                    }, 3000);
                                }
                            },
                            error: function (xhr, status, error) {
                                $submitButton.html(submitText);

                                if (xhr.status === 422) {
                                    let errors = xhr.responseJSON.errors;
                                    let messageList = '';

                                    for (let field in errors) {
                                        if (errors.hasOwnProperty(field)) {
                                            errors[field].forEach(msg => {
                                                messageList += `<div>${msg}</div>`;
                                            });
                                        }
                                    }

                                    new PNotify({
                                        title: 'Validation Error',
                                        text: messageList,
                                        type: 'error',
                                        addclass: 'notification-error',
                                        icon: 'fas fa-exclamation-triangle'
                                    });
                                } else {
                                    new PNotify({
                                        title: 'Error',
                                        text: 'An error occurred. Please try again.',
                                        type: 'error',
                                        addclass: 'notification-error',
                                        icon: 'fas fa-times'
                                    });
                                }
                            }

                        });
                    }
                });
            };

            // First Load
            ecommerceFormValidate();

            // Sidebar Overlay Form Show
            $(window).on('ecommerce.sidebar.overlay.show', function () {
                ecommerceFormValidate();
            });


        }(jQuery));

    </script>
@endpush
