
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3>{{ isset($category) ? 'Update Category' : 'Add New Category' }}</h3>

<form class="action-buttons-fixed" action="{{ isset($category) ? route('admin.vendor-categories.update', $category->id) : route('admin.vendor-categories.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
    @csrf
    @if (isset($category))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon bx bx-slider"></i>
                            <h2 class="card-big-info-title">Category Details</h2>
                            <p class="card-big-info-desc">Add here the category description with all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <!-- Image Field -->
                            <div class="form-group row align-items-center">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Category Image</label>
                                <div class="col-lg-7 col-xl-6">
                                    <label for="formFileLg" class="form-label"></label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="image" accept="image/*">
                                    @if(isset($category) && $category->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/'.$category->image) }}" alt="Current category image" style="max-height: 100px;">
                                            <p class="text-muted small mt-1">Current image</p>
                                        </div>
                                    @endif
                                    <span class="help-block">Upload image (max 2MB, JPG/PNG)</span>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Name Field -->
                            <div class="form-group row align-items-center mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Category Name</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control form-control-modern @error('title') is-invalid @enderror" name="title" value="{{ old('title', $category->title ?? '') }}" required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description Field -->
                            <div class="form-group row">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right pt-2 mt-1 mb-0">Description</label>
                                <div class="col-lg-7 col-xl-6">
                                    <textarea class="form-control form-control-modern @error('description') is-invalid @enderror" name="description" rows="6">{{ old('description', $category->description ?? '') }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                <i class="bx bx-save text-4 me-2"></i> {{ isset($category) ? 'Update' : 'Save' }}
            </button>
        </div>
        <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
            <a href="{{ route('admin.vendor-categories.index') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>
    </div>
</form>