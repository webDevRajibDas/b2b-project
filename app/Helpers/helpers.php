<?php

use App\Models\Category;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Str;


/*
 * Global helpers file with misc functions.
 */
if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertYmdToMdy')) {
    function convertYmdToMdy($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertMdyToYmd')) {
    function convertMdyToYmd($date)
    {
        return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
    }
}



if (! function_exists('getCartCount')) {
    function getCartCount()
    {
        $user_id = auth()->id() ?? session()->getId();
        $cart_count = Cookie::get('cart_count');
        if (!$cart_count) {
            $cart_count = Cart::where('user_id', $user_id)->sum('quantity');

            // Store cart count in a cookie (valid for 60 minutes)
            Cookie::queue('cart_count', $cart_count, 60);
        }

        return $cart_count;
    }
}


if (!function_exists('ProductCategoryDropdown')) {
    /**
     * Generate a dropdown menu for product categories.
     *
     * @param string $name The name attribute for the dropdown.
     * @param int|null $selected The ID of the selected category (optional).
     * @param array $attributes Additional HTML attributes for the dropdown (optional).
     * @return string
     */
    function ProductCategoryDropdown($name, $selected = null, $attributes = [])
    {

        $categories = Category::all();
        $html = '<select name="' . $name . '"';
        foreach ($attributes as $key => $value) {
            $html .= ' ' . $key . '="' . $value . '"';
        }
        $html .= '>';
        $html .= '<option value="">Select a category</option>';
        foreach ($categories as $category) {
            $html .= '<option value="' . $category->id . '"';
            if ($selected == $category->id) {
                $html .= ' selected';
            }
            $html .= '>' . $category->name . '</option>';
        }
        $html .= '</select>';
        return $html;
    }



    if (!function_exists('ProductCategoryMenu')) {
        function ProductCategoryMenu($categories)
        {
            $html = '<ul class="submenu">';
            foreach ($categories as $category) {
                if ($category) {
                    $html .= '<li><a href="#">' . $category->name . '</a>';
                    // Check if the category has children
                    $children = $categories;
                    if ($children->isNotEmpty()) {
                        $html .= ProductCategoryMenu($categories);
                    }

                    $html .= '</li>';
                }
            }

            $html .= '</ul>';

            return $html;
        }
    }



    function format_currency($amount) {
        return number_format($amount, 2);
    }

    function calculate_discount_percentage($original, $sale) {
        return round((($original - $sale) / $original) * 100);
    }



}