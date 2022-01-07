<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ReservationController extends Controller
{
    public function checkout(Request $request)
    {
        // Todo: Convert to middleware
        $cart = Cart::content();
        if($cart->count() == 0)
        {
            return redirect()->back();
        }
        return view('user.reservations.create');
    }
}
