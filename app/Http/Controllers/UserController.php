<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
        ];
        $this->validate($request,[
            'name'=>'required|alpha_num|between:4,8',
            'password'=>'required|alpha_num|confirmed|between:4,8',
            'password_confirmation'=>'required',
        ],$message);
        $result = User::create($request->all());
        dd($result);
    }
}
