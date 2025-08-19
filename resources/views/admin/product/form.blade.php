
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
                                    <input type="text" class="form-control form-control-modern @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name ?? '') }}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-lg-5 col-xl-4 control-label text-lg-end pt-2 mt-1 mb-0">Short Description</label>
                                <div class="col-lg-7 col-xl-8">
                                    <textarea class="form-control form-control-modern" name="description" rows="3">{{$product->description ?? ''}}</textarea>
                                </div>
                            </div>


                            <div class="form-group row pb-3">
                                <label class="col-lg-4 control-label text-lg-end pt-2">Product Details </label>
                                <div class="col-lg-8">
                                    <textarea class="summernote" name="content" data-plugin-summernote data-plugin-options='{ "height": 180 }'>{{old('content',$product->content ?? '')}}</textarea>
                                    @error('content')
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
                                        <label for="formFileLg" class="form-label"> Product main image: Dimensions must be Height 218px and Width 192px</label>
                                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="image" required>
                                        <small class="form-text text-muted">Only JPEG, PNG, JPG, or GIF files allowed, max size 4MB.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="images" class="form-label">Gallery images</label>
                                        <input class="form-control" type="file" id="images" multiple name="images[]">
                                    </div>

                                    <div id="image_preview" style="width:100%;">

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
                                <a class="nav-link active" id="linked-products-tab" data-bs-toggle="pill" data-bs-target="#linked-products" role="tab" aria-controls="linked-products" aria-selected="true">Category, Brand , Label</a>
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
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Main Category</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <select data-plugin-selectTwo class="form-control form-control-modern" name="category_id" id="categorieId">
                                                <option value="">Please Select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center pb-3">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Sub Category</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <select data-plugin-selectTwo class="form-control form-control-modern" name="sub_categorie_id" id="subCategorie">
                                                <option value="">Select a category</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center pb-3">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Sub SubCategory</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <select data-plugin-selectTwo class="form-control form-control-modern" name="sub_subcategorie_id" id="subSubCategories">
                                                <option value="">Select a category</option>
                                                @foreach($categories as $data)
                                                    <option value="{{ $data->id }}" {{ old('sub_subcategorie_id', $product->sub_subcategorie_id ?? null) == $data->id ? 'selected' : '' }} >{{ $data->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row align-items-center pb-3">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Labels</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <select data-plugin-selectTwo class="form-control form-control-modern" name="label_id">
                                                <option value="">Select a Label</option>
                                                @foreach($labels as $label)
                                                    <option value="{{ $label->id }}" {{ old('label_id', $product->label_id ?? null) == $label->id ? 'selected' : '' }} >{{ $label->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center pb-3">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Brand</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <select data-plugin-selectTwo class="form-control form-control-modern" name="brand_id">
                                                <option value="">Select a brand</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id ?? null) == $brand->id ? 'selected' : '' }} >{{ $brand->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">
                                    <div class="form-group row align-items-center pb-3">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Regular Price (TK)</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <input type="number"
                                                   class="form-control form-control-modern @error('price') is-invalid @enderror"
                                                   value="{{ isset($product) ? $product->price : old('price') }}"
                                                   name="price" />
                                            @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Discount Price (TK)</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <input type="number"
                                                   class="form-control form-control-modern @error('sale_price') is-invalid @enderror"
                                                   value="{{ isset($product) ? $product->sale_price : old('sale_price') }}"
                                                   name="sale_price" required/>
                                            @error('sale_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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
                                                <textarea class="form-control form-control-modern" name="attValue" rows="4" placeholder="Enter some text, or some attributes by | separating values"> Small,Medium,Big</textarea>
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
                                                <textarea class="form-control form-control-modern" name="attValue" rows="4" placeholder="Enter some text, or some attributes by | separating values">Blue,Red,Green</textarea>
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
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Meta Title</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <input type="text" class="form-control form-control-modern" name="meta_title" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center mb-2">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Meta description</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <textarea class="form-control form-control-modern" aria-label="With textarea" name="meta_description">{{ old('meta_description', @$product->meta_description ?? '') }}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group row align-items-center mb-2">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Meta keywords</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <textarea class="form-control form-control-modern" aria-label="With textarea" name="meta_keywords">{{ old('meta_keywords', @$product->meta_keywords ?? '') }}</textarea>
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