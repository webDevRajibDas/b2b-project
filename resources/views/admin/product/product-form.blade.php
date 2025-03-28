<h1>{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</h1>
<form class="ecommerce-form action-buttons-fixed" action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
    @csrf
    @if (isset($product))
        @method('PUT')
    @endif
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
                            <h2 class="card-big-info-title">Product Details</h2>
                            <p class="card-big-info-desc">Add here the Vendors description with all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ isset($product) ? $product->name : old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ isset($product) ? $product->description : old('description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5">{{ isset($product) ? $product->content : old('content') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="vendor_id" class="form-label">Vendor Select</label>
                                <select id="vendor_id" class="form-control" name="vendor_id">
                                    <option value="0">Select Vendor</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="published" {{ (isset($product) && $product->status == 'published') ? 'selected' : '' }}>Published</option>
                                    <option value="draft" {{ (isset($product) && $product->status == 'draft') ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                @if (isset($product) && $product->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100" class="img-thumbnail">
                                    </div>
                                @endif
                            </div>

                            <!-- Images -->
                            <div class="mb-3">
                                <label for="images" class="form-label">Gallery Images</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple>
                                @if (isset($product) && $product->images)
                                    <div class="mt-2">
                                        @foreach (json_decode($product->images) as $image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100" class="img-thumbnail">
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- Pricing -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ isset($product) ? $product->price : old('price') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="sale_price" class="form-label">Sale Price</label>
                                <input type="number" step="0.01" class="form-control" id="sale_price" name="sale_price" value="{{ isset($product) ? $product->sale_price : old('sale_price') }}">
                            </div>

                            <!-- Stock Management -->
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ isset($product) ? $product->quantity : old('quantity') }}">
                            </div>

                            <div class="mb-3">
                                <label for="stock_status" class="form-label">Stock Status</label>
                                <select class="form-control" id="stock_status" name="stock_status" required>
                                    <option value="in_stock" {{ (isset($product) && $product->stock_status == 'in_stock') ? 'selected' : '' }}>In Stock</option>
                                    <option value="out_of_stock" {{ (isset($product) && $product->stock_status == 'out_of_stock') ? 'selected' : '' }}>Out of Stock</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="sku" class="form-label">Sku</label>
                                <select class="form-control" id="stock_status" name="sku">
                                    <option value="in_stock" {{ (isset($product) && $product->stock_status == 'in_stock') ? 'selected' : '' }}>In Stock</option>
                                    <option value="out_of_stock" {{ (isset($product) && $product->stock_status == 'out_of_stock') ? 'selected' : '' }}>Out of Stock</option>
                                </select>
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
                            <i class="bx bx-save text-4 mr-2"></i> Save
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>

</form>