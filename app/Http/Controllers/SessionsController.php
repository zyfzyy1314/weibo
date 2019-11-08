<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\SessionUserRequest;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(SessionUserRequest $request)
    {
        $req_data =  ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($req_data )) {
            session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

}
