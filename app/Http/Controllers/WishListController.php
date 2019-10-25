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
//        dd($request);
        Auth()->user()->removeFromWish($product);
        if (!empty(($request->rowId))) {
            Cart::instance('wishlist')->remove($request->rowId);
        }else {
            $content = Cart::instance('wishlist')->content();
            foreach ($content as $cartItem) {
                if ($cartItem->id===$product->id) {
                    Cart::instance('wishlist')->remove($cartItem->rowId);
                }

            }
        }

        return redirect()->back()->with("status", "The product \"{$product->title}\"was successfully delete in wish list. ");
    }
}












