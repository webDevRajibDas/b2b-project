@extends('admin.layouts.admin-master')

@section('title', 'Sub Categories')

@section('content')
    <section class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-3">
            <h2 class="card-title">Sub Category List</h2>
            <a class="mb-1 mt-1 mr-1 btn btn-primary" href="{{url('admin/sub-categories/create')}}">Create</a>
        </div>
        <div class="card-body">
            <table id="categoryTable" class="display table table-bordered table-striped mb-0 dataTable no-footer" style="width:100%">
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
                                <a href=""><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="delete-row"><i class="far fa-trash-alt"></i></a>
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
        $(document).ready(function() {

        });
    </script>
@endpush
