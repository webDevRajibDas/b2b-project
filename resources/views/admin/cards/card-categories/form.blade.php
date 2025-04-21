<h4>{{ isset($cardCategory) ? 'Edit Category' : 'Add New Category' }}</h4>
<form class="action-buttons-fixed" action="{{ isset($cardCategory) ? route('admin.card-categories.update', $cardCategory->id) : route('admin.card-categories.store') }}" method="post">
    @csrf
        @if (isset($cardCategory))
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
                            <h2 class="card-big-info-title">Category Details</h2>
                            <p class="card-big-info-desc">Add here the category description with all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row align-items-center mb-3">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Category Name</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control form-control-modern" id="title" name="name" value="{{ isset($cardCategory) ? $cardCategory->name : old('name') }}" required>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group row">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0">Status</label>
                                <div class="col-lg-7 col-xl-6">
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="active" {{ (isset($cardCategory) && $cardCategory->status == 'active') ? 'selected' : '' }}> --Active-- </option>
                                        <option value="inactive" {{ (isset($cardCategory) && $cardCategory->status == 'inactive') ? 'selected' : '' }}> --Inactive-- </option>
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
                @if (isset($cardCategory))
                    Update
                @else
                    Save
                @endif
            </button>
        </div>

        <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
            <a href="{{route('admin.card-categories.index')}}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>
    </div>
</form>

