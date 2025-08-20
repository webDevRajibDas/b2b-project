@foreach($menuCategories as $category)
    <li class="megamenu-container">
        <a class="sf-with-ul" href="{{ route('products.byCategory', $category->slug) }}">
            {{ $category->title }}
        </a>
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

                                                    <ul class="product-list">
                                                        @foreach($subSubcategory->products->take(5) as $product)
                                                            <li>
                                                                <a href="{{ route('product.show', $product->slug) }}">
                                                                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" width="100">
                                                                    {{ $product->name }}
                                                                    <span class="price">{{ $product->formatted_price }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                        @if($subSubcategory->products->count() > 5)
                                                            <li class="view-all">
                                                                <a href="{{ route('category.products', $subSubcategory->slug) }}">
                                                                    View All ({{ $subSubcategory->products->count() }})
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </div><!-- End .col-md-6 -->
                            @endforeach
                        </div><!-- End .row -->
                    </div><!-- End .menu-col -->
                </div><!-- End .col-md-8 -->

                <!-- Featured Products Column -->

            </div><!-- End .row -->
        </div><!-- End .mega menu -->
    </li>
@endforeach