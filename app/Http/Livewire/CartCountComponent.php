<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartCountComponent extends Component
{
    public function render()
    {
        $cartCount = Cart::content()->count();
        return view('livewire.cart-count-component', compact('cartCount'));
    }
}
