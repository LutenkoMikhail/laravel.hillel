<?php


namespace App\Services;


use App\Productie;
use App\Services\Contracts\WishListServiceContract;

class WishListService implements WishListServiceContract
{

    public function isUserFolled(Productie $product)
    {
        dd($product);
    }
}
