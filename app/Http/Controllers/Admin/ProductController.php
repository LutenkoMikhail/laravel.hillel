<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\ProductCreateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',
            [
                'categories' => $categories
            ]);
    }


    public function store(ProductCreateRequest $request)
    {
        $pathThumbnail = $request->thumbnail->store(
            "/images/products/{$request->sku}",
            'public'
        );

        $product = new \App\Productie();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->in_stock = $request->in_stock;
        $product->count = $request->count;
        $product->thumbnail = $pathThumbnail;


        if ($product->save()) {
            foreach ($request->selectcategory as $categoryID) {
                $product->category()->attach(
                    $categoryID
                );
            }
            return redirect()->route('product');
        }

        return redirect()->back();
    }
}
