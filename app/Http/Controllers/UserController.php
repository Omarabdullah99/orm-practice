<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function createUser()
    {
        $result = User::create([
            'name' => 'new',
            'email' => 'new@gmail.com',
            'password' => '1234'
        ]);
        return $result;
    }

    function updateUser()
    {
        $result = User::where('id', 1)->update([
            'name'=>'omar update'
        ]);
        return $result;
    }

    function deleteUser(){
        $result= User::where('id', 2)->delete();
        return $result;
    }
}
