<?php

namespace App\Services;

use App\Productie;
use App\Services\Contracts\WishListServiceContract;

class WishListService implements WishListServiceContract
{

    public function isUserFollowed(Productie $product)
    {
        $followers=$product->follwers()->where("user_id", "=", Auth()->id())->get();
        return $followers->isEmpty() ? false : true;
    }
}
