<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description',  'img', 'discount_percentage', 'has_discount', 'discounted_price',
        'discount_start_date', 'discount_end_date', 'is_available', 'is_featured', 'product_category_id',
    ];

    public function productCategories()
    {
        return $this->belongsTo(ProductCategories::class);
    }

    public function get_discounted_price($price = 0)
    {
        $discountedPrice = $price * ($this->discount_percentage * .01);
        return $price - $discountedPrice;
    }

    public function checkIfIsAvailable($product){
        if($product->is_available){
            echo "<span class='text-success'>available</span>";
        }else{
            echo "<span class='text-danger'>not available</span>";
        }
    }
}
