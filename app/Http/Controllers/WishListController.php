<?php

namespace App\Http\Controllers;

use App\Productie;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function addToWishList(Productie $productie)
    {
        dd($productie);
    }

    public function deleteFromWishList(Request $request)
    {
        dd($request);
    }
}
