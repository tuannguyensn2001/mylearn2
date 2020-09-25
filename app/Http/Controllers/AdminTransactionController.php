<?php

namespace App\Http\Controllers;

use App\UserToCourse;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transaction=UserToCourse::query()
            ->select('users.name as user','courses.name as course','usertocourse.*')
            ->leftJoin('courses','courses.id','=','usertocourse.course_id')
            ->leftJoin('users','users.id','=','usertocourse.user_id')
            ->orderBy('usertocourse.created_at','desc')
            ->get();


        return view('Admin.transaction',['transaction'=>$transaction]);
    }
}
