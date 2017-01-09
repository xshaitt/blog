<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    public function reg()
    {
        return view('reg');
    }
    public function createUser(Request $request)
    {
        $message = [
            'required'=>':attribute不能为空',
            'alpha_num'=>':attribute只能为字母或者数字',
            'confirmed'=>'两次输入的密码不一致',
            'between'=>':attribute最小:min个字符,最大:max个字符',
            'name.unique'=>'用户名已被注册',
        ];
        $this->validate($request,[
            'name'=>'required|alpha_num|between:4,8|unique:users,name',
            'password'=>'required|alpha_num|confirmed|between:4,8',
            'password_confirmation'=>'required',
        ],$message);
        $result = User::create($request->all());
        if($result)
        {
            return redirect('/');
        }else{
            return redirect('reg');
        }
    }
    public function login(){
        return view('login');
    }
    public function doLogin(Request $request)
    {
        $name = $request->get('name');
        $password = $request->get('password');
        if(Auth::attempt(['name'=>$name,'password'=>$password]))
        {
            return redirect()->intended('/');
        }
        $request->session()->flash('loginError','用户名或者密码错误');
        return redirect('login');
    }
    public function profile()
    {
        return view('profile',['user'=>Auth::user()->toArray()]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function loginId()
    {
        Auth::logout();
        Auth::loginUsingId(1);
        return redirect('profile');
    }
}
