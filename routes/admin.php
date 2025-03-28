<?php


use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MasterSettingController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoriesController;
use App\Http\Controllers\Admin\VendorCategoriesController;
use App\Http\Controllers\Admin\VendorsController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', [MasterSettingController::class, 'Settings'])->name('settings');

    Route::get('/get-subcategories', [VendorsController::class, 'getSubcategories'])->name('get.subcategories');
    Route::resource('vendors', VendorsController::class);

    Route::resource('vendor-categories', VendorCategoriesController::class);
    Route::resource('sub-categories', SubCategoriesController::class);



    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('list');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('update');

    });

    Route::resource('product-categories', ProductCategoriesController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('brands', BrandController::class);




});

