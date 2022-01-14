<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartCountComponent extends Component
{
    public $cartCount = 0;

    protected function getListeners()
    {
        $this->cartCount =  ['cartCount' => 'dynamicCartCount'];
    }

    public function render()
    {
        // $cartCount = Cart::content()->count();
        // dd($this->cartCount);
        $cartCount = $this->cartCount;
        return view('livewire.cart-count-component', compact('cartCount'));
    }
}
