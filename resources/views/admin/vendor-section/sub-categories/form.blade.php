@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="ecommerce-form action-buttons-fixed" action="{{route('admin.sub-categories.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
    @csrf
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
                                    <span class="help-block">Category image !!! upload max 2MB </span>
                                </div>
                            </div>

                            <div class="form-group row mt-2 mb-4">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Parent Category</label>
                                <div class="col-lg-6">
                                    <select 2="" data-plugin-selecttwo="" class="form-control populate" name="parent_id" data-plugin-options="{ " minimuminputlength":="" }"="">
                                    <optgroup label="Parent Category">
                                        <option value="">Select Parent Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                    </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row align-items-center mt-2 mb-4">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Sub Category Name</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control form-control-modern" name="title" value="" required="">
                                </div>
                            </div>


                            <div class="form-group row mt-2 mb-4">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right pt-2 mt-1 mb-0">Description</label>
                                <div class="col-lg-7 col-xl-6">
                                    <textarea class="form-control form-control-modern" name="description" rows="6"></textarea>
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
                <i class="bx bx-save text-4 me-2"></i> Save
            </button>
        </div>
        <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
            <a href="{{route('admin.sub-categories.index')}}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>

    </div>
</form>