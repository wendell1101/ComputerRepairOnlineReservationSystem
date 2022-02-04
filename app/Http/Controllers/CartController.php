<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function count()
    {
        return Cart::content()->count();
    }

    public function addToCart($productId)
    {
        // get product
        $quantity = 1;
        $product = Product::findOrFail($productId);

        //check if discounted
        $product->within_discount_date = 0;

        if ($product->discounted_price > 0) {
            $start_date = date('Y-m-d', strtotime($product->discount_start_date));
            $end_date = date('Y-m-d', strtotime($product->discount_end_date));
            $current_date =  date('Y-m-d');
            if($current_date >= $start_date && $current_date <= $end_date){
                $product->within_discount_date = 1;
            }else{
                $product->within_discount_date = 0;
            }
            $product->discount_start_date = format_date($product->discount_start_date);
            $product->discount_end_date = format_date($product->discount_end_date);
        }

        // if within discount date
        if($product->within_discount_date)
        {
            Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => $quantity,
            'price' => $product->discounted_price, 'weight' => 0, 'options' => ['type' => 'product']])->associate('App\Product');
        }else{
            Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => $quantity,
            'price' => $product->price, 'weight' => 0, 'options' => ['type' => 'product']])->associate('App\Product');
        }

        Session::flash('success', 'A product has been added to cart successfully');
        return redirect()->back();
    }

}
