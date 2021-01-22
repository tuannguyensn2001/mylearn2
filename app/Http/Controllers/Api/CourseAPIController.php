<?php

namespace App\Http\Controllers\Api;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseAPIController extends Controller
{

    public function show($slug)
    {
        $course = Course::where('slug','=',$slug)->first();

        return response()->json($course,200);
    }

}
