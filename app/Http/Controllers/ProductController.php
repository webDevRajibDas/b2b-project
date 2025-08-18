<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function shopList()
    {
        $products = Product::with('category')->latest()->paginate(8);
        return view('frontend.category-shop-list', ['productList' => $products]);
    }


    public function loadMore(Request $request)
    {
        $products = Product::with('category')->latest()->paginate(8);
        $html = '';
        if ($products->isNotEmpty()) {
            foreach ($products as $product) {
                $html .= view('frontend.products.partials._product_card', ['product' => $product])->render();
            }
        }
        return response()->json([
            'html' => $html,
            'hasMorePages' => $products->hasMorePages(),
            'total' => $products->total(),
            'currentPage' => $products->currentPage(),
            'perPage' => $products->perPage(),
            'count' => $products->count() // Number of items on the current page
        ]);
    }


}
