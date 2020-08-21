<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index($slug)
    {

      $course=Course::query()
          ->select(['courses.*','categories.name as category'])
          ->leftJoin('categories','categories.id','=','courses.category_id')
          ->where('courses.slug','=',$slug)
            ->first();
      $course_id=$course->id;
      $lesson=$this->getLesson($course_id);



      return view('course_detail',[
          'course'=>$course,
          'lesson'=>$lesson,
      ]);
    }
    public function getLesson($id)
    {
        $lesson=Lesson::query()
            ->select('lessons.*','courses.name as course')
            ->leftJoin('courses','courses.id','=','lessons.course_id')
            ->where('lessons.course_id','=',$id)
            ->get();
        return $lesson;
    }

}
