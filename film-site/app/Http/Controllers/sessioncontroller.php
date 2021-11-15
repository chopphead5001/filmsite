<?php

namespace App\Http\Controllers;

use Illuminate\Htpp\Request;
use App\Models\User;

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
        } else {
            if(auth()->user()->role == 'admin') {
                return redirect()->route('admin.index');
            }else {
                return redirect()->to('/');
            }
        }     
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/');
    }
}
