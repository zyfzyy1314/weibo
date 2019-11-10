<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\SessionUserRequest;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',[
            'only'=>['create']
        ]);

    }

    public function create()
    {
        return view('sessions.create');
    }


    public function store(SessionUserRequest $request)
    {
      # return  $request->remember;

        $req_data =  ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($req_data,$request->has('remember'))) {
            session()->flash('success', '欢迎回来！');
            $fallback = route('users.show', Auth::user());
            return redirect()->intended($fallback);
           
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {        
        Auth::logout();
        session()->flash('info',"您已退出");
        return redirect()->route('login');
    }

}
