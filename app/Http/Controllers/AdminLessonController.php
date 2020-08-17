<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Lesson;
use Illuminate\Support\Str;
use Validator;


use Illuminate\Http\Request;

class AdminLessonController extends Controller
{
    public function index()
    {
        return view('Admin.lesson.listLesson');
    }
    public function getAll(Request $request)
    {
        $category=Category::all();
        $course=Course::all();
        $lesson=Lesson::query()
            ->leftJoin('courses','lessons.course_id','=','courses.id')
            ->get(['lessons.*','courses.name as course']);
        $data=[
            'category'=>$category,
            'course'=>$course,
            'lesson'=>$lesson,
            'request'=>$request->url(),
        ];
        return $data;
    }
    public function create(Request $request)
    {
        $validator=Validator::make($request->all(),[
           'name'=>'required',
           'video'=>'required',
            'status_id'=>'numeric'
        ]);
        if (!$validator->fails()){
            $lesson= new Lesson();
            $lesson->name=$request->input('name');
            $lesson->slug=Str::slug($lesson->name,'-');
            $lesson->video=$request->input('video');
            $lesson->status=$request->status_id;
            $lesson->course_id=$request->input('course_id');
            $lesson->save();
        }
        return redirect()->back();
    }
    public function edit(Request $request)
    {
       $validator=Validator::make($request->all(),[
           'lesson_id'=>'numeric',
           'name'=>'required',
           'video'=>'required',
           'lesson_status_id'=>'numeric'
       ]);
       if (!$validator->fails()){
           $lesson=Lesson::find($request->lesson_id);
           $lesson->name=$request->name;
           $lesson->slug=Str::slug($lesson->name,'-');
           $lesson->video=$request->video;
           $lesson->status=$request->lesson_status_id;
           $lesson->save();
           return redirect()->back()->with('edit.done','Sửa thành công')->withInput();
       }
       return redirect()->back()->with('edit.failed','Sửa không thành công')->withInput();
    }
}
