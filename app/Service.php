<?php

use App\ServiceCategory;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'img', 'description',  'price', 'is_available', 'service_category_id'
    ];

    public function serviceCategories()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function checkIfIsAvailable($service){
        if($service->is_available){
            echo "<span class='text-success'>available</span>";
        }else{
            echo "<span class='text-danger'>not Available</span>";
        }
    }
}
