<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Actors;
use App\Models\Directors;
use App\Models\Actor_groups;
use App\Models\Genres;
use Storage;
use Session;

class ProductsController extends Controller {
    
    public function index() {

        if(is_null(DB::table('products')->where('userid', auth()->user()->id)->first())){

            return redirect()->route('products.create')
            ->with('message', 'Usted no tiene ninguna pelicula, por favor agregue su primer filme.');

        }else{

            $products = Product::all();

            $actorgroup = Actor_groups::all();

            $genres = Genres::all();

            return view('products.index', compact('products', 'actorgroup', 'genres'));

        }
    }

    public function create() {

        $directors = Directors::all();

        $genres = Genres::all();

        return view('products.create', compact('directors', 'genres'));

    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required|max:50',
            'director' => 'required',
            'genre' => 'required',
            'synopsis' => 'required',
            'year' => 'required|integer|min:1900|max:2050',
        ]);
        
        if(file_exists($request->file('image'))){

        $path = $request->file('image')->store('public/images');

        }else{
            $path = 'images/default.png';
        }

        $product = new Product();

        $product->title = $request->title;
        $product->director = $request->director;
        $product->genre = $request->genre;
        $product->synopsis = $request->synopsis;
        $product->year = $request->year;
        $product->userid = Auth()->user()->id;
        $product->photopath = $path;

        $product->save();

        Session::put('film', $product->id);

        return redirect()->route('actorgroup.create');
        
    }

    public function edit($id) {

        $film = DB::table('products')
        ->where('id', $id)
        ->first();

        if(is_null($film)) {

            abort(404);

        }

        if($film->userid == auth()->user()->id || auth()->user()->role == 'admin') {

            $product = Product::find($id);

            $directors = Directors::all();

            $genres = Genres::all();

            return view('products.edit', compact('product', 'directors', 'genres'));

        }else {

            abort(404);

        }
    
    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required|max:50',
            'director' => 'required',
            'genre' => 'required',
            'synopsis' => 'required',
            'year' => 'required|integer|min:1900|max:2050',
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
        $product->genre = $request->genre;
        $product->synopsis = $request->synopsis;
        $product->year = $request->year;
        $product->photopath = $path;

        $product->update();

        Session::put('film', $product);

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

        if(is_null(DB::table('products')->where('userid', auth()->user()->id)->first())){

            return redirect()->route('products.create')
            ->with('message', 'Pelicula eliminada con exito. Lamentablemente no hemos encontrado ningun filme,
            agregue uno para empezar a disfrutar del mejor cine.');

        }else{

        return redirect()->route('products.index')
        ->with('message', 'Pelicula eliminada con exito.');

        }
    }

    public function show($id) {

        abort(404);

    }

}
