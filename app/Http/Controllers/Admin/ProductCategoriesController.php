<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
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
            'title' => 'required|string|max:191|unique:categories,title',
            'description' => 'nullable|string',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        $count = Category::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        Category::create([
            'title' => $validated['title'],
            'status' => $request->status,
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
    public function edit($id)
    {
        $productCategory = Category::findOrFail($id);
        return view('admin.product.product-categories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoryData = Category::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:191|unique:categories,title,' . $categoryData->id,
            'status' => 'nullable|string',
        ]);

        $categoryData->update($request->all());
        return redirect()->route('admin.product-categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id){
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            // 3. Redirect back with a success message
            return redirect()->route('admin.product-categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error("Category not found for deletion: ID {$id}", ['exception' => $e]);
            return redirect()->route('product-categories.index')->with('error', 'Category not found.');
        } catch (\Exception $e) {
            Log::error("Error deleting category ID {$id}: " . $e->getMessage(), ['exception' => $e]);
            return redirect()->route('product-categories.index')->with('error', 'Could not delete category. Please try again.');
        }


    }


    public function updateOrderPosition(Request $request)
    {
        //dd($request->all());
        // 1. Validate the incoming data
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:categories,id',
            'order' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity for validation errors
        }

        try {
            // 2. Find the category and update its order
            $category = Category::findOrFail($request->input('id'));
            $category->order = $request->input('order');
            $category->save();

            // 3. Return a success response
            return response()->json([
                'success' => true,
                'message' => "Order for '{$category->title}' updated to {$category->order}."
            ]);

        } catch (\Exception $e) {
            // 4. Handle any errors and return an error response
            Log::error("Failed to update category order: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the order.'
            ], 500); // 500 Internal Server Error
        }

    }







}
