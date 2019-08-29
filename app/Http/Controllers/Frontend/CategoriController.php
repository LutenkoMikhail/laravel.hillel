<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriController extends Controller
{
    public function index()
    {
        dd('Categori !');
        return view('categories');
    }

    public function show($id)
    {
        dd("id= {$id}");
        return view('categorishow');
    }
}
