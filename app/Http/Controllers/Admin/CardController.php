<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;



class CardController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::all();
        return view('admin.cards.index',compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CardCategory::all();
        return view('admin.cards.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'card_categorie_id' => 'required|integer',
            'description' => 'required|string',
            'type' => 'required|string',
            'content' => 'nullable|string',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $singleImage = $this->uploadImage($validatedData['image'], 'cards');
        }

        $product = Card::create([
            'title' => $validatedData['title'],
            'type' => $validatedData['type'],
            'card_categorie_id' => $validatedData['card_categorie_id'],
            'description' => $validatedData['description'],
            'content' => $validatedData['content'],
            'price' => $validatedData['price'],
            'sale_price' => $validatedData['sale_price'],
            'image' => $singleImage,
            'status' => $validatedData['status'],
            'attr_price' => json_encode($request->attr_price),
            'attr_packege' => json_encode($request->attr_packege),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $this->uploadImage($image, 'cards');
                $product->gallery()->create(['image' => $imagePath]);
            }
        }
        return to_route('admin.cards.index')->with('success', 'Product Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        $categories = CardCategory::all();
        return view('admin.cards.edit', compact('card','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
            'card_categorie_id' => 'required',
        ]);



        if ($request->hasFile('image')) {
            if ($card->image) {
                $this->deleteImage($card->image);
            }
            $filePath = $this->uploadImage($request->file('image'), 'cards');
        } else {
            $filePath = $card->image;
        }
        \Log::info('Updating card', ['card_categorie_id' => $card->card_categorie_id]);
        $card->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'content' => $validatedData['content'],
            'price' => $validatedData['price'],
            'sale_price' => $validatedData['sale_price'],
            'image' => $filePath,
            'status' => $validatedData['status'],
            'card_categorie_id' => $validatedData['card_categorie_id'],
        ]);

        if ($request->hasFile('images')) {
            foreach ($card->gallery as $galleryImage) {
                $this->deleteImage($galleryImage->image);
                $galleryImage->delete();
            }
            foreach ($request->file('images') as $image) {
                $imagePath = $this->uploadImage($image, 'cards');
                $card->gallery()->create(['image' => $imagePath]);
            }
        }


        return to_route('admin.cards.index')->with('success', 'Card Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
