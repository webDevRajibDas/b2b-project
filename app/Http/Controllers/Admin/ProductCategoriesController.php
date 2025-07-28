<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.product.product-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.product-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191|unique:product_categories,title',
            'description' => 'nullable|string',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        $count = ProductCategory::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        ProductCategory::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'created_by' => auth()->user()->id,
            'description' => $validated['description'] ?? null,
        ]);

        //ProductCategory::create($request->all());
        return redirect()->route('admin.product-categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product.product-categories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            'title' => 'required|string|max:191|unique:product_categories,title,' . $productCategory->id,
            'status' => 'nullable|string',
        ]);

        $productCategory->update($request->all());

        return redirect()->route('admin.product-categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return redirect()->route('product-categories.index')->with('success', 'Category deleted successfully.');
    }
}
