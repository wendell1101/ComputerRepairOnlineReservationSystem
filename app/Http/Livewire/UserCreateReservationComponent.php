<?php

namespace App\Http\Livewire;

use Throwable;
use App\Reservation;
use Livewire\Component;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;

class UserCreateReservationComponent extends Component
{
    public $user_id;
    public $items;
    public $total_amount = 0;
    public $expected_reservation_date_time;
    public $final_reservation_date_time;
    public $status = 0;
    public $notes;

    public function mount()
    {
        $cart = Cart::content();
        if($cart->count() == 0)
        {
            return redirect()->back();
        }
    }
    public function store()
    {
        $cart = Cart::content();
        $final_amount = Cart::total();
        if($cart->count() == 0)
        {
            return redirect()->back();
        }


        $data = [
            'transaction_id' =>  Str::uuid(),
            'user_id' => auth()->user()->id,
            'items' => $cart,
            'total_amount' => 1000,
            'expected_reservation_date_time' => $this->expected_reservation_date_time,
            'status' => 0,
            'notes' => $this->notes,
        ];
        // dd($data);

        try{
            Reservation::create($data);
            Cart::destroy();
            return redirect('/test');
        }catch(Throwable $th){
            dd($th);
        }
    }


    public function render()
    {
        $cart = Cart::content();
        if($cart->count() == 0)
        {
            return redirect()->back();
        }

        $data = [
            'cart' => $cart,
            'finalTotal' => Cart::total(),
        ];
        return view('livewire.user-create-reservation-component', $data);
    }
}
