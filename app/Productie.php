<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productie extends Model
{
    protected $fillable = [
        'id', 'title', 'description', 'short_description', 'sku',
        'price', 'discount', 'in_stock', 'count', 'thumbnail'
    ];

    public function productGallary()
    {
        return $this->belongsToMan(\App\ProductGallery::class);
    }

    public function productCategory()
    {
        return $this->belongsToMany(\App\Category::class);
    }
}
