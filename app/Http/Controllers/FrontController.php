<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Image;




class FrontController extends Controller

{
    public function index()
    {
        $products = Product::with('image', 'category')->paginate(6);
        return view('front.index', ['products' => $products]);
    }

    public function showProductBySold()
    {
        $products = Product::Sold()->with('image', 'category')->paginate(6);

        return view('front.sold', ['products' => $products]);

    }
}
