<h4>{{ isset($subCategory) ? 'Edit Category' : 'Add New Category' }}</h4>
<form class="ecommerce-form action-buttons-fixed" action="{{ isset($subCategory) ? route('admin.sub-categories.update', $subCategory->id) : route('admin.sub-categories.store') }}" method="post">
    @csrf
    @if (isset($subCategory))
        @method('PUT')
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon bx bx-slider"></i>
                            <h2 class="card-big-info-title">Sub Category Details</h2>
                            <p class="card-big-info-desc">Add here the category description with all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row align-items-center mb-3">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Category Name</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control form-control-modern" id="title" name="title" value="{{ isset($subCategory) ? $subCategory->title : old('title') }}" required>
                                </div>
                            </div>


                            <div class="form-group row mt-2 mb-4">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Parent Category</label>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            <option value="">Select  Category</option>
                                            @foreach($categories as $data)
                                                <option value="{{ $data->id }}" {{ old('parent_id', $subCategory->parent_id ?? null) == $data->id ? 'selected' : '' }} >{{ $data->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group row">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0">Status</label>
                                <div class="col-lg-7 col-xl-6">
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="active" {{ (isset($subCategory) && $subCategory->status == 'active') ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ (isset($subCategory) && $subCategory->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
                                    </select>
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
                <i class="bx bx-save text-4 me-2"></i>
                @if (isset($subCategory))
                    Update
                @else
                    Save
                @endif
            </button>
        </div>

        <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
            <a href="{{route('admin.sub-categories.index')}}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>
        <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
            <a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                <i class="bx bx-trash text-4 me-2"></i> Delete Category
            </a>
        </div>
    </div>
</form>