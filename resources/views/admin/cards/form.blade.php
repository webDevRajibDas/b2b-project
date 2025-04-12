
<form class="smart-card-form action-buttons-fixed" action="#" method="POST" enctype="multipart/form-data">
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
                                <label class="col-lg-4 col-xl-4 control-label text-lg-end mb-0">Title</label>
                                <div class="col-lg-8 col-xl-8">
                                    <input type="text" class="form-control form-control-modern" name="name" value="" required />
                                </div>
                            </div>
                            <div class="form-group row align-items-center pb-3">
                                <label class="col-lg-4 col-xl-4 control-label text-lg-end mb-0">Regular Price</label>
                                <div class="col-lg-8 col-xl-8">
                                    <input type="text" class="form-control form-control-modern" name="price" value="" required />
                                </div>
                            </div>

                            <div class="form-group row align-items-center pb-3">
                                <label class="col-lg-4 col-xl-4 control-label text-lg-end mb-0">Sale Price</label>
                                <div class="col-lg-8 col-xl-8">
                                    <input type="text" class="form-control form-control-modern" name="sale_price" value="" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-5 col-xl-4 control-label text-lg-end pt-2 mt-1 mb-0">Short Description</label>
                                <div class="col-lg-7 col-xl-8">
                                    <textarea class="form-control form-control-modern" name="description" rows="3"></textarea>
                                </div>
                            </div>


                            <div class="form-group row pb-3">
                                <label class="col-lg-4 control-label text-lg-end pt-2"> Details Description </label>
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
                                        <label for="formFileLg" class="form-label">Product Main Image</label>
                                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="image">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-center mt-2 mb-2">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Gallery images</label>
                                        <input class="form-control" type="file" id="formFileMultiple" multiple name="images[]">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-center mt-2 mb-2">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control mb-3" id="status">
                                            <option value="active">Active</option>
                                            <option >InActive</option>
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
            <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
                <i class="bx bx-save text-4 me-2"></i>Save Card
            </button>
        </div>
        <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
            <a href="{{'admin.cards.index'}}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
        </div>
    </div>
</form>