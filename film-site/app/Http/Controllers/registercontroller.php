<?php

namespace App\Http\Controllers;

use Illuminate\Htpp\Request;

class registercontroller extends Controller
{
    public function create() {
        return view('auth.register');
    }
}
