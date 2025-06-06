<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SubCategorie;
use App\Models\VendorCategorie;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SubCategoriesController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $allData = SubCategorie::with('parentCategory')->get();
        return view('admin.vendor-section.sub-categories.index', compact('allData'));
    }


    public function create()
    {
        $vendorCategories = VendorCategorie::all();
        return view('admin.vendor-section.sub-categories.create', compact('vendorCategories'));
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191|unique:sub_categories,title',
            'parent_id' => 'required|exists:vendor_categories,id',
            'slug' => 'nullable|string|max:191|unique:sub_categories,slug',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        $count = SubCategorie::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
        $filePath = $this->uploadImage($request->file('image'), 'sub_category');

        $subCategory = SubCategorie::create([
            'title' => $validated['title'],
            'parent_id' => $request->parent_id,
            'slug' => $slug,
            'image' => $filePath,
            'description' => $validated['description'] ?? null,
        ]);
        return redirect()->route('admin.sub-categories.index')->with('success', 'Sub Category created successfully!');
    }


    public function edit($id)
    {
        $subCategory = SubCategorie::with('parentCategory')->findOrFail($id);
        $vendorCategories = VendorCategorie::all();
        return view('admin.vendor-section.sub-categories.edit', compact('subCategory','vendorCategories'));
    }

    public function show($id)
    {
    }

    public function update(Request $request, SubCategorie $subCategory)
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
            $filePath = $this->uploadImage($request->file('image'), 'sub_category');
        } else {
            $filePath = $subCategory->image;
        }

        $subCategory->title = $validated['title'];
        $subCategory->slug = $slug;
        $subCategory->parent_id = $validated['parent_id'];
        $subCategory->image = $filePath;
        $subCategory->description = $validated['description'] ?? null;
        $subCategory->save();

        return redirect()->route('admin.sub-categories.index')
            ->with('success', 'Sub Category updated successfully!');
    }


    public function destroy(SubCategorie $subCategory)
    {
        try {
            if ($subCategory->image) {
                $this->deleteImage($subCategory->image);
            }
            $subCategory->delete();

            return redirect()->route('admin.sub-categories.index')
                ->with('success', 'Data deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }

}
