<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests\CreateUserRequest;
use Auth;

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

        $user = User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),

        ]);
        
        //session()->flash('success','欢迎，您将在这里开启一段新的旅程~');
        // return redirect()->route('users.show', [$user]); 等同$user->id
        //return redirect()->route('users.show', $user->id);

        Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);

    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));

    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'required|confirmed|min:6'
        ]);
        
        $user->update([
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
        ]);
        
         return redirect()->route('users.show',$user->id);
    }

}
