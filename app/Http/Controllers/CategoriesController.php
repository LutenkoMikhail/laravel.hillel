<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $products = $category->productie()->paginate(5);
//        dd($products);
        return view('categories.show'.[
            'products'=>$products,
            'category'=>$category
            ]);
    }
}
