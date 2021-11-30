<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Actor_groups;
use App\Models\Product;
use Storage;

class Actor_groupsController extends Controller {

    public function create() {

        return view('actorgroup.create');

    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'actor' => 'required',
        ]);

        $actorgroup = new Actor_groups();

        $actorgroup->actor = $request->actor;
        $actorgroup->film = 3;

        $actorgroup->save();

        return redirect()->route('products.index');
        
    }

    public function edit($id) {

        $actorgroup = DB::table('actor_groups')
        ->where('film', $id)
        ->first();

        return view('actorgroup.edit', compact('actorgroup'));       
    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'actor' => 'required',
        ]);

        $actorgroup = Actor_groups::find($id);

        $actorgroup->actor = $request->actor;

        $actorgroup->update();

        return redirect()->route('products.index');


    }

}
