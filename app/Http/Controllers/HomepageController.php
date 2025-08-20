<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\SubCategorie;
use App\Models\Upazila;
use App\Models\Vendor;
use App\Models\VendorContact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class HomepageController extends Controller
{

    public function homePage()
    {
        $latestProducts = Product::with('category')
            ->latest()
            ->take(12)
            ->get();
        $bestSellers = $latestProducts->take(5);
        $latestCategories = Category::latest()
            ->take(5)
            ->get();
        $categoryTitles = ['Clothing', 'Electronics', 'ICT Product','Fashion','Footwear'];
        $sliders = Slider::latest()->take(3)->get();

        $categoriesWithProducts = Category::whereIn('title', $categoryTitles)
            ->with(['products' => function ($query) {
                $query->with('category')->latest()->take(4);
            }])
            ->get()
            ->keyBy('title');

        $fashionProducts = $categoriesWithProducts->get('Fashion')?->products ?? collect();
        $electronicsProducts = $categoriesWithProducts->get('Electronics')?->products ?? collect();
        $ictProducts = $categoriesWithProducts->get('ICT Product')?->products ?? collect();
        $footwearProducts = $categoriesWithProducts->get('Footwear')?->products ?? collect();

        $widget = \App\Models\HomeWidget::first();

        // --- Return data to the view ---
        return view('homepage', [
            'products' => $latestProducts,
            'sliders' => $sliders,
            'best_sellers' => $bestSellers,
            'productCat' => $latestCategories,
            'fashionProducts' => $fashionProducts,
            'electronicsProducts' => $electronicsProducts,
            'ictProducts' => $ictProducts,
            'footwearProducts' => $footwearProducts,
            'widget' => $widget,
        ]);
    }

    public function productShowDetail($slug)
    {
        $detail = Product::with(['gallery','category'])->where('slug', $slug)->first();
        $relatedProducts = Product::where('categorie_id', $detail->categorie_id)
            ->where('id', '!=', $detail->id)
            ->inRandomOrder()
            ->limit(5)
            ->get();
        return view('frontend.product-details', compact('detail','relatedProducts'));
    }



    public function categoryList()
    {
        $products = Product::latest()->paginate(20);
        return view('frontend.cart.category-list', compact('products'));
    }



    public function vendorForm()
    {
        return view('frontend.vendors.vendor-form');
    }



    public function vendorContactForm(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'selling_product_type' => 'required|string',
            'product_type' => 'nullable|string',
            'month_order' => 'nullable|string',
            'target_customers' => 'nullable|array',
            'minimum_order_qty' => 'required|string',
            'site_link' => 'nullable|string',
            'factory_address' => 'nullable|string',
            'email' => 'nullable|email',
            'mobile' => 'required|string',
            'whats_up' => 'required|string',
            'wholesale_confirmation' => 'nullable|string',
            'trade_licence' => 'nullable|string',
            'status' => 'nullable|string',
        ]);


        $data = new VendorContact();
        $data->selling_product_type = $validatedData['selling_product_type'];
        $data->product_type = $validatedData['product_type'];
        $data->month_order = $validatedData['month_order'];
        $data->target_customers = json_encode($request->get('target_customers'));
        $data->minimum_order_qty = $validatedData['minimum_order_qty'];
        $data->site_link = $validatedData['site_link'];
        $data->factory_address = $validatedData['factory_address'];
        $data->email = $validatedData['email'];
        $data->mobile = $validatedData['mobile'];
        $data->whats_up = $validatedData['whats_up'];
        $data->wholesale_confirmation = $validatedData['wholesale_confirmation'];
        $data->trade_licence = $validatedData['trade_licence'];
        $data->status = $validatedData['status'] ?? 'unread'; // Default to 'unread' if not provided
        $data->save();
        return redirect()->back()->with('success', 'Message Details submitted successfully!');
    }

    public function showVendorList($categorySlug)
    {
        $category = SubCategorie::where('slug', $categorySlug)->firstOrFail();
        $vendor = Vendor::where('sub_categories_id', $category)->first();
        $all_products = Product::all();
        $product_categories = Category::all();
        return view('frontend.vendors.vendor-cart', compact('category', 'vendor','all_products','product_categories'));

    }



    public function getUpazilas($districtId)
    {
        $upazilas = Upazila::where('district_id', $districtId)->pluck('name', 'id');
        return response()->json($upazilas);
    }

    public function aboutUs()
    {
        return view('frontend.about');
    }public function contactUs()
    {
        return view('frontend.contact');
    }
    public function termsAndConditions()
    {
        return view('frontend.terms-condition');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy_policy');
    }



}
