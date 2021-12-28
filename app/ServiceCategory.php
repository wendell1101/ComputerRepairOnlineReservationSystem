<?php

use App\Service;
namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
