@extends('admin.layouts.admin-master')

@section('title', 'Slider')

@section('content')
    <section class="card">

        <div class="card-header d-flex justify-content-between align-items-center gap-3">
            <h2 class="card-title">Slider List</h2>
            <a class="mb-1 mt-1 mr-1 btn btn-primary" href="{{url('admin/sliders/create')}}">Create</a>
        </div>

        <div class="card-body">
            <table id="sliderTable" class="display table table-bordered table-striped mb-0 dataTable no-footer" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $sdata)
                        <tr>
                            <td>{{$sdata->id}}</td>
                            <td>{{$sdata->title}}</td>
                            <td>{{$sdata->description}}</td>
                            <td>{{$sdata->video_link}}</td>
                            <td>
                                <img src="{{ asset('storage/' . $sdata->image) }}" alt="{{$sdata->title}}" width="150">
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
