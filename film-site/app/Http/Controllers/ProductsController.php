<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Storage;

class ProductsController extends Controller {
    
    public function index() {

        $products = Product::all();

        return view('products.index', compact('products'));

    }

    public function create() {

        return view('products.create');

    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required',
            'director' => 'required',
            'synopsis' => 'required',
            'year' => 'required',
        ]);
        
        if(file_exists($request->file('image'))){

        $path = $request->file('image')->store('public/images');

        }else{
            $path = 'images/default.png';
        }

        $product = new Product();

        $product->title = $request->title;
        $product->director = $request->director;
        $product->actor = 'un coreano';
        $product->synopsis = $request->synopsis;
        $product->year = $request->year;
        $product->userid = Auth()->user()->id;
        $product->photopath = $path;

        $product->save();

        return redirect()->route('actorgroup.create');
        
    }

    public function edit($id) {

        $product = Product::find($id);

        return view('products.edit', compact('product'));
    
    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required',
            'director' => 'required',
            'synopsis' => 'required',
            'year' => 'required',
        ]);

        $product = Product::find($id);

        if(file_exists($request->file('image'))){

            $path = $request->file('image')->store('public/images');
            
            if($product->photopath == 'images/default.png'){
            
            }else{

                Storage::delete($product->photopath);

            }

        }else{

            $path = $product->photopath;

        }

        $product->title = $request->title;
        $product->director = $request->director;
        $product->synopsis = $request->synopsis;
        $product->year = $request->year;
        $product->photopath = $path;

        $product->update();

        return redirect()->route('actorgroup.edit', $product->id);
    }

    public function destroy($id) {

        $product = Product::find($id);

        if($product->photopath == 'images/default.png'){

        }else{

            Storage::delete($product->photopath);

        }

        $product->delete();

        return redirect()->route('products.index');

    }

}
