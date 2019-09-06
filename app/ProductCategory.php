<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'id', 'category_id', 'product_id'
    ];


    public function productie()
    {
        return $this->belongsToMany(\App\Productie::class);
    }

    public function category()
    {
        return $this->belongsToMany(\App\Category::class);
    }
}
