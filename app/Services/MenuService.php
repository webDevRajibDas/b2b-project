<?php

namespace App\Services;
use App\Models\Category;


class MenuService
{


public function buildMenu()
    {
        return Category::with(['subcategories.subSubcategories'])
            ->where('status', 'active')
            ->orderBy('order')
            ->get();
    }


}


?>