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

        return view('actorgroup.create', compact('film', 'actors'));   
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
                    ->with('message', 'Pelicula creada con exito');

                }     
                
            }

        }
        
    }

    public function edit($id) {

        $actorgroup = DB::table('actor_groups')
        ->where('film', $id)
        ->get();

        return view('actorgroup.edit', compact('actorgroup'));       
    }

    public function update(Request $request, $id) {

        $film = Session::get('film');

        if($request->input('edit')){

            $validatedData = $request->validate([
                'actor' => 'required',
            ]);
    
            $actorgroup = Actor_groups::find($id);
    
            $actorgroup->actor = $request->actor;

            $edited = $actorgroup->actor;
    
            $actorgroup->update();

            return redirect()->back()
            ->with('message', 'Actor editado, edite otro o finalice la operacion.');

        }
        
        if($request->input('end')){

            $validatedData = $request->validate([
                'actor' => 'required',
            ]);
    
            $actorgroup = Actor_groups::find($id);
    
            $actorgroup->actor = $request->actor;
    
            $actorgroup->update();
    

            return redirect()->route('products.index')
            ->with('message', 'Pelicula editada con exito');

        }        
        
    }

}
