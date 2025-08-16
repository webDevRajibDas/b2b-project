<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function shopList()
    {
        $products = Product::with('category')->latest()->paginate(2);
        return view('frontend.category-shop-list', ['productList' => $products]);
    }


    public function loadMore(Request $request)
    {
        $products = Product::with('category')->latest()->paginate(4);
        $html = '';
        if ($products->isNotEmpty()) {
            foreach ($products as $product) {
                $html .= view('frontend.products.partials._product_card', ['product' => $product])->render();
            }
        }
        return response()->json([
            'html' => $html,
            'hasMorePages' => $products->hasMorePages()
        ]);
    }


}
