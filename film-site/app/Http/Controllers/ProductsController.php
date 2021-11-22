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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'country' => 'required',
            'price' => 'required',
        ]);

        $product = new Product();

        $product->title = $request->title;
        $product->country = $request->country;
        $product->price = $request->price;
        $product->userid = Auth()->user()->id;

        $product->save();
    
        $name = $request->file('image')->getClientOriginalName();
    
        $path = $request->file('image')->store('public/images');
    
    
        $photo = new Photo;
    
        $photo->name = $name;
        $photo->path = $path;
    
        $photo->save();

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
