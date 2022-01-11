<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public function index()
    {
        $cartItems = Cart::content();
    }


    public function updateCartProduct($rowId, $qty)
    {
        $item = Cart::get($rowId);
        if (!$item) {
            return redirect()->back();
        }

        $result = Cart::update($rowId, $item->qty = $qty);
    }

    public function addQuantity($rowId)
    {
        // dd('add quantity');
        dd('clicked add quant');
        $item = Cart::get($rowId);


        $result = Cart::update($rowId, $item->qty + 1);
        $this->render();
    }

    public function minusQuantity($rowId)
    {
        $item = Cart::get($rowId);

        if (($item->qty - 1) >= 1) {
            Cart::update($rowId, $item->qty - 1);
        }
    }

    public function remove($rowId)
    {
        try{
            Cart::remove($rowId);
            $this->render();
            Session::flash('success', 'An item has been remove to cart');
            // $this->alertMessage('success', 'An item has been remove to cart');
        }catch(\Throwable $th){
            $this->render();
        }

    }

         // Toast notifs
    // $type can be success, info, warning , error
    public function alertMessage($type, $message)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => $type,  'message' => $message]
        );
    }

    public function render()
    {
        // Cart::destroy();
        $cartItems = Cart::content();

        $cartItems = collect($cartItems)->map(function($item) {
            $item->within_discount_date = 0;
            $item->products = $item->model;

            if ($item->discounted_price > 0) {
                $start_date = date('Y-m-d', strtotime($item->discount_start_date));
                $end_date = date('Y-m-d', strtotime($item->discount_end_date));
                $current_date =  date('Y-m-d');
                if($current_date >= $start_date && $current_date <= $end_date){
                    $item->within_discount_date = 1;
                }else{
                    $item->within_discount_date = 0;
                }
                $item->discount_start_date = format_date($item->discount_start_date);
                $item->discount_end_date = format_date($item->discount_end_date);
            }

            return $item;
        });

        $finalTotal = Cart::subtotal();

        return view('livewire.cart-component', compact('cartItems', 'finalTotal'));
    }
}
