<?php

namespace App\Http\Livewire;

use App\Product;
use App\ProductCategory;
use Livewire\WithPagination;
use Livewire\Component;

class ClientStoreComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $products = [];
    public $filter_by_category_id = '';

    public $is_featured = false;

    public function mount()
    {
        $this->filterByCategory();
    }

    public function checkIfIsFeatured()
    {
        $this->is_featured = !$this->is_featured;
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
