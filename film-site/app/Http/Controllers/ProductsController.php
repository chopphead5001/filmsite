<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Photo;

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
            'country' => 'required',
            'price' => 'required',
        ]);
        
        if(file_exists($request->file('image'))){

        $path = $request->file('image')->store('public/images');

        }else{
            $path = 'images/default.png';
        }

        $photo = new Photo;

        $photo->path = $path;
    
        $photo->save();

        $product = new Product();

        $product->title = $request->title;
        $product->country = $request->country;
        $product->price = $request->price;
        $product->userid = Auth()->user()->id;
        $product->photopath = $photo->path;

        $product->save();

        return redirect()->route('products.index');
        
    }

    public function edit($id) {

        $product = Product::find($id);

        return view('products.edit', compact('product'));       
    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'title' => 'required',
            'country' => 'required',
            'price' => 'required',
        ]);

        $product = Product::find($id);

        $product->update($request->all());

        return redirect()->route('products.index');
    }

    public function destroy($id) {

        $product = Product::find($id);

        $product->delete();

        return redirect()->route('products.index');

    }

}
