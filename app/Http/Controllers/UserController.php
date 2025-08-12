<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // show all users
    public function index(User $user, Request $request)
    {
        return view('users.index', [
            'users' => User::latest()->get(),
            // 'users'=>$user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        User::create($validated);
        return redirect()->route('user.index')->with('success', 'User saved successfully');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }


    public function edit(User $user)
    {
        return view('users.update', [
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)

    {
        $validated = $request->validated();
        $user->updateOrFail($validated);
        return to_route('user.index')->with('success', 'User Updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->deleteOrFail();
        return to_route('user.index')->with('success', 'User delete Successfully');
    }

    public function single(User $user)
    {
        return view('users.single', [
            'user' => $user
        ]);
    }
}


// return view('admin.posts.index', [
//             'posts' => Post::with('user', 'category')->latest()->paginate(10),
//         ]);
