<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Order extends Model
{
    protected $fillable = [
        'id', 'user_id', 'status_id', 'shipping_data_country',
        'shipping_data_city', 'shipping_data_address', 'total_price'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne(\App\StatusOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product()
    {
        return $this->belongsToMany(\App\Productie::class,
            'order_products',
            'order_id',
            'producties_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(\App\User::class);
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        $statusOrder = StatusOrder::where('id', $this->status_id)->get(['name']);
        return $statusOrder[0]['name'];
    }

    public function InProcess()
    {
        $InProcess = StatusOrder::where(
            'name',
            '=',
            Config::get('constants.db.order_statuses')[0]
        )->first();
        return $InProcess->id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        $userName = User::where('id', $this->user_id)->get(['name']);
        return $userName[0]['name'];
    }
}
