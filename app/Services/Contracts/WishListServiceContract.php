<?php


namespace App\Services\Contracts;

use App\Productie;

interface WishListServiceContract
{
    public function isUserFolled(Productie $product);

}
