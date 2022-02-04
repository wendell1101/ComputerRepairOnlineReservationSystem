<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckIfCartIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cart = Cart::content();
        if($cart->count() == 0)
        {
            return redirect()->route('cart.index')->with('error', 'Cart should not be empty in order to reserve');
        }
        return $next($request);
    }
}
