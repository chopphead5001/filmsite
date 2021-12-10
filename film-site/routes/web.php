<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\sessioncontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Actor_groupsController;
use Resources\Views\user;

route::post('home/selected', [AdminController::class, 'selected'])
->name('main.selected');

Route::get('/home/selected', function () {
    return abort(404);
});

route::get('/home', [AdminController::class, 'index'])
->name('main.home');

Route::get('/register', [registercontroller::class, 'create'])
->middleware('guest')
->name('register.index');

Route::post('/register/store', [registercontroller::class, 'store'])
->name('register.store');

Route::get('/register/store', function () {
    return abort(404);
});

Route::get('/', [sessioncontroller::class, 'create'])
->middleware('guest')
->name('login.index');

Route::post('/login/store', [sessioncontroller::class, 'store'])
->name('login.store');

Route::get('/login/store', function () {
    return abort(404);
});

Route::get('/logout', [sessioncontroller::class, 'destroy'])
->middleware('auth')
->name('login.destroy');

Route::get('/products', [ProductsController::class, 'index'])
->name('products.index');

Route::post('/products/create', [ProductsController::class, 'store'])
->middleware('auth')
->name('products.store');

Route::get('/create', [ProductsController::class, 'create'])
->middleware('auth')
->name('products.create');

Route::resource('products', ProductsController::class)
->middleware('auth');

Route::post('/actorgroup/create', [Actor_groupsController::class, 'store'])
->middleware('auth')
->name('actorgroup.store');

Route::get('/create', [Actor_groupsController::class, 'create'])
->middleware('auth')
->name('actorgroup.create');

Route::get('/create', function () {
    return abort(404);
});

Route::resource('actorgroup', Actor_groupsController::class)
->middleware('auth');


