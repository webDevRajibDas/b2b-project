@extends('admin.layouts.admin-master')

@section('title', 'Sub Categories')

@section('content')
    <section class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-3">
            <h2 class="card-title">Sub Category List</h2>
            <a class="mb-1 mt-1 mr-1 btn btn-primary" href="{{url('admin/sub-categories/create')}}">Create</a>
        </div>
        <div class="card-body">
            <table id="categoryTable" class="display table table-bordered table-striped mb-0 dataTable no-footer"
                   style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Parent Category</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allData as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->title}}</td>
                        <td>{{ $cat->parentCategory->title ?? 'N/A' }}</td>
                        <td>{{$cat->description}}</td>
                        <td>
                            <img src="{{ asset('storage/' . $cat->image) }}" alt="Category Image" width="150">
                        </td>
                        <td class="actions">
                            <a href="{{ route('admin.sub-categories.edit', $cat->id) }}"><i
                                        class="fas fa-pencil-alt"></i></a>
                            <a href="#"
                               class="delete-row"
                               data-url="{{ route('admin.sub-categories.destroy', $cat->id) }}"
                               title="Delete Sub Category">
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
        </div>
    </section>

@endsection

@push('styles')
    <style>

    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {

        });

        document.addEventListener('DOMContentLoaded', function () {
            // Handle delete links
            document.querySelectorAll('.delete-row').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    const deleteUrl = this.getAttribute('data-url');
                    const form = document.getElementById('delete-data');
                    if (confirm('Are you sure you want to delete this category? This action cannot be undone.')) {
                        form.action = deleteUrl;
                        form.submit();
                        this.innerHTML = '<i class="fas fa-spinner fa-spin" style="color: red"></i>';
                    }
                });
            });
        });
    </script>
@endpush
