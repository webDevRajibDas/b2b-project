<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SubCategorie;
use App\Models\VendorCategorie;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $categories = VendorCategorie::all();
        return view('admin.vendor-section.sub-categories.create', compact('categories'));
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

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
    }

}
