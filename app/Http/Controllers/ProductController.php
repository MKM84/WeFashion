<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(8);
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
               return view('back.product.create', ['categories' => $categories, 'images' => $images]);
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
            'status' => 'in:standard,sold',
            'reference' => 'required|alpha_num',
            'category_id' => 'integer',
            // 'authors.*' => 'integer', // pour vérifier un tableau d'entiers il faut mettre authors.*
            'image' => 'required|image|max:3000'
        ]);

        $product = Product::create($request->all()); 

        // On utilise le modèle Book et la relation authors ManyToMany pour attacher des/un nouveaux/nouvel auteur(s)
        // à un livre que l'on vient de créer en base de données.
        // Attention $request->authors correspond aux données du formulaire alors $book->authors() à la relation ManyToMany
        // $product->authors()->attach($request->authors);

        // image
        $im = $request->file('image');
        // si on associe une image à un book 
        if (!empty($im)) {
            $category = $request->category_id == 1 ? "hommes" : "femmes";

            $link = $request->file('image')->store('/'. $category);

            // mettre à jour la table picture pour le lien vers l'image dans la base de données
            $product->image()->create([
                'link' => $link,
            ]);

        }
        return redirect()->route('product.index')->with('message', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('back.product.show', ['product' => $product]);
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
        $image = Image::pluck('link', 'id')->all();
        $categories =Category::all();
        return view('back.product.edit', compact('product', 'categorie', 'image', 'categories'));
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
            'status' => 'in:standard,sold',
            'reference' => 'required|alpha_num',
            'category_id' => 'integer',
            
            // 'authors.*' => 'integer', // pour vérifier un tableau d'entiers il faut mettre authors.*
            'image' => 'image|max:3000'
        ]);

        $product = Product::find($id);
        $product->update($request->all());

                // image
                $im = $request->file('image');
                // si on associe une image à un book 
                if (!empty($im)) {
                    $category = $request->category_id == 1 ? "hommes" : "femmes";
        
                    $link = $request->file('image')->store('/'. $category);
        
                    // mettre à jour la table picture pour le lien vers l'image dans la base de données
                    $product->image()->update([
                        'link' => $link,
                    ]);
        
                }
                return redirect()->route('product.index')->with('message', 'success');

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
        // suppression de l'image si elle existe 
        // if ($product->image) {
        //     Storage::disk('local')->delete($product->image->link); // supprimer physiquement l'image
        //     $product->image()->delete(); // supprimer l'information en base de données
        // }
        $product->delete();
        return redirect()->route('product.index')->with('message', 'success delete');
    }
}
