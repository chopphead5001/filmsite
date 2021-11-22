<?php

namespace App\Http\Controllers;

use Illuminate\Htpp\Request;
use App\Models\User;

class registercontroller extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));

        //$user = new User();

        //$user->nombre = $request->nombre;
        //$user->email = $request->email;
        //$user->password = $request->password;

        //$user->save();

        auth()->login($user);
        return redirect()->to('/');
    }
}
