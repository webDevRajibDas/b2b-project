<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SubCategorie;
use App\Models\Upazila;
use App\Models\Vendor;
use App\Models\VendorCategorie;
use App\Models\VendorContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homePage()
    {
        $products = Product::all();
        $allCat = VendorCategorie::all();
        $productCat = ProductCategory::all();
        return view('homepage',compact('allCat','products','productCat'));
    }


    public function showSubCatList($slug)
    {
        $category = VendorCategorie::where('slug', $slug)->firstOrFail();
        $subCategories = $category->subCategories;
        return view('frontend.vendors.category-wise-sub', compact('category', 'subCategories'));
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
        $product_categories = ProductCategory::all();
        return view('frontend.vendors.vendor-shopping', compact('category', 'vendor','all_products','product_categories'));

    }

    public function show($category, $subCategory){
        $category = VendorCategorie::where('slug',$category)->first();
        $template = 'frontend.vendors.templates.' . ($category->template ?? 'default');
        $products = Product::all();
        $product_categories = ProductCategory::all();
        return view($template, compact('category', 'products','product_categories'));
    }

    public function productShowDetail($slug)
    {
        $productDetail = Product::with(['gallery'])->where('slug', $slug)->first();
        //dd($productDetail);
        return view('frontend.shopping.single-product', compact('productDetail'));

    }



    public function getUpazilas($districtId)
    {
        $upazilas = Upazila::where('district_id', $districtId)->pluck('name', 'id');
        return response()->json($upazilas);
    }

    public function aboutUs()
    {
        return view('frontend.about');
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
