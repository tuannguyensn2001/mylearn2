<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\User;
use App\UserToCourse;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {



        $user = User::all();
        $course = Course::all();
        return view('Admin.user.listUser', [
            'user' => $user,
            'course' => $course,

        ]);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $course=UserToCourse::query()
            ->select('course_id')
            ->where([
                ['user_id','=',$id],
                ['is_active','=','1'],
                ['type','=','1'],
            ]) -> get();
        return [$user,$course];
    }


    public function setCourse(Request $request)
    {
        $course_id = $request->course_id;
        $user_id = $request->user_id;
        $check = $request->check;
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
                $relation->notes='Admin set';
                $relation->save();

                return $relation;
            }
            else {
                $newRelation = new UserToCourse();

                $newRelation->course_id = $course_id;
                $newRelation->user_id = $user_id;
                $newRelation->is_active = 1;

                $newRelation->type=1;
                $newRelation->notes="Admin set";
                $newRelation->save();
            }
        } else{

            $relation->is_active = 0;
            $relation->notes='Admin set';
            $relation->save();
        }


    }

}
