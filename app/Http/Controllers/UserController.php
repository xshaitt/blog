<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInfo;
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
            'required' => ':attribute不能为空',
            'alpha_num' => ':attribute只能为字母或者数字',
            'confirmed' => '两次输入的密码不一致',
            'between' => ':attribute最小:min个字符,最大:max个字符',
            'name.unique' => '用户名已被注册',
        ];
        $this->validate($request, [
            'name' => 'required|alpha_num|between:4,8|unique:users,name',
            'password' => 'required|alpha_num|confirmed|between:4,8',
            'password_confirmation' => 'required',
        ], $message);
        $result = User::create($request->all());
        if ($result) {
            UserInfo::create(['user_id' => $result->id]);
            //注册成功跳转之前,我们先创建与用户表对应的用户信息表
            return redirect('/');
        } else {
            return redirect('reg');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $name = $request->get('name');
        $password = $request->get('password');
        if (Auth::attempt(['name' => $name, 'password' => $password])) {
            return redirect()->intended('/');
        }
        $request->session()->flash('loginError', '用户名或者密码错误');
        return redirect('login');
    }

    public function profile($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect('/');
        }
        $userInfo = UserInfo::find($user_id);
        if ($user->id == Auth::user()->id) {
            return view('profile_this', ['user' => Auth::user()->toArray(),'userInfo'=>$userInfo->toArray()]);
        }
        return view('profile', ['user' => $user->toArray(),'userInfo'=>$userInfo->toArray()]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function loginId($user_id)
    {
        Auth::logout();
        Auth::loginUsingId($user_id);
        return redirect()->route('profile',['user_id'=>$user_id]);
    }

    public function updateProfile(Request $request, $user_id)
    {
        if ($user_id == Auth::user()->id) {
            if (UserInfo::find($user_id)->update($request->all(0))) {
                $request->session()->flash('updateProfile', '更新成功');
            } else {
                $request->session()->flash('updateProfile', '更新失败');
            }
        } else {
            $request->session()->flash('updateProfile', '请不要乱改');
        }
        return redirect()->route('profile',['user_id'=>$user_id]);
    }
}
