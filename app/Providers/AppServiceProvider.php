<?php

namespace App\Providers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use App\Models\Product;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            $user_id = Auth::id();
            $cartItems = [];

            if ($user_id) {
                $cartItems = Cart::where('user_id', $user_id)->with('products')->get();
            }
            $cookieCart = json_decode(Cookie::get('cart'), true) ?? [];
            foreach ($cookieCart as $product_id => $quantity) {
                $product = Product::find($product_id);
                if ($product) {
                    $cartItems[] = (object) [
                        'product' => $product,
                        'quantity' => $quantity,
                    ];
                }
            }
            $view->with('cartItems', collect($cartItems));
        });
    }
}
