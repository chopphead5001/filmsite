<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Htpp\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Product;

class registercontroller extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {

        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        $this->validate(request(), [
            'name' => 'required|string|max:16|regex:/^\S*$/u',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $rol= 'user';
        
        $user = User::create(request(['name', 'email', 'password']));

        $role = DB::table('users')
        ->where('email', request('email'))
        ->update(['role' => 'user']);

        auth()->login($user);

        $products = Product::latest()->take(10)->get();

        return redirect()->route('main.home');

    }
    
}
