<?php

namespace App\Http\Controllers;

use Illuminate\Htpp\Request;

class sessioncontroller extends Controller
{
    public function create() {
        return view('auth.login');
    }
}
