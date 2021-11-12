<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\sessioncontroller;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [registercontroller::class, 'create'])->name('register.index');
Route::get('/login', [sessioncontroller::class, 'create'])->name('login.index');


