<?php

namespace App\Http\Controllers;

use App\Order;
use App\Productie;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $thumbnail = Productie::all('id', 'thumbnail');
//        dd($thumbnail);
        view()->share('thumbnail',$thumbnail);
        return view('cart.index');
    }

    /**
     * @param Request $request
     * @param Productie $product
     */
    public function AddProductToCart(Request $request, Productie $product)
    {
        Cart::instance('cart')->add(
            $product->id,
            $product->title,
            $request->product_count,
            $product->getPrice()
        );
        return redirect()->back();
    }

    public function updateProductCount(Request $request, Productie $product)
    {
        if ($product->count < $request->product_count) {
            return redirect()->back()->with("status", "The product '{$product->title}'' has only {$product->count}");
        }
        Cart::instance('cart')->update(
            $request->rowId,
            $request->product_count
        );
        return redirect()->back();
    }

    public function deleteProduct(Request $request, Productie $product)
    {
        Cart::instance('cart')->remove($request->rowId);
        return redirect()->back();
    }

    public function createOrder(Request $request)
    {
        $order = new \App\Order();
        $inProcess = $order->InProcess();
        $userId = Auth::id();
        $contentCart = Cart::instance('cart')->content();
        dd(  $contentCart);

    }
}
