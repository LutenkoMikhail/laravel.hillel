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

    public function user()
    {
        return $this->hasOne(\App\User::class);
    }

    public function getStatus()
    {
        $statusOrder=StatusOrder::where('id', $this->status_id)->get(['name']);
        return $statusOrder[0]['name'];
    }

    public function getUserName()
    {
        $userName = User::where('id', $this->user_id)->get(['name']);
        return $userName[0]['name'];
    }
}
