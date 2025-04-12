@extends('admin.layouts.admin-master')

@section('title', 'Vendors List')

@section('content')
    <section class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-3">
            <h2 class="card-title m-0">Vendors List</h2>
            <a class="btn btn-primary" href="{{url('admin/vendors/create')}}">Create Vendor / Shops</a>
        </div>
        <div class="card-body">
            <table id="vendorsTable" class="display table table-bordered table-striped mb-0 dataTable no-footer"
                   style="width:100%">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Vendor ID</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Address</th>
                    <th>Business Type</th>
                    <th>Join Date</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($vendors as $index => $vendor)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $vendor->file_path) }}" alt="Vendor Image" width="100">
                            </td>
                            <td>{{$vendor->title}}</td>
                            <td>{{$vendor->vendor_id}}</td>
                            <td>{{$vendor->description}}</td>
                            <td>{{$vendor->category->title ?? 'N/A' }}</td>
                            <td>{{$vendor->subCategory->title ?? 'N/A' }}</td>
                            <td>{{$vendor->address }}</td>
                            <td>{{$vendor->business_type }}</td>
                            <td>{{$vendor->join_date }}</td>
                            <td>{{$vendor->phone }}</td>
                            <td>{{$vendor->email }}</td>
                            <td>{{$vendor->status}}</td>
                            <td class="actions">
                                <a href="{{ route('admin.vendors.edit', $vendor->id) }}"><i
                                            class="fas fa-pencil-alt"></i></a>
                                <a href="" class="delete-row"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="14" style="text-align: center">No vendors found.</td>
                        </tr>
                    @endforelse
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
    </script>
@endpush
