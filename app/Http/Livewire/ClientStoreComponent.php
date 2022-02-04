<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use App\ProductCategory;
use Livewire\WithPagination;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class ClientStoreComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['cartCount' => 'dynamicCartCount'];

    public $products = [];

    // product detail view
    public $selectedProduct = [];
    public $selectProductId = null;

    public $filter_by_category_id = '';

    public $is_featured = false;



    public function mount()
    {
        $this->filterByCategory();
    }

    public function dynamicCartCount()
    {
        $cartCount = Cart::content()->count();
        return $cartCount;
    }

    public function checkIfIsFeatured()
    {
        $this->is_featured = !$this->is_featured;
    }

    public function setSelectProductId($id)
    {
        $this->selectProductId = $id;
        $product = Product::find($this->selectProductId);

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

        $this->selectedProduct = $product;
        $this->filterByCategory();
    }

    public function filterByCategory()
    {
        if($this->filter_by_category_id == ''){
            $products = Product::where('is_available', true)->get();

            $products = collect($products)->map(function($item) {
                $item->within_discount_date = 0;

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

        }elseif($this->filter_by_category_id == 'featured'){
            $products = Product::where('is_featured', 1)->get();

            $products = collect($products)->map(function($item) {
                $item->within_discount_date = 0;

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
        } else{
            $products = Product::where('product_category_id', $this->filter_by_category_id)->get();

            $products = collect($products)->map(function($item) {
                $item->within_discount_date = 0;

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
        }

        $this->products = $products;
    }

    public function resetVars()
    {
        $this->selectedProduct = [];
        $this->selectProductId = null;
    }


    //Cart
    public function addToCart($productId, $quantity=1)
    {
        // get product
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

        $this->filterByCategory();
        Session::flash('success', 'A product has been added to cart successfully');

        $count = Cart::content()->count();
        $this->dispatchBrowserEvent('refreshCartCount');
        // $this->alertMessage('success', 'A product has been added to cart successfully');
    }


         // Toast notifs
    // $type can be success, info, warning , error
    public function alertMessage($type, $message)
    {
        // $this->dispatchBrowserEvent(
        //     'alert',
        //     ['type' => $type,  'message' => $message]
        // );
        Toastr::$type($message, $type, ["positionClass" => "toast-top-right"]);
    }

    public function render()
    {
        $categories = ProductCategory::all();

        $data = [
            'categories' => $categories,
            'products' => $this->products,
        ];

        return view('livewire.client-store-component', $data);
    }
}
