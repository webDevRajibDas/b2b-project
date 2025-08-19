<?php

use App\Http\Controllers\Admin\SubSubcategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CardCategoriesController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MasterSettingController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoriesController;
use App\Http\Controllers\Admin\VendorCategoriesController;
use App\Http\Controllers\Admin\VendorsController;



Route::prefix('admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', [MasterSettingController::class, 'Settings'])->name('settings');

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('list');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('update');
        Route::put('/{product}', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::get('/categories/{id}/subcategories', [SubSubcategoriesController::class, 'getSubcategories'])->name('get.subCategories');

    Route::get('/get-sub-categories', [ProductController::class, 'getSubcategories'])->name('get.subCategories.list');
    Route::get('/get-sub-subcategories', [ProductController::class, 'getSubSubcategories'])->name('get.subsubCategories.list');
    Route::post('/categories/category_order/update', [ProductCategoriesController::class, 'updateOrderPosition'])->name('category_order.update');


    Route::resources([
        'card-categories' => CardCategoriesController::class,
        'cards' => CardController::class,
        'product-categories' => ProductCategoriesController::class,
        'sub-categories' => SubCategoriesController::class,
        'sub-sub-categories' => SubSubcategoriesController::class,
        'sliders' => SliderController::class,
        'brands' => BrandController::class,
        'vendors' => VendorsController::class,
        'vendor-categories' => VendorCategoriesController::class,
        'videos' => VideoController::class,
    ]);

});

