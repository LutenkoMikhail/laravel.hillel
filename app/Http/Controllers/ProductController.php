<?php

namespace App\Http\Controllers;

use App\Category;
use App\Productie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Productie::paginate(5);
        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * @param Productie $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Productie $product)
    {
        $categories = $product->category()->get();
        return view('products.show', [
            'categories' => $categories,
            'product' => $product
        ]);
    }


}
