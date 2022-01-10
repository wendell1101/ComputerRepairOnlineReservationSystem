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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $rules = [
        'expected_reservation_date_time' => 'required',
    ];

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
        $validatedData = $this->validate();
        $items = [];
        $cart = Cart::content();

        foreach($cart as $item)
        {
            $item->cart_item = $item->model;
            $item->sub_total = $item->subTotal();
            $item->img = $item->model->img;
            $items[] = $item;
        }


        $final_amount = Cart::subTotal();

        // disregard commas
        $final_amount = (float) str_replace(',', '', $final_amount);


        if($cart->count() == 0)
        {
            return redirect()->back();
        }

        $random = Str::random(10);
        $transaction_id = strtoupper($random);

        $data = [
            'transaction_id' =>  $transaction_id,
            'user_id' => auth()->user()->id,
            'items' => json_encode($items),
            'total_amount' => $final_amount,
            'expected_reservation_date_time' => $this->expected_reservation_date_time,
            'status' => 0,
            'notes' => $this->notes,
        ];

        try{
            Reservation::create($data);
            Cart::destroy();
            return redirect()->route('user.reservations')->with('Successful reservation. Please wait for email notifications when reservation status updates');
        }catch(Throwable $th){
            // dd($th);
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
            'finalTotal' => Cart::subTotal(),
        ];
        return view('livewire.user-create-reservation-component', $data);
    }
}
