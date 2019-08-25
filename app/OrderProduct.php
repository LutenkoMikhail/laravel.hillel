<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'id', 'order_id', 'producties_id', 'producties_count'
    ];

    public function order()
    {
        return $this->belongsToMany(\App\Order::class);
    }

    public function productie()
    {
        return $this->belongsToMany(\App\Productie::class);
    }
}
