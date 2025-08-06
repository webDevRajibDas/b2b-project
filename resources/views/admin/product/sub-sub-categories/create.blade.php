@extends('admin.layouts.admin-master')
@section('title', 'Create Sub SubCategory')

@section('content')
    @include('admin.product.sub-sub-categories.form')
@endsection

@push('styles')
@endpush

@push('scripts')
    <script>
        $('#parent_id').on('change', function () {
            let parentId = $(this).val();

            let getSubCat = "{{ route('admin.get.subCategories', ':id') }}".replace(':id', parentId);

            if (parentId) {
                $.ajax({
                    url: getSubCat,
                    type: 'GET',
                    success: function (data) {
                        let $subCat = $('#sub_sub_cat');
                        $subCat.empty().append('<option value="">Select Sub SubCategory</option>');
                        $.each(data, function (key, value) {
                            $subCat.append(`<option value="${value.id}">${value.title}</option>`);
                        });
                    },
                    error: function () {
                        alert('Failed to load subcategories.');
                    }
                });
            } else {
                $('#sub_sub_cat').empty().append('<option value="">Select Sub SubCategory</option>');
            }
        });

    </script>
@endpush
