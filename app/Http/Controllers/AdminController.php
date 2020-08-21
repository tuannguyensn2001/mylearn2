<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function __construct()
    {


    }

    public function index()
    {



        return Auth::guard('admin')->check() ? view('Admin.dashboard') : view('Admin.login');
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $message=[];
         $check=Auth::guard('admin')->attempt(['username'=>$username,'password'=>$password]);
         return redirect()->back()->withInput()->with('message','Đăng nhập không thành công');



    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->back();

    }
    public function register()
    {
        $name="admin";
        $email="admin1@gmail.com";
        $password=Hash::make("java2001");
        $admin = new Admin();
        $admin->name=$name;
        $admin->email=$email;
        $admin->password=$password;
        $admin->save();

    }
}
