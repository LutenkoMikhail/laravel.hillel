<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $fillable = [
        'id', 'image_path', 'product_id'
    ];
    public function productie()
    {
        return $this->belongsToMany(Productie::class);
    }
}
