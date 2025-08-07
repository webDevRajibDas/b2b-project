<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::controller(HomepageController::class)->group(function () {
    Route::get('/', 'homePage')->name('homePage');
    Route::get('/shop-list', 'shopList')->name('product.shopList');
    Route::get('/category-list', 'categoryList')->name('category.list');

    Route::get('/product/{slug}', 'productShowDetail')->name('product.show');
    Route::get('/upazilas/{districtId}', 'getUpazilas');

    Route::get('/vendor-form', 'vendorForm')->name('vendor-form');
    Route::post('/vendor-contact-form', 'vendorContactForm')->name('vendorContactForm');

    Route::get('/about-us', 'aboutUs')->name('about.us');
    Route::get('/contact-us', 'contactUs')->name('contact.us');
    Route::get('/terms-and-conditions', 'termsAndConditions')->name('terms.conditions');
    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy_policy');
});



//CartController function
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/carts', [CartController::class, 'viewCart'])->name('view.cart');

Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');
Route::post('/cart/remove', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::get('/cart/items', [CartController::class, 'getCartItems'])->name('cart.items');
Route::post('/update-subtotal', [CartController::class, 'updateCartPage'])->name('update.cart');
Route::get('/checkout', [CartController::class, 'checkOuts'])->name('cart.checkout');

// Protected checkout route
//Route::middleware(['auth'])->group(function() {
//    Route::get('/checkout', [CartController::class, 'checkOuts'])->name('checkout');
//});




Route::get('/landing', function () {
    return view('landing'); // Assuming your file is resources/views/landing.blade.php.php
});


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


