<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.Dashboard');
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $message=[];
         Auth::attempt(['email'=>$email,'password'=>$password]);
         return redirect()->route('admin')->with('messageFailed','Đăng nhập không thành công');


    }
    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }
    public function test()
    {
        echo "done";
    }
}
