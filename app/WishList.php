<?php


namespace App;


use Illuminate\Database\Eloquent\Relations\Pivot;

class WishList extends Pivot
{
    protected $table = 'wishlist';
}
