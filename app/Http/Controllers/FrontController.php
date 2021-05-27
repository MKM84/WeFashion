<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontController extends Controller

{

    public function __construct()
    {
        view()->composer('partials.menu', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }

    public function index()
    {
        $products = Product::orderBy('created_at')->with('image', 'category')->paginate(6);
        $allProducts = Product::all();
        $productsCount = count($allProducts);
        return view('front.index', ['products' => $products, 'productsCount' => $productsCount]);
    }

    public function showProductBySoldes()
    {
        $products = Product::Soldes()->with('image', 'category')->paginate(6);
        $activeSoldes = true;
        return view('front.soldes', ['products' => $products, 'activeSoldes' => $activeSoldes]);
    }

    // public function showProductByHommes()
    // {
    //     $products = Product::Homme()->with('image', 'category')->paginate(6);

    //     return view('front.index', ['products' => $products]);

    // }
    // public function showProductByFemmes()
    // {
    //     $products = Product::Femme()->with('image', 'category')->paginate(6);

    //     return view('front.index', ['products' => $products]);
    // }

    public function showProductByCategory($id)
    {
        $products = Product::where('category_id', $id)->paginate(6);
        $categories = Category::all()->where("id", $id)->first();
        $activeCategory = $categories->gender;
        return view('front.index', ['products' => $products, 'activeCategory' => $activeCategory]);
    }
}
