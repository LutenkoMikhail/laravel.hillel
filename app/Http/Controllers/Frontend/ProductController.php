<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        dd('products !');
        return view('products');
    }

    public function show($id)
    {
        dd("id= {$id}");
                return view('productshow');
    }
}
