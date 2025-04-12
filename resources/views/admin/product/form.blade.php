
<form class="ecommerce-form action-buttons-fixed" action="#" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row mt-2">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon bx bx-box"></i>
                            <h2 class="card-big-info-title">General Info</h2>
                            <p class="card-big-info-desc">Add here the product description with all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row align-items-center pb-3">
                                <label class="col-lg-4 col-xl-4 control-label text-lg-end mb-0">Name</label>
                                <div class="col-lg-8 col-xl-8">
                                    <input type="text" class="form-control form-control-modern" name="name" value="" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-5 col-xl-4 control-label text-lg-end pt-2 mt-1 mb-0">Short Description</label>
                                <div class="col-lg-7 col-xl-8">
                                    <textarea class="form-control form-control-modern" name="description" rows="3"></textarea>
                                </div>
                            </div>


                            <div class="form-group row pb-3">
                                <label class="col-lg-4 control-label text-lg-end pt-2">Product Details Content </label>
                                <div class="col-lg-8">
                                    <textarea class="summernote" name="content" data-plugin-summernote data-plugin-options='{ "height": 180 }'><p></p></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon bx bx-camera"></i>
                            <h2 class="card-big-info-title">Product Image</h2>
                            <p class="card-big-info-desc">Upload your Product image. You can add multiple images</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row align-items-center">
                                <div class="col">
                                    <div>
                                        <label for="formFileLg" class="form-label">Product main image</label>
                                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="image">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Gallery images</label>
                                        <input class="form-control" type="file" id="formFileMultiple" multiple name="images[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="tabs-modern row" style="min-height: 490px;">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <div class="nav flex-column tabs" id="tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="linked-products-tab" data-bs-toggle="pill" data-bs-target="#linked-products" role="tab" aria-controls="linked-products" aria-selected="true">Category, Brand</a>
                                <a class="nav-link" id="price-tab" data-bs-toggle="pill" data-bs-target="#price" role="tab" aria-controls="price" aria-selected="false">Price</a>
                                <a class="nav-link" id="attributes-tab" data-bs-toggle="pill" data-bs-target="#attributes" role="tab" aria-controls="attributes">Attributes</a>
{{--                                <a class="nav-link" id="inventory-tab" data-bs-toggle="pill" data-bs-target="#inventory" role="tab" aria-controls="inventory" aria-selected="false">Inventory</a>--}}
{{--                                <a class="nav-link" id="shipping-tab" data-bs-toggle="pill" data-bs-target="#shipping" role="tab" aria-controls="shipping" aria-selected="false">Shipping</a>--}}
{{--                                <a class="nav-link" id="advanced-tab" data-bs-toggle="pill" data-bs-target="#advanced" role="tab" aria-controls="advanced">Advanced</a>--}}
                                <a class="nav-link" id="meta-tab" data-bs-toggle="pill" data-bs-target="#metatab" role="tab" aria-controls="metatab">Search engine optimisation (SEO)</a>
                            </div>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="tab-content" id="tabContent">

                                <div class="tab-pane fade show active" id="linked-products" role="tabpanel" aria-labelledby="linked-products-tab">
                                    <div class="form-group row align-items-center pb-3">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Vendor</label>
                                        <div class="col-lg-7 col-xl-6">
                                            @php
                                                $vendors = \App\Models\Vendor::where('status', 'active') ->orderBy('id', 'asc')->get();
                                            @endphp
                                            <select data-plugin-selectTwo class="form-control form-control-modern" name="vendor_id">
                                                <option value="">Select a Vendor</option>
                                                @foreach($vendors as $data)
                                                    <option value="{{ $data->id }}" {{ old('vendor_id') == $data->id ? 'selected' : '' }}>
                                                        {{ $data->title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center pb-3">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Category</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <select data-plugin-selectTwo class="form-control form-control-modern" name="category_id">
                                                <option value="">Select a category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Brand</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <select data-plugin-selectTwo class="form-control form-control-modern" name="brand_id">
                                                <option value="">Select a brand</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                        {{ $brand->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">
                                    <div class="form-group row align-items-center pb-3">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Regular Price ($)</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <input type="text" class="form-control form-control-modern" name="price" value="" required />
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Sale Price ($)</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <input type="text" class="form-control form-control-modern" name="sale_price" value="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="attributes" role="tabpanel" aria-labelledby="attributes-tab">
                                    <div class="ecommerce-attributes-wrapper">
                                        <div class="form-group row justify-content-center ecommerce-attribute-row pb-3">
                                            <div class="col-xl-3">
                                                <label class="control-label">Name</label>
                                                <input type="text" class="form-control form-control-modern" name="attName" value="Size" />
                                                <div class="checkbox mt-3 mb-3 mb-lg-0">
                                                    <label class="my-2">
                                                        <input type="checkbox" name="attVisible" value="1" checked>
                                                        Visible on the product page
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <a href="#" class="ecommerce-attribute-remove text-color-danger float-end">Remove</a>
                                                <label class="control-label">Value(s)</label>
                                                <textarea class="form-control form-control-modern" name="attValue" rows="4" placeholder="Enter some text, or some attributes by | separating values">Small|Medium|Big</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center ecommerce-attribute-row">
                                            <div class="col-xl-3">
                                                <label class="control-label">Name</label>
                                                <input type="text" class="form-control form-control-modern" name="attName" value="Color" />
                                                <div class="checkbox mt-3 mb-3 mb-lg-0">
                                                    <label class="my-2">
                                                        <input type="checkbox" name="attVisible" value="1" checked>
                                                        Visible on the product page
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <a href="#" class="ecommerce-attribute-remove text-color-danger float-end">Remove</a>
                                                <label class="control-label">Value(s)</label>
                                                <textarea class="form-control form-control-modern" name="attValue" rows="4" placeholder="Enter some text, or some attributes by | separating values">Blue|Red|Green</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-4">
                                        <div class="col-xl-9 text-end">
                                            <a href="#" class="ecommerce-attribute-add-new btn btn-primary btn-px-4 btn-py-2">+ Add New</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="metatab" role="tabpanel" aria-labelledby="meta-tab">
                                    <div class="form-group row align-items-center pb-3">
                                        <label class="col-lg-5 col-xl-4 control-label text-lg-end mb-0">Meta Title</label>
                                        <div class="col-lg-8 col-xl-6">
                                            <input type="text" class="form-control form-control-modern" name="meta_title" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Meta description</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <input type="text" class="form-control form-control-modern" name="meta_description" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Meta keywords</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <input type="text" class="form-control form-control-modern" name="meta_keywords" value="" />
                                        </div>
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
                <i class="bx bx-save text-4 me-2"></i> Save Product
            </button>
        </div>
        <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
            <a href="#" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>
    </div>
</form>