<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Actor_groups;

class AdminController extends Controller {

    public function index(){
        
        if(!auth()->user()) {

            $products = Product::latest()->take(10)->get();

            return view('guest.index', compact('products'));
        }

        elseif(auth()->user()->role) {

            $products = Product::latest()->take(10)->get();

            return view('main.home', compact('products'));

        }

    }

    public function selected(Request $request) {

        $actorgroup = DB::table('actor_groups')
        ->where('film', $request->invisible)
        ->get();

        $product = DB::table('Products')
        ->where('id', $request->invisible)
        ->first();
        
        if(is_null($product)){

            abort(404);

        }

        if(!auth()->user()) {

            return view('guest.selected', compact('product', 'actorgroup'));

        }elseif(auth()->user()->role) {

        return view('main.selected', compact('product', 'actorgroup'));
        
        }

    }
}
