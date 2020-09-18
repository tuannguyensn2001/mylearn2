<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Instructor;
use App\Lesson;
use App\Review;
use App\User;
use App\UserToCourse;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

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
      $mentor=$this->getInstructors($course_id);
      $lesson=$this->getLesson($course_id);
      $check= $this->checkUserHaveCourse($course_id);

      $relationCourse=$this->getCourseRelationship($course->category_id,$course_id);
        $this->getMembers($course_id);
        return view('course_detail',[
          'course'=>$course,
          'lesson'=>$lesson,
          'mentor'=>$mentor,
            'checkUserHaveCourse'=>$check,
            'relationCourse'=>$relationCourse,
            'review'=>$this->getReview($course_id),


      ]);
    }

    public function getLesson($id)
    {
        $lesson=Lesson::query()
            ->select('lessons.*','courses.name as course')
            ->leftJoin('courses','courses.id','=','lessons.course_id')
            ->where('lessons.course_id','=',$id)
            ->where('lessons.status','=','1')
            ->get();
        return $lesson;
    }
    public function checkUserHaveCourse($course_id)
    {
        $check=true;
        $user_id=null;
        if (Auth::check()){
            $user_id=Auth::user()->id;
            $checkUserHaveCourse=UserToCourse::query()
                ->where([
                    ['course_id','=',$course_id],
                    ['user_id','=',$user_id],
                    ['is_active','=','1'],
                    ['type','=','1']
                ]) -> first();

            $check = $checkUserHaveCourse != null ? true : false;

        } else{
            $check=false;
        }
        return $check;
    }
    public function getReview($id)
    {
        return Review::query()
          ->select('reviews.*','users.username','users.avatar')
            ->leftJoin('users','reviews.user_id','=','users.id')
            ->where('users.status','=','1')
            ->where('reviews.course_id','=',$id)
            ->where('reviews.status','=','1')
            ->get();
    }
    public function getInstructors($course_id)
    {
        $mentor=Instructor::query()
            ->select(['instructors.*'])
            ->leftJoin('usertocourse','usertocourse.user_id','=','instructors.id')
            ->where([
                ['usertocourse.course_id','=',$course_id],
                ['usertocourse.type','=','2']
            ]) ->get();
        return $mentor;
    }
    public function getCourseRelationship($category_id,$id)
    {
        $course=Course::query()
            ->select('courses.*','categories.name as category')
            ->leftJoin('categories','categories.id','=','courses.category_id')
            ->where('courses.id','<>',$id)
            ->where('courses.category_id','=',$category_id)
            ->limit(4)
            ->get();
        return $course;
    }
    public function getMembers($course_id)
    {
        $members=UserToCourse::query()
            ->select('users.*')
            ->leftJoin('courses','courses.id','=','usertocourse.course_id')
            ->rightJoin('users','users.id','=','usertocourse.user_id')
            ->where([
                ['usertocourse.course_id','=',$course_id],
                ['usertocourse.is_active','=','1'],
                ['usertocourse.type','=','1']
            ])
            ->get();

       View::share('members',$members);
    }
    public function course()
    {

        $courses=Course::query()
            ->select('courses.*','categories.name as category','categories.slug as cate_slug','count.count')
            ->leftJoin('categories','categories.id','=','courses.category_id')
            ->join(DB::raw('(SELECT COUNT(user_id) as count,course_id FROM usertocourse WHERE type=1 GROUP BY course_id) as count'),'count.course_id','=','courses.id')
            ->take(3)
            ->get();







        return view('course',[
            'course'=>$courses,
            'category'=>Category::all(),
        ]);
    }




    public function loadMore(Request $request)
    {
        $count=Course::all()->count()-3;
        $status= $request->count != $count ? 1 : 0;
        $courses=Course::query()
            ->select('courses.*','categories.name as category','categories.slug as cate_slug','count.count')
            ->leftJoin('categories','categories.id','=','courses.category_id')
            ->join(DB::raw('(SELECT COUNT(user_id) as count,course_id FROM usertocourse WHERE type=1 GROUP BY course_id) as count'),'count.course_id','=','courses.id')
            ->skip($request->count)
            ->take(3)
            ->get();
            return response()->json(['courses'=>$courses,'status'=>$status]);
    }
    public function filter($slug)
    {

        $category=Category::where('slug','=',$slug)->first();
        $category_id=$category->id;
        $course=Course::query()
            ->select('courses.*','categories.name as category','categories.slug as cate_slug','count.count')
            ->leftJoin('categories','categories.id','=','courses.category_id')
            ->join(DB::raw('(SELECT COUNT(user_id) as count,course_id FROM usertocourse WHERE type=1 GROUP BY course_id) as count'),'count.course_id','=','courses.id')
            ->where('courses.category_id','=',$category_id)
            ->get();
        return view('course_filter',[
            'course'=>$course,
            'category_name'=>$category->name,
            'category'=>Category::all()
        ]);
    }
    public function buy(Request $request)
    {

        $user_id=Auth::user()->id;
        $course_id=$request->course_id;

        $coin=User::query()
            ->select('coin')
            ->where('id','=',$user_id)
            ->first()->coin;

        $price=Course::query()
            ->select('price')
            ->where('id','=',$course_id)
            ->first()->price;





        if ($coin >= $price){


            $this->buyCourse($course_id,$user_id);


            $user= User::find($user_id);
            $user->coin=$coin-$price;
            $user->save();
            return response()->json(['message'=>'Mua thành công','status'=>200],200);
        }
        return response()->json(['status'=>202],202);
    }
    public function buyCourse($course_id,$user_id)
    {

        $check = true;
        $relation = UserToCourse::query()
            ->where([
                ['course_id', '=', $course_id],
                ['user_id', '=', $user_id],
                ['type','=','1']
            ])
            ->first();

        if ($check == 'true') {
            if ($relation != null ) {
                $relation->is_active = 1;
                $relation->save();

            }
            else {
                $newRelation = new UserToCourse();

                $newRelation->course_id = $course_id;
                $newRelation->user_id = $user_id;
                $newRelation->is_active = 1;
                $newRelation->type=1;
                $newRelation->save();
            }
        } else{

            $relation->is_active = 0;
            $relation->save();
        }

    }
    public function lesson()
    {
        return view('lesson');
    }

}
