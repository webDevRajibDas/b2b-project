<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDataTable;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategorie;
use App\Models\SubSubcategorie;
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
        $categories =  Category::where('status', 'active') ->orderBy('id', 'asc')->get();
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
            'category_id' => 'required',
            'sub_categorie_id' => 'nullable',
            'sub_subcategorie_id' => 'nullable',
            'brand_id' => 'required',
            'vendor_id' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'sale_price' => 'nullable|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'atts' => 'required|string',
        ],[
            'name.required' => 'Product name is required.',
            'description.required' => 'Description is required.',
            'category_id.required' => 'Please select a main category.',
            'sub_categorie_id.required' => 'Please select a sub category.',
            'sub_subcategorie_id.required' => 'Please select a sub-subcategory.',
            'brand_id.required' => 'Brand is required.',
            'sale_price.required'=>'Sale price must be provided.',
            'image.required' => 'An image is required.',
            'image.image' => 'File must be an image.',
            'atts.required' => 'Attributes must be provided.',
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

        $productData = new Product();
        $productData->name = $validatedData['name'];
        $productData->description = $validatedData['description'];
        $productData->content = $validatedData['content'];
        $productData->categorie_id = $validatedData['category_id'];
        $productData->sub_categorie_id = $validatedData['sub_categorie_id'] ?? null;
        $productData->sub_subcategorie_id = $validatedData['sub_subcategorie_id'] ?? null;
        $productData->brand_id = $validatedData['brand_id'];
        $productData->price = $validatedData['price'];
        $productData->sale_price = $validatedData['sale_price'];
        $productData->image = $singleImage;
        $productData->atts = $validatedAtts;
        $productData->save();

        // Handle additional images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $this->uploadImage($image, 'products');
                $productData->gallery()->create(['image_path' => $imagePath]);
            }
        }

        // Return success response
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $productData,
        ], 201);

    }

    public function edit(Product $product)
    {
        $brands = Brand::where('status', 1) ->orderBy('id', 'desc')->get();
        $categories =  Category::where('status', 'active') ->orderBy('id', 'desc')->get();
        return view('admin.product.edit', compact('product','categories','brands'));
    }


//    public function getSubcategories($id)
//    {
//        $subcategories = SubCategorie::where('parent_id', $id)->select('id', 'title')->get();
//        return response()->json($subcategories);
//    }

    public function getSubcategories(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id'
        ]);
        $categoryId = $request->input('category_id');
        $subcategories = SubCategorie::where('parent_id', $categoryId)
            ->orderBy('order', 'asc')
            ->get(['id', 'title', 'slug']);
        return response()->json($subcategories);
    }

    /**
     * Fetch sub-subcategories based on the selected subcategory ID.
     */
    public function getSubSubcategories(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required'
        ]);
        $subcategoryId = $request->subcategory_id;
        $subSubcategories = SubSubcategorie::where('sub_categorie_id', intval($subcategoryId))
            ->orderBy('order', 'asc')
            ->get(['id', 'title', 'slug']);
        return response()->json($subSubcategories);
    }


}
