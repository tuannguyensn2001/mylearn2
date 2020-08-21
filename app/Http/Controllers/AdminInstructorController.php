<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\UserToCourse;
use App\Instructor;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\In;

class AdminInstructorController extends Controller
{
    public function index()
    {
        $instructor=Instructor::all();
        $course=Course::all();
        return view('Admin.instructor.listInstructor',[
            'instructor'=>$instructor,
            'course'=>$course,
        ]);
    }
    public function show(Request $request)
    {
        $id = $request->id;
        $user = Instructor::find($id);
        $course=UserToCourse::query()
            ->select('course_id')
            ->where([
                ['user_id','=',$id],
                ['is_active','=','1'],
                ['type','=','2']
            ]) -> get();
        return [$user,$course];
    }
    public function edit(Request $request)
    {
        $check=true;
        $validator=Validator::make($request->all(),[
            'id'=>'numeric',
            'email'=>'email',
        ]);
        if (!$validator->fails()){
            $id=$request->id;
            $user=Instructor::find($id);
            if ($request->hasFile('avatar')){
                $file=$request->avatar;
                $link='upload/instructors/avatar/'.$file->getClientOriginalName();
                $user->avatar=$link;
                $file->move('upload/instructors/avatar',$file->getClientOriginalName());
            }
            if ($request->input('old_password') != '') {
                if (Hash::check($request->input('old_password'), $user->password)) {
                    $validator2 = Validator::make($request->all(), [
                        'new_password' => 'min:6',
                        'confirm_new_password' => 'same:new_password',
                    ]);
                    if (!$validator2->fails()) $user->password = bcrypt($request->input('new_password')); else $check = false;
                } else $check=false;
            }


            $user->name=$request->name;
            $user->work_place=$request->work_place;
            $user->email=$request->email;
            $user->about=$request->about;
            $user->save();

        }
        $total=!$validator->fails() && $check;

        return $total ? redirect()->back()->with('edit.done','Cập nhật thành công') : redirect()->back()->with('edit.failed','Cập nhật không thành công');
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
            ])
            ->first();
        if ($check == 'true') {
            if ($relation != null) {
                $relation->is_active = 1;
                $relation->type=2;
                $relation->save();
            } else {
                $newRelation = new UserToCourse();

                $newRelation->course_id = $course_id;
                $newRelation->user_id = $user_id;
                $newRelation->is_active = 1;
                $newRelation->type=2;
                $newRelation->save();
            }
        } else {

            $relation->is_active = 0;
            $relation->save();
        }
    }
    public function create(Request $request)
    {
           $validator=Validator::make($request->all(),[
               'name'=>'required',
               'username'=>'min:6',
               'password'=>'min:6',
               'confirm_password'=>'same:password'
           ]);
           if (!$validator->fails()){
               $instructor = new Instructor();
               $instructor->name=$request->name;
               $instructor->username=$request->username;
               $instructor->password=Hash::make($request->password);
               $instructor->save();
               return redirect()->back()->with('create.done','Thêm mới thành công');
           }
        return redirect()->back()->with('create.failed','Thêm mới  không thành công');
    }

}
