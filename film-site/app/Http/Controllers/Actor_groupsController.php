<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Actor_groups;
use App\Models\Product;
use App\Models\Actors;
use Storage;
use Session;

class Actor_groupsController extends Controller {

    public function create() {

        $film = DB::table('products')
        ->where('id', Session::get('film'))
        ->first();

        $actors = Actors::all();

        if(is_null($film)){

            abort(404);

        }

        return view('actorgroup.create', compact('film', 'actors'));   
    }

    public function add(Request $request) {

        Session::put('film', $request->invisible);

        return redirect()->route('actorgroup.create');  
    }

    public function store(Request $request) {

        $id = Session::get('film');

        if($request->input('add')){

            $validatedData = $request->validate([
                'actor' => 'required',
            ]);
            
            $actorgroup = new Actor_groups();

            $actorgroup->actor = $request->actor;
            $actorgroup->film = $id;

            $actorgroup->save();

            return redirect()->route('actorgroup.create')
            ->with('message', 'Actor agregado, agregue un nuevo artista o finalice la operacion.');
        }

        if($request->input('end')){

            if( $request->filled('actor')){

           
            $actorgroup = new Actor_groups();

            $actorgroup->actor = $request->actor;
            $actorgroup->film = $id;

            $actorgroup->save();

            return redirect()->route('products.index')
            ->with('message', 'Pelicula creada con exito');

            }else{

                $actorgroupexist = DB::table('actor_groups')
                ->where('film', $id)
                ->first();

                if (is_null($actorgroupexist)){

                return redirect()->route('actorgroup.create')
                ->with('message', 'Usted no ha agregado ningun actor, por favor agregue al menos 1');

                }else{

                    return redirect()->route('products.index')
                    ->with('message', 'Operacion finalizada con exito');

                }     
                
            }

        }
        
    }

    public function edit($id) {

        $film = DB::table('products')
        ->where('id', $id)
        ->first();

        if(is_null($film)) {

            abort(404);

        }

        if($film->userid == auth()->user()->id || auth()->user()->role == 'admin') {

            $actorgroup = DB::table('actor_groups')
            ->where('film', $id)
            ->get();

            $actors = Actors::all();

            $product = Session::get('film');
                
            return view('actorgroup.edit', compact('actorgroup', 'actors', 'product'));

        }else {

            abort(404);

        }

    }

    public function selected(Request $request) {

        $actorgroup = DB::table('actor_groups')
        ->where('id', $request->invisible)
        ->first();

        if(is_null($actorgroup)){

            abort(404);

        }

        $actors = Actors::all();

        return view('actorgroup.selected', compact('actorgroup', 'actors'));

    }

    public function update(Request $request, $id) {

        if($request->input('upgrade')){

            $actorgroup = Actor_groups::find($id);

            $actorgroup->actor = $request->actor;

            $actorgroup->update();
  
            return redirect()->route('products.index')
            ->with('message', 'Pelicula editada con exito.');

        }

    }

    public function destroy($id) {

        $actorgroup = Actor_groups::find($id);

        $actorgroup->delete();
  
        return redirect()->route('products.index')
        ->with('message', 'Actor eliminado con exito.');


    }

    public function show($id) {

        abort(404);

    }

    public function index() {

        abort(404);

    }

}
