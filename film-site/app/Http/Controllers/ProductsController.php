<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Actor_groups;
use Storage;
use Session;

class ProductsController extends Controller {
    
    public function index() {

        if(is_null(DB::table('products')->where('userid', auth()->user()->id)->first())){

            return redirect()->route('products.create')
            ->with('message', 'Usted no tiene ninguna pelicula, por favor agregue su primer gran obra.');

        }else{

            $products = Product::all();

            $actorgroup = Actor_groups::all();

            return view('products.index', compact('products', 'actorgroup'));

        }
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

        Session::put('film', $product->id);

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

        Session::put('film', $product->id);

        return redirect()->route('actorgroup.edit', $product->id);
    }

    public function destroy($id) {

        $product = Product::find($id);

        if($product->photopath == 'images/default.png'){

        }else{

            Storage::delete($product->photopath);

        }

        $product->delete();

        DB::table('actor_groups')->where('film',$id)->delete();

        return redirect()->route('products.index')
        ->with('message', 'Pelicula eliminada con exito');
        
    }

}
