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


    /* 
    子中，attempt 方法执行的代码逻辑如下：

使用 email 字段的值在数据库中查找；
如果用户被找到：
1). 先将传参的 password 值进行哈希加密，然后与数据库中 password 字段中已加密的密码进行匹配；
2). 如果匹配后两个值完全一致，会创建一个『会话』给通过认证的用户。会话在创建的同时，也会种下一个名为 laravel_session 的 HTTP Cookie，以此 Cookie 来记录用户登录状态，最终返回 true；
3). 如果匹配后两个值不一致，则返回 false；
如果用户未找到，则返回 false。
    */
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
