@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3>{{ isset($widget) ? 'Update Info' : 'New' }}</h3>
    <form class="action-buttons-fixed" action="{{ $widget ? route('admin.widgets.update', $widget->id) : route('admin.widgets.store') }}"
          method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mt-2 row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon bx bx-box"></i>
                            <h2 class="card-big-info-title">General Info</h2>
                            <p class="card-big-info-desc">Add here the description with all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="pb-3 form-group row align-items-center">
                                <label class="mb-0 control-label text-lg-start">Short_Link 1</label>
                                <div class="col-lg-10 col-xl-10">
                                    <input type="text" name="short_1" class="form-control"
                                           value="{{ $widget->short_1 ?? '' }}">
                                    @error('short_1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="pb-3 form-group row align-items-center">
                                <label class="mb-0 control-label text-lg-start">Short_Link 2</label>
                                <div class="col-lg-10 col-xl-10">
                                    <input type="text" name="short_2" class="form-control"
                                           value="{{ $widget->short_2 ?? '' }}">
                                    @error('short_2')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="pb-3 form-group row align-items-center">
                                <label class="mb-0 control-label text-lg-start">Short_Link 3</label>
                                <div class="col-lg-10 col-xl-10">
                                    <input type="text" name="short_3" class="form-control"
                                           value="{{ $widget->short_3 ?? '' }}">
                                    @error('short_3')
                                    <span class="text-danger">{{ $message }}</span>
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
                            <h2 class="card-big-info-title">Banner Image</h2>
                            <p class="card-big-info-desc">Upload image.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            @for($i=1; $i<=4; $i++)
                                <div class="mb-3">
                                    <label>Banner {{ $i }}</label>
                                    <input type="file" name="banner_{{ $i }}" class="form-control form-control-lg">
                                    @if($widget && $widget->{'banner_'.$i})
                                        <img src="{{ asset('storage/'.$widget->{'banner_'.$i}) }}"
                                             alt="Banner {{ $i }}" width="150" class="mt-2">
                                    @endif
                                </div>
                            @endfor
                                <div class="mt-2 mb-2 form-group row align-items-center">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="mb-3 form-control" id="status" name="status">
                                                <option value="0">Active</option>
                                                <option value="1">InActive</option>
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