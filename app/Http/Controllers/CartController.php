<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Productie;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
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
        )->associate('App\Productie');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param Productie $product
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * @param Request $request
     * @param Productie $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct(Request $request, Productie $product)
    {
        Cart::instance('cart')->remove($request->rowId);
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createOrder(Request $request)
    {
        return view('cart.create', [
            'customerName' => Auth::user()->name,
            'customerSurname' => Auth::user()->surname
        ]);
    }

    /**
     * @param OrderCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderCreateRequest $request)
    {
        $order = new \App\Order();
        $order->user_id = Auth::user()->id;
        $order->status_id = $order->InProcess();
        $order->shipping_data_customer = $request->customername . '  ' . $request->customersurname;
        $order->shipping_data_country = $request->shipping_data_country;
        $order->shipping_data_city = $request->shipping_data_city;
        $order->shipping_data_address = $request->shipping_data_address;
        $order->total_price = Cart::instance('cart')->total();

        if ($order->save()) {
            foreach (Cart::instance('cart')->content() as $product) {
                $order->product()->attach($product->id, ['producties_count' => $product->qty]);
            }
            Cart::instance('cart')->destroy();
            return redirect()->route('home');
        }
        return redirect()->back();
    }
}
