<?php

namespace App\Http\Controllers;

use App\Productie;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    /**
     * @param Request $request
     * @param Productie $product
     */
    public function AddToCart(Request $request, Productie $product)
    {
//        dd($product);
        Cart::add(
            $product->id,
            $product->title,
            $request->product_count,
            $product->price
        );
        return redirect()->back();
    }
}
