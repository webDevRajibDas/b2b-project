
<x-alert-error class="mb-4 p-3 rounded-lg" />
<h2>{{ isset($slider) ? 'Edit Slider' : 'Create Slider' }}</h2>
<form action="{{ isset($slider) ? route('admin.sliders.update', $slider->id) : route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($slider))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon bx bx-slider"></i>
                            <h2 class="card-big-info-title">Slider Details</h2>
                            <p class="card-big-info-desc">Add here the category description with all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row align-items-center mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Slider Image</label>
                                <div class="col-lg-7 col-xl-6">
                                    <label for="formFileLg" class="form-label"></label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="image">
                                    <span class="help-block">Slider image !!! upload max 4MB </span>
                                </div>
                            </div>

                            <div class="form-group row align-items-center pb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Title</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" name="title" class="form-control" value="{{ $slider->title ?? old('title') }}" required="">
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right pt-2 mt-1 mb-0">Description</label>
                                <div class="col-lg-7 col-xl-6">
                                    <textarea name="description" class="form-control">{{ $slider->description ?? old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right pt-2 mt-1 mb-0">Upload Video</label>
                                <div class="col-lg-7 col-xl-6">
                                  <input type="file" name="video_path" class="form-control form-control-modern">
                                </div>
                            </div>

                            <div class="form-group row align-items-center pb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Video Link</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" name="video_link" class="form-control form-control-modern" value="{{ $slider->video_link ?? old('video_link') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ isset($slider) && $slider->status ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ isset($slider) && !$slider->status ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row action-buttons">
        <div class="col-12 col-md-auto">
            <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
                <i class="bx bx-save text-4 me-2"></i> Save
            </button>
        </div>
        <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
            <a href="{{route('admin.sliders.index')}}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>

    </div>
</form>