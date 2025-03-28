<form class="ecommerce-form action-buttons-fixed" action="{{route('admin.vendors.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon bx bx-slider"></i>
                            <h2 class="card-big-info-title">Vendors Details</h2>
                            <p class="card-big-info-desc">Add here the Vendors description with all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row align-items-center">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Vendor Image</label>
                                <div class="col-lg-7 col-xl-6">
                                    <label for="formFileLg" class="form-label"></label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="file_path">
                                    <span class="help-block">Vendor image !!! upload max 2MB </span>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Vendor Name</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control form-control-modern" name="title" value="" required="">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Parent Category</label>
                                <div class="col-lg-6">
                                    <select id="parentCategory" class="form-control" name="categorie_id">
                                        <option value="0">Select Parent Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Sub Category</label>
                                <div class="col-lg-6">
                                    <select id="subCategory" class="form-control populate" name="sub_categories_id">
                                        <option value="0">Select Sub Category</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right pt-2 mt-1 mb-0">Description</label>
                                <div class="col-lg-7 col-xl-6">
                                    <textarea class="form-control form-control-modern" name="description" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Mobile</label>
                                <div class="col-lg-7 col-xl-6">
                                    <input type="text" class="form-control form-control-modern" name="phone" value="" required="">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label class="col-lg-4 col-xl-3 control-label text-lg-right mb-0">Email</label>
                                <div class="input-group mb-3 col-lg-8 col-xl-6">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Email" name="email">

                                </div>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Address</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Website Link</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="web_link" name="website_link">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="page_link">Page Link</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="page_link" name="page_link">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="location">Business Type</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="business_type" name="business_type">
                                    @error('business_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="business_registration_number">Registration Number</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="registration_number" name="business_registration_number">
                                    @error('business_registration_number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="contact_person">Contact Person</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="contact_person" name="contact_person">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Join Date</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
										<span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control" name="join_date">
                                        @error('join_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex flex-row-reverse">
                    <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                        <a href="#" class="cancel-button mb-1 mt-1 mr-1 btn btn-info">Cancel</a>
                    </div>
                    <div class="col-12 col-md-auto">
                        <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">
                            <i class="bx bx-save text-4 mr-2"></i> Save Vendor
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>

</form>