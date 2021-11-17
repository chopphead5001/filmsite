<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\sessioncontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\GuestController;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/register', [registercontroller::class, 'create'])
->name('register.index');

Route::post('/register', [registercontroller::class, 'store'])
->middleware('guest')
->name('register.index');

Route::get('/login', [sessioncontroller::class, 'create'])
->middleware('guest')
->name('login.index');

Route::post('/login', [sessioncontroller::class, 'store'])
->name('login.store');

Route::get('/logout', [sessioncontroller::class, 'destroy'])
->middleware('auth')
->name('login.destroy');

route::get('/admin', [AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');

Route::get('/products', [ProductsController::class, 'index'])
->name('products.index');

Route::get('/guest', [GuestController::class, 'index'])
->name('guest.index');

//Route::get('/user', [sessioncontroller::class, 'index'])
//->name('user.index');
