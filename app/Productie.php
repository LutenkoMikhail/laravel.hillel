<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productie extends Model
{
    protected $fillable = [
        'id', 'title', 'description', 'short_description', 'sku',
        'price', 'discount', 'in_stock', 'count', 'thumbnail'
    ];

    public function gallery()
    {
        return $this->belongsToMan(\App\ProductGallery::class);
    }

    public function category()
    {
        return $this->belongsToMany(\App\Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(\App\Order::class);
    }

    public function setThumbnailAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['thumbnail'] =
                str_replace('public/storage/', '',$value);
        }
    }
    public function getPrice()
    {
        if ($this->in_stock===0){
            $price=$this->price;
        } else {
            $price=$this->price-$this->discount;
        }
        return $price;
    }
}
















