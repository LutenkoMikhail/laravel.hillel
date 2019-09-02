<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',[
            'categories'=>$categories
        ]);
    }
    public function show(Category $category)
    {
        dd($category);
//        $products = $category->productie()->paginate(5);
//        return view('categories.show'.[
//            'products'=>$products,
//            'category'=>$category
//            ]);
    }
}

