<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', [UserController::class, 'createUser']);
Route::get('/update', [UserController::class, 'updateUser']);
Route::get('/delete', [UserController::class, 'deleteUser']);
