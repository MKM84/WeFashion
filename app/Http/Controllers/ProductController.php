<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Image;
use App\Size;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('gender', 'id')->all();
        $images = Image::pluck('link', 'id')->all();
        $sizes = Size::pluck('name', 'id')->all();

        return view('back.product.create', ['categories' => $categories, 'images' => $images, 'sizes' => $sizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|string',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'size' => 'in:XL,L,M,S,XS',
            'visibility' => 'in:published,unpublished',
            'status' => 'in:standard,solde',
            'reference' => 'required|alpha_num',
            'category_id' => 'integer',
            'sizes.*' => 'integer',
            'image' => 'required|image|max:3000'
        ]);

        $product = Product::create($request->all());
        $product->sizes()->attach($request->sizes);



        // image
        $im = $request->file('image');

        if (!empty($im)) {

            $category_id = $request->category_id;
            $category = Category::find($category_id);
            $category_gender = $category->gender;

            $link = $request->file('image')->store('/' . $category_gender);

            $product->image()->create([
                'link' => $link,
            ]);
        }
        return redirect()->route('product.index')->with('message', 'Le produit a bien été ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::find($id);
        // return view('back.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categorie = Category::pluck('gender', 'id')->all();
        $sizes = Size::pluck('name', 'id')->all();
        $image = Image::pluck('link', 'id')->all();
        $categories = Category::all();
        
        return view('back.product.edit', compact('product', 'categorie', 'image', 'categories', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|string',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'size' => 'in:XL,L,M,S,XS',
            'visibility' => 'in:published,unpublished',
            'status' => 'in:standard,solde',
            'reference' => 'required|alpha_num',
            'category_id' => 'integer',
            'sizes.*' => 'integer',
            'image' => 'image|max:3000'
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        $product->sizes()->sync($request->sizes);

        // image
        $im = $request->file('image');

        if (!empty($im)) {


            $category_id = $request->category_id;
            $category = Category::find($category_id);
            $category_gender = $category->gender;

            $link = $request->file('image')->store('/' . $category_gender);

            $product->image()->update([
                'link' => $link,
            ]);
        }
        return redirect()->route('product.index')->with('message', 'Le produit a bien été édité !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect()->route('product.index')->with('message', 'Le produit a bien été supprimé !');
    }
}
