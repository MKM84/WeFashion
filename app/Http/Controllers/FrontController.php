<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Size;

class FrontController extends Controller

{
    // front navigation menu 
    public function __construct()
    {
        view()->composer('front.partials.menu', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }

    // All the products / Home page 
    public function index()
    {
        $products = Product::published()->orderBy('created_at', 'desc')->with('image', 'category', 'sizes')->paginate(6);

        return view('front.index', ['products' => $products]);
    }

    // Show discounted products (soldes)
    public function showProductBySoldes()
    {
        $products = Product::published()->Soldes()->orderBy('created_at', 'desc')->with('image', 'category')->paginate(6);
        $activeSoldes = true;
        return view('front.index', ['products' => $products, 'activeSoldes' => $activeSoldes]);
    }

    // Show produccts by category (Hommes, Femmes...)
    public function showProductByCategory($id)
    {
        $products = Product::published()->orderBy('created_at', 'desc')->where('category_id', $id)->paginate(6);
        $categories = Category::all()->where("id", $id)->first();
        $activeCategory = $categories->gender;
        return view('front.index', ['products' => $products, 'activeCategory' => $activeCategory]);
    }

    // Show one product 
    public function show(int $id)
    {
        $product = Product::published()->find($id);
        return view('front.show', ['product' => $product]);
    }
}
