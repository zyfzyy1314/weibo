<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests\CreateUserRequest;
use Auth;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',[
            'except' =>['create','store','show']
        ]);

        $this->middleware('guest',[
            'only'=>['create']
        ]);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('users.index',compact('users'));
    }


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
        $this->authorize('update', $user);

        if($user->id<> Auth::user()->id)
        {
            $user = Auth::user();
            return redirect()->route('users.edit',$user);
        }
        else
         {
            return view('users.edit',compact('user'));
         }
           

    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);

        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);
        
        $data=[];
        $data['name']=$request->name;
        
        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
            $user->update($data);
            Auth::logout();
            session()->flash('info','请重新登录');
            return redirect()->route('login');
            
        }
        else
        {
            $user->update($data);
            session()->flash('success','更新用户资料成功');

            return redirect()->route('users.show',$user->id);
        }
        
        

    }

}
