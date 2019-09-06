<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id', 'title', 'description'
    ];

    public function productie()
    {
        return $this->belongsToMany(\App\Productie::class,
            'product_categories',
            'product_id',
            'category_id')->withTimestamps();
    }
}
