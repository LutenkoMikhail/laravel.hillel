<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Productie;
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

//        dd($request->productgalleries);

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

                if (!empty($request->productgalleries)) {
                    foreach ($request->productgalleries as $productgallery) {
                        $pathProductGallery = $productgallery->store(
                            "/images/products/{$request->sku}",
                            'public'
                        );
//                        dd($pathProductGallery);
                        $product->gallery()->attach(
                            $pathProductGallery
                        );

                    }
                }
            }
            return redirect()->route('product');
        }
        return redirect()->back();
    }

    public function edit(Productie $productie)
    {
        dd($productie);
    }

    public function delete(Productie $productie)
    {
        dd($productie);
    }
}
