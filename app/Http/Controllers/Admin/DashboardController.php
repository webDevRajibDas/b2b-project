<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totalProduct =  Product::count();
        $totalOrder =  12;
        return view('admin.dashboard',compact('totalProduct','totalOrder'));
    }
}
