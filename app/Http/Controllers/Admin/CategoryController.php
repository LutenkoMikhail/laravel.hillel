<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryCreateRequest $request)
    {
        $category = new \App\Category();
        $category->title=$request->title;
        $category->description=$request->description;

        if ($category->save()) {
            return redirect()->route('categories.index');
        }

        return redirect()->back();
    }

    public function edit(Category $category)
    {
        dd($category);
    }
    public function delete(Category $category)
    {
        dd($category);
    }
}
