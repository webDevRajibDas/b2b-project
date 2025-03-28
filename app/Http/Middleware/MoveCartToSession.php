<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class MoveCartToSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $cart = json_decode($request->cookie('cart'), true) ?? session('cart', []);

            if (!empty($cart)) {
                $user_id = Auth::id();

                foreach ($cart as $product_id => $quantity) {
                    Cart::updateOrCreate(
                        ['user_id' => $user_id, 'product_id' => $product_id],
                        ['quantity' => $quantity]
                    );
                }

                // Clear the cart cookie and session
                session()->forget('cart');
                return redirect()->route('view.cart')->withCookie(Cookie::forget('cart'));
            }
        }

        return $next($request);
    }
}
