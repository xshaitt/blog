<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function reg()
    {
        return view('reg');
    }
    public function createUser(Request $request)
    {
        dd($request->all());
    }
}
