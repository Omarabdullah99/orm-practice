<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// -------------------user related route start----------------------

Route::get('/allUsers', [UserController::class, 'index'])->name('user.index');
// user create related route start
Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::post('user/post', [UserController::class, 'store'])->name('user.store');
// user create related route end
Route::get('/users/{user}', [UserController::class, 'single'])->name('user.single');

// user update related route start
Route::get('/user/update/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/users/{user}', [UserController::class, 'update'])->name('user.update');

// user delete related route start
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.delete');

// -------------------user related route end----------------------



// -------------------Products related route start----------------------

// get all Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

//get single product
Route::get('/product/{product}', [ProductController::class, 'single'])->name('products.single');

//product create related route:

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

//product update related route:

Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::patch('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');


//product delete related route
Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('products.delete');
