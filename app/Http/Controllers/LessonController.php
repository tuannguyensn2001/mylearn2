<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use App\Lessoncomment;
use App\UserToCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
class LessonController extends Controller
{
    public function showLesson($slug,Request $request)
    {




        $lesson=Lesson::query()
            ->where('slug','=',$slug)
            ->first();
        return $lesson->slug;
    }
    public function index($course,$lesson)
    {
        $course=Course::where('slug','=',$course)->first();
        $course_id=$course->id;

        $list_lesson=Lesson::where('course_id','=',$course_id)
            ->where('status','=','1')
            ->get();

        $lesson=Lesson::where('slug','=',$lesson)
            ->where('course_id','=',$course_id)
            ->where('status','=','1')
            ->first();


        $previousNext=['previous'=>$this->getPreviousLesson($course_id,$lesson->id),'next'=>$this->getNextLesson($course_id,$lesson->id)];

        return view('lesson',[
            'lesson'=>$lesson,
            'course'=>$course,
            'list_lesson'=>$list_lesson,
            'previousNext'=>$previousNext,
            'list_comment'=>$this->getComment($lesson->id),
        ]);
    }
    public function getPreviousLesson($course_id,$lesson_id)
    {
        $previousLesson=Lesson::query()
            ->where('course_id','=',$course_id)
            ->where('id','<',$lesson_id)
            ->where('status','=','1')
            ->orderBy('id','desc')
            ->first();
        return $previousLesson != null ? $previousLesson : null;
    }
    public function getNextLesson($course_id,$lesson_id)
    {
        $nextLesson=Lesson::query()
            ->where('course_id','=',$course_id)
            ->where('id','>',$lesson_id)
            ->where('status','=','1')
            ->first();
        return $nextLesson != null ? $nextLesson : null;
    }
    public function addComment(Request $request)
    {
        $user=Auth::user();

        $validator=Validator::make($request->all(),[
            'comment'=>'required',
            'lesson_id'=>'numeric'
        ]);
        if (!$validator->fails()){
            $comment = new Lessoncomment();
            $comment->lesson_id=$request->lesson_id;
            $comment->comment=$request->comment;
            $comment->user_id=Auth::user()->id;
            $comment->save();
            return response()->json(['message'=>'Thêm tin nhắn không thành công','avatar'=>asset(\Illuminate\Support\Facades\Auth::user()->avatar),'name'=>$user->name],201);
        }
        return response()->json(['message'=>'Thêm tin nhắn không thành công'],201);
    }
    public function getComment($lesson_id)
    {
        $count=Lessoncomment::where('lesson_id','=',$lesson_id)->get()->count();
        $comment=Lessoncomment::query()
            ->select('lessoncomments.comment','users.avatar','users.name')
            ->leftJoin('users','users.id','=','lessoncomments.user_id')
            ->orderBy('lessoncomments.created_at','desc')
            ->where('lessoncomments.lesson_id','=',$lesson_id)
            ->get();
        return ['count'=>$count,'comment'=>$comment];
    }
}
