<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategorie;
use App\Models\SubSubcategorie;
use App\Models\VendorCategorie;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SubSubcategoriesController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $allData = SubSubcategorie::with(['category','subCategory'])->get();
        return view('admin.product.sub-sub-categories.index', compact('allData'));
    }


    public function create()
    {
        $categories = Category::all();
        $sub_categories = SubCategorie::all();
        return view('admin.product.sub-sub-categories.create', compact('categories','sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:191|unique:sub_subcategories,title',
            'category_id' => 'required|exists:categories,id',
            'subcategorie_id' => 'required|exists:sub_categories,id',
            'slug' => 'nullable|string|max:191|unique:sub_subcategories,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        $count = SubCategorie::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $filePath = null;
        if ($request->hasFile('image')) {
            $filePath = $this->uploadImage($request->file('image'), 'sub_sub_category');
            if ($filePath === null) {

                return back()->withErrors(['image' => 'Image upload failed.'])->withInput();
            }
        }

         SubSubcategorie::create([
            'title' => $validated['title'],
            'categorie_id' => $validated['category_id'],
            'sub_categorie_id' => $validated['subcategorie_id'],
            'slug' => $slug,
            'image' => $filePath,
            'description' => $validated['description'] ?? null,
        ]);
        return redirect()->route('admin.sub-sub-categories.index')->with('success', 'Sub SubCategory created successfully!');
    }


    public function edit($id)
    {
        $subSubCategorie = SubSubcategorie::with(['category','subCategory'])->findOrFail($id);
        $categories = Category::all();
        $sub_categories = SubCategorie::all();
        return view('admin.product.sub-sub-categories.edit', compact('subSubCategorie','sub_categories','categories'));
    }

    public function show($id)
    {
    }

    public function update(Request $request, SubSubcategorie $subCategory)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:191',
                Rule::unique('sub_categories', 'title')->ignore($subCategory->id),
            ],
            'parent_id' => [
                'required',
                Rule::exists('vendor_categories', 'id')
            ],
            'slug' => [
                'nullable', 'string', 'max:191',
                Rule::unique('sub_categories')->ignore($subCategory->id)
            ],
            'image' => [
                'sometimes', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'
            ],
            'description' => 'required|string',
        ]);

        // Slug generation logic
        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        if ($subCategory->title !== $validated['title'] && empty($validated['slug'])) {
            $slugCount = SubCategorie::where('slug', 'like', $slug . '%')
                ->where('id', '!=', $subCategory->id)
                ->count();
            $slug = $slugCount > 0 ? "{$slug}-" . ($slugCount + 1) : $slug;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($subCategory->image) {
                $this->deleteImage($subCategory->image);
            }
            $filePath = $this->uploadImage($request->file('image'), 'sub_sub_category');
        } else {
            $filePath = $subCategory->image;
        }

        $subCategory->title = $validated['title'];
        $subCategory->slug = $slug;
        $subCategory->parent_id = $validated['parent_id'];
        $subCategory->image = $filePath;
        $subCategory->description = $validated['description'] ?? null;
        $subCategory->save();

        return redirect()->route('admin.sub-sub-categories.index')
            ->with('success', 'Sub Category updated successfully!');
    }


    public function destroy($id)
    {
        $sub_subcategories = SubSubcategorie::findOrFail($id);
        try {
            if ($sub_subcategories->image) {
                $this->deleteImage($sub_subcategories->image);
            }
            $sub_subcategories->delete();
            return redirect()->route('admin.sub-sub-categories.index')
                ->with('success', 'Data deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }


    public function getSubcategories($id)
    {
        $subcategories = SubCategorie::where('parent_id', $id)->select('id', 'title')->get();
        return response()->json($subcategories);
    }
}
