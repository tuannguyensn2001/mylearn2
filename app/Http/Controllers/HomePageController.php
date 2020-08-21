<?php

namespace App\Http\Controllers;

use App\Course;
use App\Instructor;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class HomePageController extends Controller
{

    public function __construct()
    {
       $course=Course::query()
           ->select(['courses.*','categories.name as category'])
           ->leftJoin('categories','categories.id','=','courses.category_id')
           ->OrderBy('id','desc')
           ->where('courses.status_id','=','1')
           ->take(3)
            ->get();
       $instructor=Instructor::all();
       View::share('instructor',$instructor);



        View::share('course',$course);
    }

    public function index()
    {


        return view('index');
    }
    public function login(Request $request)
    {
       $validator=Validator::make($request->all(),[
           'username'=>'min:6',
           'password'=>'min:6',
       ]);
        $check=Auth::attempt(['username'=>$request->username,'password'=>$request->password]);



        return $check ? redirect()->route('home') : redirect()->back()->with('login.failed','Đăng nhập không thành công');

    }
    public function signupPage()
    {
        return view('signup');
    }
    public function loginPage()
    {
        return view('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
    public function signUp(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'username'=>'required|min:6',
            'email'=>'required|email | unique:users,email',
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password',
        ]);

        if(!$validator->fails()){
            $user= new Instructor();
            $user->username=$request->username;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->status=1;
            $user->save();
            return redirect()->route('login');
        }
        return redirect()->back()->withErrors($validator);
    }

}
