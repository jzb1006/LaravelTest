<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['show','create','store']
        ]);
        $this->middleware('guest',[
            'only'=>['create']
        ]);
    }

    //
    public function create(){
        return view('Sessions.create');
    }

    public function store(Request $request){
        $credentials = $this->validate($request,[
           'email'=>'required|email|max:255',
           'password'=>'required'
        ]);
        if(Auth::attempt($credentials,$request->has('remember'))){
            //yes
            if(Auth::user()->activated){
                session()->flash('success','欢迎回来');
                $fallback =  redirect()->route('users.show',[Auth::user()]);
                return redirect()->intended($fallback);
            }else{
                Auth::logout();
                session()->flash('warning','你的账号未激活，请检查邮箱中的注册邮件进行激活');
                return redirect('/');
            }

        }else{
            //no
            session()->flash('danger','好抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
        return ;
    }

    public function destroy(){
        Auth::logout();
        session()->flash('success','您已经退出');
        return redirect('login');
    }
}
