<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gategories = Category::all();
        return view('back.category.index', ['gategories' => $gategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, ['gender' => 'required']);

        Category::create($request->all());

        $category = $request->gender;
        $path = public_path() . '/images/' . $category;
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }


        return redirect()->route('category.index')->with('message', 'La catégorie a bien été ajoutée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('back.category.edit', compact('category'));
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
            'gender' => 'required|string',
        ]);

        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('message', 'La catégorie a bien été éditée !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('message', 'La catégorie a bien été supprimée !');
    }
}
