@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h3>{{ isset($subCategory) ? 'Edit Sub Category' : 'Add Sub New Category' }}</h3>

<form class="action-buttons-fixed" action="{{ isset($subCategory) ? route('admin.sub-categories.update', $subCategory->id) : route('admin.sub-categories.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
    @csrf
    @if (isset($subCategory))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon bx bx-slider"></i>
                            <h2 class="card-big-info-title">Sub Category Details</h2>
                            <p class="card-big-info-desc">Add here the category description with all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row align-items-center">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Sub Category Image</label>
                                <div class="col-lg-7 col-xl-6">
                                    <label for="formFileLg" class="form-label"></label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="image">
                                    @if(isset($subCategory) && $subCategory->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/'.$subCategory->image) }}" alt="Current Image" style="max-height: 100px;">
                                            <p class="text-muted small mt-1">Current image</p>
                                        </div>
                                    @endif
                                    <span class="help-block"> Image !!! upload max 2MB </span>
                                </div>
                            </div>

                            <div class="form-group row mt-2 mb-4">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Parent Category</label>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="parent_id">Parent Category</label>
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            <option value="">No Parent Category</option>
                                            @foreach($vendorCategories as $category)
                                                <option value="{{ $category->id }}" {{ old('parent_id', $subCategory->parent_id ?? null) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-center mt-2 mb-4">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Sub Category Name</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control form-control-modern @error('title') is-invalid @enderror" name="title" value="{{ old('title', $subCategory->title ?? '') }}" required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-2 mb-4">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right pt-2 mt-1 mb-0">Description</label>
                                <div class="col-lg-7 col-xl-6">
                                    <textarea class="form-control form-control-modern @error('description') is-invalid @enderror" name="description" rows="6">{{ old('description', $subCategory->description ?? '') }}</textarea>
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

    <div class="row action-buttons">
        <div class="col-12 col-md-auto">
            <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
                <i class="bx bx-save text-4 me-2"></i>  {{ isset($subCategory) ? 'Update' : 'Save' }}
            </button>
        </div>
        <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
            <a href="{{route('admin.sub-categories.index')}}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>

    </div>
</form>