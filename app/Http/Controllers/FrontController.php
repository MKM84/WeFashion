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
        // $products = Product::all();  
        // $books = Book::paginate(6);
        $products = Product::with('image', 'category')->paginate(6);

        // $prefix = request()->page ?? 'home';
        // $path = 'book'.$prefix;
        // $books = Cache::remember($path, 60 * 24, function () {
        //     return Book::published()->with('picture', 'authors')->paginate($this->paginate); // pagination
        // });

        // return view('front.index', ['books' => $books]);
        return view('front.index', ['products' => $products]);

    }
}
