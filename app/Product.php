<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'discount', 'img', 'product_category_id',
    ];

    public function productCategories()
    {
        return $this->belongsTo(ProductCategories::class);
    }

}
