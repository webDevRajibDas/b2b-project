@extends('admin.layouts.admin-master')

@section('title', 'Update Vendor')

@section('content')
    @include('admin.vendor-section.vendors.form')
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#parentCategory').on('change', function () {
                let parentId = $(this).val();

                $('#subCategory').html('<option value="">Loading...</option>');

                if (parentId != 0) {
                    $.ajax({
                        url: '{{ route("admin.get.subcategories") }}',
                        type: 'GET',
                        data: { parent_id: parentId },
                        success: function (data) {
                            let options = '<option value="0">Select Sub Category</option>';
                            $.each(data, function (key, value) {
                                options += `<option value="${value.id}">${value.title}</option>`;
                            });
                            $('#subCategory').html(options);
                        }
                    });
                } else {
                    $('#subCategory').html('<option value="0">Select Sub Category</option>');
                }
            });
        });

    </script>
@endpush