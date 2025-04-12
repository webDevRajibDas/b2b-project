
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h3>Edit</h3>

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
                                    <input type="text" class="form-control form-control-modern" name="name" value="{{$product->name}}" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-5 col-xl-4 control-label text-lg-end pt-2 mt-1 mb-0">Short Description</label>
                                <div class="col-lg-7 col-xl-8">
                                    <textarea class="form-control form-control-modern" name="description" rows="3">{{$product->description}}</textarea>
                                </div>
                            </div>


                            <div class="form-group row pb-3">
                                <label class="col-lg-4 control-label text-lg-end pt-2">Product Details Content </label>
                                <div class="col-lg-8">
                                    <textarea class="summernote" name="content" data-plugin-summernote data-plugin-options='{ "height": 200 }'>{!! $product->content !!}</textarea>
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
                                            @if(isset($product) && $product->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{$product->name}}" style="max-height: 100px;">
                                                    <p class="text-muted small mt-1">Current image</p>
                                                </div>
                                            @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Gallery images</label>
                                        <input class="form-control" type="file" id="formFileMultiple" multiple
                                               name="images[]">
                                    </div>

                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div class="p-2 bd-highlight">
                                            @if($product->gallery && $product->gallery->count() > 0)
                                                @foreach($product->gallery as $image)
                                                    <div class="owl-dot dot-thumbnail">
                                                        <img src="{{asset('storage/'.$product->image_path)}}" width="110"
                                                             height="110" alt="product-thumbnail"/>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>No images available for this product.</p>
                                            @endif
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
                <i class="bx bx-save text-4 me-2"></i> Update Product
            </button>
        </div>
        <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
            <a href="{{'admin.products.index'}}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>
    </div>
</form>