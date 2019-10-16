<?php

namespace App\Http\Controllers;

use App\Productie;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function addToWishList(Productie $product)
    {
        Auth()->user()->addToWish($product);

        Cart::instance('wishlist')->add(
            $product->id,
            $product->title,
            1,
            $product->getPrice()
        )->associate('App\Productie');

        return redirect()->back()->with("status", "The product \"{$product->title}\" was successfully added to wish list.");
    }

    public function deleteFromWishList(Request $request,Productie $product)
    {
        Auth()->user()->removeFromWish($product);
        Cart::instance('wishlist')->remove($request->rowId);
        return redirect()->back()->with("status", "The product \"{$product->title}\"was successfully delete in wish list. ");
    }
}
