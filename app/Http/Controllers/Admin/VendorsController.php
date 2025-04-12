<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SubCategorie;
use App\Models\Vendor;
use App\Models\VendorCategorie;
use App\Traits\ImageUploadTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VendorsController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {

        $vendors = Vendor::all();
        return view('admin.vendor-section.vendors.index',compact('vendors'));
    }


    public function create()
    {
        $categories = VendorCategorie::all();
        $sub_cat = SubCategorie::all();
        return view('admin.vendor-section.vendors.create', compact('categories','sub_cat'));
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:vendors,email',
            'website_link' => 'nullable|url',
            'page_link' => 'nullable|url',
            'address' => 'required|string',
            'business_type' => 'required|string',
            'business_registration_number' => 'required|string|unique:vendors,business_registration_number',
            'status' => 'nullable|string',
            'join_date' => 'nullable|date',
            'modified' => 'nullable|date',
            'references' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,jpeg,png,jpg,gif|max:2048',
            'vendor_category_id' => 'required|exists:vendor_categories,id',
            'sub_categories_id' => 'required|exists:sub_categories,id',
        ], [
            // Custom messages for each rule
            'title.required' => 'The Vendor Name field is required.',

            'phone.required' => 'The phone number field is required.',
            'phone.max' => 'The phone number may not be greater than 20 characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',

            'website_link.url' => 'The website link must be a valid URL.',
            'page_link.url' => 'The page link must be a valid URL.',

            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a string.',

            'business_type.required' => 'The business type field is required.',
            'business_type.string' => 'The business type must be a string.',

            'business_registration_number.required' => 'The business registration number field is required.',
            'business_registration_number.string' => 'The business registration number must be a string.',
            'business_registration_number.unique' => 'The business registration number has already been taken.',

            'join_date.date' => 'The join date must be a valid date.',

            'file_path.file' => 'The file must be a valid file.',
            'file_path.mimes' => 'The file must be a PDF, DOC, or DOCX file.',
            'file_path.max' => 'The file may not be greater than 2MB.',

            'vendor_category_id.required' => 'The category field is required.',
            'vendor_category_id.exists' => 'The selected category is invalid.',

            'sub_categories_id.required' => 'The subcategory field is required.',
            'sub_categories_id.exists' => 'The selected subcategory is invalid.',
        ]);



        $data = $request->except('file_path');
        if ($request->has('join_date')) {
            $data['join_date'] = Carbon::createFromFormat('m/d/Y', $request->join_date)->format('Y-m-d');
        }

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $this->uploadImage($request->file('file_path'), 'vendors');
        }

        Vendor::create($data);
        return redirect()->route('admin.vendors.index')->with('success', 'Vendor created successfully.');
    }

    public function show($id)
    {


    }


    public function edit(Vendor $vendor)
    {
        //dd($vendor);
        $categories = VendorCategorie::all();
        $sub_cat = SubCategorie::all();
        return view('admin.vendor-section.vendors.edit', compact('categories','sub_cat','vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website_link' => 'nullable|url|max:255',
            'page_link' => 'nullable|url|max:255',
            'address' => 'required|string',
            'business_type' => 'required|string|max:255',
            'business_registration_number' => 'required|string|max:255',
            'payment_terms' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
            'references' => 'nullable|string',
            'vendor_category_id' => 'required|exists:vendor_categories,id',
            'sub_categories_id' => 'required|exists:sub_categories,id',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload if present
        if ($request->hasFile('file')) {
            if ($vendor->file_path) {
                $this->deleteImage($vendor->file_path);
            }

            $filePath = $this->uploadImage($request->file('file_path'), 'vendors');
            $validatedData['file_path'] = $filePath;
        }

        $vendor->update($validatedData);

        return redirect()->route('admin.vendors.index')
            ->with('success', 'Vendor updated successfully');
    }

    public function destroy($id)
    {
    }


    public function getSubcategories(Request $request)
    {
        $subcategories = SubCategorie::where('parent_id', $request->parent_id)->get();
        return response()->json($subcategories);
    }


}
