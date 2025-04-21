<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CardCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CardCategoriesController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $allData = CardCategory::all();
        return view('admin.cards.card-categories.index', compact('allData'));
    }


    public function create()
    {
        return view('admin.cards.card-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'status' => 'required|string',
        ]);

        CardCategory::create([
            'name' => $validated['name'],
            'status' => $validated['status'],
        ]);
        return redirect()->route('admin.card-categories.index')->with('success', 'Category created successfully!');
    }


    public function edit($id)
    {
        $cardCategory = CardCategory::findOrFail($id);
        return view('admin.cards.card-categories.edit', compact('cardCategory'));
    }


    public function show($slug)
    {

    }

    public function update(Request $request ,  CardCategory $cardCategory)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'status' => 'nullable|string',
        ]);

        $cardCategory->update([
            'name' => $validated['name'],
            'status' => $validated['status'] ?? null,
        ]);

        return redirect()->route('admin.card-categories.index')
            ->with('success', 'Category updated successfully!');
    }

    public function destroy(CardCategory $cardCategory)
    {
        try {
            $cardCategory->delete();
            return redirect()->route('admin.card-categories.index')
                ->with('success', 'Category deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }

}
