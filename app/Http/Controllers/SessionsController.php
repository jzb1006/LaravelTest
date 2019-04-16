<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SessionsController extends Controller
{
    //
    public function create(){
        return view('Sessions.create');
    }

    public function store(Request $request){
        $credentials = $this->validate($request,[
           'email'=>'required|email|max:255',
           'password'=>'required'
        ]);
        if(Auth::attempt($credentials)){
            //yes
            session()->flash('success','欢迎回来');
            return redirect()->route('users.show',[Auth::user()]);
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
