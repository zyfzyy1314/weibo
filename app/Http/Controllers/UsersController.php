<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests\CreateUserRequest;


use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(CreateUserRequest $request)
    {

        User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),

        ]);

        return;

    }

}
