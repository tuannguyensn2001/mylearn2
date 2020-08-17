<?php

namespace App\Http\Controllers;

use App\Course;
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




        View::share('course',$course);
    }

    public function index()
    {

        return view('index');
    }

}
