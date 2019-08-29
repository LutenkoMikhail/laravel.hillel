<?php

namespace App\Http\Controllers;

use App\Productie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Productie::with('category')->paginate(12);
        return view('products.index', ['products' => $products]);
    }

    public function show(Productie $product)
    {
        dd($product);
    }


}
