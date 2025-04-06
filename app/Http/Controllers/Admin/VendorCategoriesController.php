<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\VendorCategorie;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VendorCategoriesController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $allData = VendorCategorie::all();
        return view('admin.vendor-section.categories.index', compact('allData'));
    }


    public function create()
    {
        return view('admin.vendor-section.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:191|unique:vendor_categories,title',
            'slug' => 'nullable|string|max:191|unique:vendor_categories,slug',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        $count = VendorCategorie::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
        $filePath = $this->uploadImage($request->file('image'), 'category');

       VendorCategorie::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'image' => $filePath,
            'description' => $validated['description'] ?? null,
        ]);
        return redirect()->route('admin.vendor-categories.index')->with('success', 'Category created successfully!');
    }


    public function edit($id)
    {
        $category = VendorCategorie::findOrFail($id);
        return view('admin.vendor-section.categories.edit', compact('category'));
    }


    public function show($slug)
    {

    }

    public function update(Request $request, VendorCategorie $vendorCategory)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'slug' => 'nullable|string|max:191|unique:vendor_categories,slug,'.$vendorCategory->id,
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        if ($vendorCategory->title !== $validated['title'] && empty($validated['slug'])) {
            $count = VendorCategorie::where('slug', 'like', $slug . '%')
                ->where('id', '!=', $vendorCategory->id)
                ->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
        }

        // Handle image upload if new image provided


        $filePath = $vendorCategory->image;
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($vendorCategory->image) {
                $this->deleteImage($vendorCategory->image);
            }
            $filePath = $this->uploadImage($request->file('image'), 'category');
        }

        $vendorCategory->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'image' => $filePath,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.vendor-categories.index')
            ->with('success', 'Category updated successfully!');
    }

    public function destroy(VendorCategorie $vendorCategory)
    {
        try {
            if ($vendorCategory->image) {
                $this->deleteImage($vendorCategory->image);
            }
            $vendorCategory->delete();

            return redirect()->route('admin.vendor-categories.index')
                ->with('success', 'Category deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }

}
