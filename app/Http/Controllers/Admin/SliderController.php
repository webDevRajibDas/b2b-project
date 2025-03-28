<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'video_link' => 'nullable|url',
            'video_path' => 'nullable|mimes:mp4,mov,avi',
            'status' => 'required|boolean',
        ]);

        $imagePath = $this->uploadImage($request->file('image'), 'sliders');
        $videoPath = $request->file('video_path') ? $request->file('video_path')->store('videos', 'public') : null;

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'video_link' => $request->video_link,
            'video_path' => $videoPath,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        dd($slider);
        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
