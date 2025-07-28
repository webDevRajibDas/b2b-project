
<li class="megamenu-container">
    <a class="sf-with-ul" href="#"><i class="icon-laptop"></i>Electronics</a>
    <div class="megamenu">
        <div class="row no-gutters">
            @foreach($megaMenuCategories->chunk(ceil($megaMenuCategories->count()/2)) as $chunk)
                <div class="col-md-6">
                    @foreach($chunk as $category)
                        <div class="menu-title">{{ $category->name }}</div>
                        <ul>
                            @foreach($category->children as $subcategory)
                                <li>
                                    <a href="{{ route('category.show', $subcategory->slug) }}">
                                        {{ $subcategory->name }}
                                    </a>
                                    @if($subcategory->children->count())
                                        <ul class="submenu">
                                            @foreach($subcategory->children as $child)
                                                <li>
                                                    <a href="{{ route('category.show', $child->slug) }}">
                                                        {{ $child->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</li>