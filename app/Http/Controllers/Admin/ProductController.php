<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDataTable;
use App\Models\Brand;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
{
    use ImageUploadTrait;



    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $perPage = $request->input('per_page', 12);

        $products = Product::query()
            ->when($search, function($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%");
                });
            })
            ->when($category, function($query) use ($category) {
                $query->where('category_id', $category);
            })
            ->when($minPrice, function($query) use ($minPrice) {
                $query->where('price', '>=', $minPrice);
            })
            ->when($maxPrice, function($query) use ($maxPrice) {
                $query->where('price', '<=', $maxPrice);
            })
            ->with('category') // Eager load category relationship
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $categories = Category::all(); // For category filter dropdown

        return view('admin.product.index', compact('products', 'search', 'categories', 'category', 'minPrice', 'maxPrice'));
    }


    public function create()
    {
        $brands = Brand::where('status', 1) ->orderBy('id', 'desc')->get();
        $categories =  Category::where('status', 'active') ->orderBy('id', 'desc')->get();
        return view('admin.product.create',compact('categories','brands'));
    }


    // Store a newly created product in the database
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'category_id' => 'required|exists:product_categories,id',
            'brand_id' => 'required',
            'vendor_id' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'atts' => 'required|string', // Incoming JSON string
        ]);



        $atts = json_decode($validatedData['atts'], true);
        $validatedAtts = collect($atts)->map(function ($att) {
            return [
                'attName' => $att['attName'] ?? '',
                'attVisible' => filter_var($att['attVisible'], FILTER_VALIDATE_BOOLEAN),
                'attValue' => $att['attValue'] ?? '',
            ];
        })->toArray();


        if ($request->hasFile('image')) {
            $singleImage = $this->uploadImage($validatedData['image'], 'products');
        }

        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'content' => $validatedData['content'],
            'product_categorie_id' => $validatedData['category_id'],
            'brand_id' => $validatedData['brand_id'],
            'vendor_id' => $validatedData['vendor_id'],
            'price' => $validatedData['price'],
            'sale_price' => $validatedData['sale_price'],
            'image' => $singleImage,
            'atts' => $validatedAtts,
        ]);

        // Handle additional images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $this->uploadImage($image, 'products');
                $product->gallery()->create(['image_path' => $imagePath]);
            }
        }

        // Return success response
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product,
        ], 201);

    }



    public function edit(Product $product)
    {
        $brands = Brand::where('status', 1) ->orderBy('id', 'desc')->get();
        $categories =  Category::where('status', 'active') ->orderBy('id', 'desc')->get();
        return view('admin.product.edit', compact('product','categories','brands'));
    }


}
