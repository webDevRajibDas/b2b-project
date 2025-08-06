@foreach($menuCategories as $category)
    <li class="megamenu-container">
        <a class="sf-with-ul" href="#">{{ $category->title }}</a>
        <div class="megamenu">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="menu-col">
                        <div class="row">
                            @foreach($category->subcategories->chunk(2) as $chunk)
                                <div class="col-md-6">
                                    @foreach($chunk as $subcategory)
                                        <div class="menu-title">{{ $subcategory->title }}</div>
                                        <ul>
                                            @foreach($subcategory->subSubcategories as $subSubcategory)
                                                <li>
                                                    <a href="#">
                                                        {{ $subSubcategory->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </div><!-- End .col-md-6 -->
                            @endforeach
                        </div><!-- End .row -->
                    </div><!-- End .menu-col -->
                </div><!-- End .col-md-8 -->

            </div><!-- End .row -->
        </div><!-- End .megamenu -->
    </li>
@endforeach