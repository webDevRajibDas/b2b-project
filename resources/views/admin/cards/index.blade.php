@extends('admin.layouts.admin-master')

@section('title', 'Categories')

@section('content')
    <section class="card">

        <div class="card-header d-flex justify-content-between align-items-center gap-3">
            <h2 class="card-title">Smart Card List</h2>
            <a class="mb-1 mt-1 mr-1 btn btn-primary" href="{{url('admin/cards/create')}}">Create</a>
        </div>

        <div class="card-body">
            <table id="categoryTable" class="display table table-bordered table-striped mb-0 dataTable no-footer"
                   style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Regular Price</th>
                        <th>Sale Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cards as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->description}}</td>
                        <td>{{$cat->content}}</td>
                        <td>{{$cat->price}}</td>
                        <td>{{$cat->sale_price}}</td>
                        <td>
                            <img src="{{ asset('storage/' . $cat->image) }}" alt="Card Image" width="100">
                        </td>
                        <td>{{$cat->status}}</td>
                        <td class="actions">
                            <a href="{{ route('admin.cards.edit', $cat->id) }}"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#"
                               class="delete-row"
                               data-url="{{ route('admin.cards.destroy', $cat->id) }}"
                               title="Delete Card">
                                <i class="far fa-trash-alt" style="color: red"></i>
                            </a>

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
        document.addEventListener('DOMContentLoaded', function() {
            // Handle delete links
            document.querySelectorAll('.delete-row').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const deleteUrl = this.getAttribute('data-url');
                    const form = document.getElementById('delete-data');

                    if (confirm('Are you sure you want to delete this category? This action cannot be undone.')) {
                        // Update form action and submit
                        form.action = deleteUrl;
                        form.submit();

                        // Optional: Show loading state
                        this.innerHTML = '<i class="fas fa-spinner fa-spin" style="color: red"></i>';
                    }
                });
            });
        });

    </script>
@endpush
