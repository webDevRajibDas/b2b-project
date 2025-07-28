@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3>{{ isset($card) ? 'Update Info' : 'Add New' }}</h3>
<form class="action-buttons-fixed" action="{{ isset($card) ? route('admin.cards.update', $card->id) : route('admin.cards.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if (isset($card))
        @method('PUT')
    @endif
    <div class="mt-2 row">
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
                            <div class="pb-3 form-group row align-items-center">
                                <label class="mb-0 col-lg-4 col-xl-4 control-label text-lg-end">Title</label>
                                <div class="col-lg-8 col-xl-8">
                                    <input type="text" class="form-control form-control-modern" name="title" value="{{ isset($card) ? $card->title : old('title') }}" required />
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="pb-3 form-group row align-items-center">
                                <label class="mb-0 col-lg-4 col-xl-4 control-label text-lg-end">Category</label>
                                <div class="col-lg-8 col-xl-8">
                                    <select name="card_categorie_id" id="category_id" class="form-control">
                                        <option value="0"> Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('card_categorie_id', $card->card_categorie_id ?? null) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="pb-3 form-group row align-items-center">
                                <label class="mb-0 col-lg-4 col-xl-4 control-label text-lg-end">Page Type</label>
                                <div class="col-lg-8 col-xl-8">
                                    <select name="type" id="type" class="form-control">
                                        <option value="card">Card</option>
                                        <option value="digital_product">Digital Product</option>
                                    </select>
                                </div>
                            </div>

                            <div class="pb-3 form-group row align-items-center">
                                <label class="mb-0 col-lg-4 col-xl-4 control-label text-lg-end">Regular Price</label>
                                <div class="col-lg-8 col-xl-8">
                                    <input type="number" class="form-control form-control-modern" name="price" value="{{ isset($card) ? $card->price : old('price') }}" required />
                                </div>
                            </div>

                            <div class="pb-3 form-group row align-items-center">
                                <label class="mb-0 col-lg-4 col-xl-4 control-label text-lg-end">Sale Price</label>
                                <div class="col-lg-8 col-xl-8">
                                    <input type="number" class="form-control form-control-modern" name="sale_price" value="{{ isset($card) ? $card->sale_price : old('sale_price') }}" required />
                                </div>
                            </div>
                            <div class="pb-3 form-group row align-items-center">
                                <label class="pt-2 mt-1 mb-0 col-lg-5 col-xl-4 control-label text-lg-end">Short Description</label>
                                <div class="col-lg-7 col-xl-8">
                                   <textarea class="form-control form-control-modern"
                                           name="description"
                                           rows="3"
                                   >{{ old('description', $card->description ?? '') }}</textarea>
                                </div>
                            </div>


                            <div class="pb-3 form-group row">
                                <label class="pt-2 col-lg-4 control-label text-lg-end">Details Description</label>
                                <div class="col-lg-8">
                                <textarea class="summernote" name="content" data-plugin-summernote data-plugin-options='{ "height": 200 }'>{!! old('content', $card->content ?? '') !!}</textarea>
                                </div>
                            </div>

                            <div class="ecommerce-attributes-wrapper">
                                <div class="pb-3 form-group row justify-content-center ecommerce-attribute-row">
                                    <div class="col-xl-4">
                                        <label class="control-label text-lg-end">Chosse Option</label>
                                        <input type="text" class="form-control form-control-modern" name="attr_price[]" value="" placeholder="Price" />
                                    </div>
                                    <div class="col-xl-8">
                                        <a href="#" class="ecommerce-attribute-remove text-color-danger float-end">Remove</a>
                                        <label class="control-label">Value</label>
                                        <input type="text" class="form-control form-control-modern" name="attr_packege[]" value="" placeholder="Duration" />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="mt-2 row justify-content-center">
                                <div class="col-xl-12 col-sm-12 text-end">
                                    <a href="#" class="ecommerce-attribute-add-new btn btn-primary btn-px-4 btn-py-2">+ Add New</a>
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
                            <h2 class="card-big-info-title">Card Image</h2>
                            <p class="card-big-info-desc">Upload your Product image. You can add multiple images</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row align-items-center">
                                <div class="col">
                                    <div>
                                        <label for="formFileLg" class="form-label">Card Main Image</label>
                                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="image">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2 mb-2 form-group row align-items-center">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Gallery images</label>
                                        <input class="form-control" type="file" id="formFileMultiple" multiple name="images[]">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2 mb-2 form-group row align-items-center">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="mb-3 form-control" id="status" name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">InActive</option>
                                        </select>
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
            <button type="submit" class="py-3 submit-button btn btn-primary btn-px-4 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
                <i class="bx bx-save text-4 me-2"></i>Save Card
            </button>
        </div>
        <div class="mt-3 col-12 col-md-auto px-md-0 mt-md-0">
            <a href="{{route('admin.cards.index')}}" class="py-3 border cancel-button btn btn-light btn-px-4 font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>
    </div>
</form>