<?php

namespace App\Http\Controllers;

use App\Reservation;
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

    public function index()
    {
        $reservations = Reservation::with('user')->where('user_id', auth()->id())->get();

        // $reservations = json_decode('reservations');

        return view('user.reservations.index', compact('reservations'));
    }

    public function show($transaction_id)
    {

        $reservation = Reservation::with('user')->where('transaction_id', $transaction_id)->where('user_id', auth()->id())->first();

        // $reservation = json_decode($reservation);// return $reservation;
        return view('user.reservations.show', compact('reservation'));
    }
}
