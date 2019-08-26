<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id', 'user_id', 'status_id', 'shipping_data_country',
        'shipping_data_city', 'shipping_data_address', 'total_price'
    ];

    public function status()
    {
        return $this->hasOne(\App\StatusOrder::class);
    }

    public function product()
    {
        return $this->hasMany(\App\OrderProduct::class);
    }
}
