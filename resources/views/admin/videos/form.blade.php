
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3>{{ isset($video) ? 'Update Link' : 'Add Video Link' }}</h3>

<form class="action-buttons-fixed" action="{{ isset($video) ? route('admin.videos.update', $video->id) : route('admin.videos.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
    @csrf
    @if (isset($video))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon bx bx-slider"></i>
                            <h2 class="card-big-info-title">Videos Details</h2>
                            <p class="card-big-info-desc">Add here the video description with all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">

                            <!-- Name Field -->
                            <div class="form-group row align-items-center mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Title</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control form-control-modern @error('title') is-invalid @enderror" name="title" value="{{ old('title', $video->title ?? '') }}">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-center mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Video URL</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control form-control-modern @error('video_url') is-invalid @enderror" name="video_url" value="{{ old('video_url', $video->video_url ?? '') }}" required>
                                    @error('video_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-center pb-3">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Page Type</label>
                                <div class="col-lg-7 col-xl-6">
                                    <select name="type" id="video_id" class="form-control">
                                        <option value="1">Card Page</option>
                                        <option value="2">Home Page</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row align-items-center pb-3">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Status</label>
                                <div class="col-lg-7 col-xl-6">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row action-buttons">
        <div class="col-12 col-md-auto">
            <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
                <i class="bx bx-save text-4 me-2"></i> {{ isset($video) ? 'Update' : 'Save' }}
            </button>
        </div>
        <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
            <a href="{{ route('admin.videos.index') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>
    </div>
</form>