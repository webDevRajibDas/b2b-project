@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="ecommerce-form action-buttons-fixed" action="{{route('admin.vendors.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
    @csrf
    <div class="row mt-2">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon bx bx-box"></i>
                            <h2 class="card-big-info-title">General Info</h2>
                            <p class="card-big-info-desc">Add here the vendor description with all details and necessary information.</p>
                        </div>

                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row mb-2">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Main Category</label>
                                <div class="col-lg-6">
                                    <select id="parentCategory" class="form-control" name="vendor_category_id">
                                        <option value="0">Select Main Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-2 mt-2">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Sub Category</label>
                                <div class="col-lg-6">
                                    <select id="subCategory" class="form-control populate" name="sub_categories_id">
                                        <option value="0">Select Sub Category</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row align-items-center pb-3">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Name</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control form-control-modern" name="title" value="{{ isset($vendor) ? $vendors->title : old('name') }}" required />
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0">Description</label>
                                <div class="col-lg-7 col-xl-6">
                                    <textarea class="form-control form-control-modern" name="description" rows="3"> {{ isset($vendor) ? $vendors->description : old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $description }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-center mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Vendor Image</label>
                                <div class="col-lg-7 col-xl-6">
                                    <label for="formFileLg" class="form-label"></label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="file_path">
                                    <span class="help-block">Vendor image !!! upload max 2MB </span>
                                </div>
                            </div>

                            <div class="form-group row align-items-center mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Mobile</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control form-control-modern" name="phone" value="{{ isset($vendor) ? $vendor->phone : old('phone') }}" required="">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-center mb-2">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Email</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control" placeholder="Email" name="email" autocomplete="true">
                                </div>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Address</label>
                                <div class="col-lg-8 col-xl-6">
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Website Link</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="web_link" name="website_link">
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="page_link">Page Link</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="page_link" name="page_link">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="location">Business Type</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="business_type" name="business_type" value="{{ isset($vendor) ? $vendor->business_type : old('business_type') }}">
                                    @error('business_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="business_registration_number">Registration Number</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="registration_number" name="business_registration_number">
                                    @error('business_registration_number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="contact_person">Contact Person</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="contact_person" name="contact_person">
                                    @error('contact_person')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pb-3">
                                <label class="col-lg-3 control-label text-lg-end pt-2">Join Date</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-text">
															<i class="fas fa-calendar-alt"></i>
														</span>
                                        <input type="text" data-plugin-datepicker class="form-control" name="join_date">
                                        @error('join_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
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
            <a href="{{route('admin.vendors.index')}}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>

    </div>
</form>