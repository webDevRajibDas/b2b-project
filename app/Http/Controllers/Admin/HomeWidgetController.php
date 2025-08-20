<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeWidget;
use Illuminate\Http\Request;

class HomeWidgetController extends Controller
{

    // Show all widgets (index)
    public function index()
    {
        $widget = HomeWidget::first();
        return view('admin.widgets.create', compact('widget'));
    }

    // Store new widget
    public function store(Request $request)
    {
        $data = $request->validate([
            'short_1' => 'nullable|string',
            'short_2' => 'nullable|string',
            'short_3' => 'nullable|string',
            'banner_1' => 'nullable|image',
            'banner_2' => 'nullable|image',
            'banner_3' => 'nullable|image',
            'banner_4' => 'nullable|image',
            'banner_5' => 'nullable|image',
        ]);

        // handle file uploads
        foreach (['banner_1','banner_2','banner_3','banner_4','banner_5'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('banners', 'public');
            }
        }

        HomeWidget::create($data);
        return redirect()->back()->with('success', 'Homepage widget created successfully.');
    }

    public function update(Request $request, HomeWidget $widget)
    {
        $data = $request->validate([
            'short_1' => 'nullable|string',
            'short_2' => 'nullable|string',
            'short_3' => 'nullable|string',
            'banner_1' => 'nullable|image',
            'banner_2' => 'nullable|image',
            'banner_3' => 'nullable|image',
            'banner_4' => 'nullable|image',
            'banner_5' => 'nullable|image',
        ]);

        foreach (['banner_1','banner_2','banner_3','banner_4','banner_5'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('banners', 'public');
            }
        }

        $widget->update($data);

        return redirect()->back()->with('success', 'Homepage widget updated successfully.');
    }
}
