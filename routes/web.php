<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomepageController::class, 'homePage'])->name('homePage');
Route::get('/vendors/{slug}', [HomepageController::class, 'showVendorList'])->name('vendors.show');
Route::get('/category/{slug}', [HomepageController::class, 'showSubCatList'])->name('categories.show');
//Route::get('/vendor-wise/{slug}', [HomepageController::class, 'show'])->name('vendor-wise.show');


Route::get('/category/{category}/{subCategory}', [HomepageController::class, 'show'])->name('subcategory.show');
Route::get('/product/{slug}', [HomepageController::class, 'productShowDetail'])->name('product.show');
Route::get('/upazilas/{districtId}', [HomepageController::class, 'getUpazilas']);

Route::get('/vendor-form', [HomepageController::class, 'vendorForm'])->name('vendor-form');
Route::post('/vendor-contact-form', [HomepageController::class, 'vendorContactForm'])->name('vendorContactForm');
Route::get('/about-us', [HomepageController::class, 'aboutUs'])->name('about.us');

//Cart
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/carts', [CartController::class, 'viewCart'])->name('view.cart');
Route::get('/checkouts', [CartController::class, 'checkOuts'])->name('checkouts');
Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');
Route::post('/cart/remove', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::get('/cart/items', [CartController::class, 'getCartItems'])->name('cart.items');
Route::post('/update-subtotal', [CartController::class, 'updateCartPage'])->name('update.cart');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    Artisan::call('cache:clear');
    return 'Cache cleared!';
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'storage link created';
});
