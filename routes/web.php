<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

