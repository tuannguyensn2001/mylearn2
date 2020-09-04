<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class WriterController extends Controller
{
    public function index()
    {
        if (Auth::guard('writer')->check()){
            return view('Writer.dashboard');
        }
        return view('Writer.login');
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $message=[];
        $check=Auth::guard('writer')->attempt(['username'=>$username,'password'=>$password]);
        return redirect()->back()->withInput()->with('message','Đăng nhập không thành công');
    }
    public function logout()
    {
        Auth::guard('writer')->logout();
        return redirect()->route('writer');
    }
}
