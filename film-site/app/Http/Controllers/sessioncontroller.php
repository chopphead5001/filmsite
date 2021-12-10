<?php

namespace App\Http\Controllers;

use Illuminate\Htpp\Request;
use App\Models\User;
use App\Models\Product;

class sessioncontroller extends Controller
{

    public function create() {
        return view('auth.login');
    }

    public function store() {

        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El email o la clave son incorrectos initentalo denuevo',
            ]);
        } elseif(auth()->user()) {
            
            $products = Product::latest()->take(10)->get();

            return redirect()->route('main.home');
            
        }     
    }

    public function destroy() {

        auth()->logout();

        return redirect()->route('login.index');
    }

}
