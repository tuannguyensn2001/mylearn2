<?php

namespace App\Http\Controllers;
use App\Course;
use App\User;
use App\UserToCourse;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Request $request)
    {
        return response()->json(['auth'=>Auth::user(),'course'=>$this->getAuthCourse()]);
    }
    public function getAuthCourse()
    {
        $id=Auth::user()->id;
        $course=Course::query()
            ->select('courses.*')
            ->leftJoin('usertocourse','usertocourse.course_id','=','courses.id')
            ->where('usertocourse.user_id','=',$id)
            ->where('usertocourse.type','=',1)
            ->where('usertocourse.is_active','=',1)
            ->get();
        return $course;
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
           $user=User::find($id);
           if ($request->hasFile('avatar')){
               $file=$request->avatar;
               $link='upload/users/avatar/'.$file->getClientOriginalName();
               $user->avatar=$link;
               $file->move('upload/users/avatar',$file->getClientOriginalName());
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


//           $request->has('coin') ? $user->coin=$request->coin : null;
           if ($request->has('coin')){

               $this->newTransaction($request->coin,$user);
               $user->coin=$request->coin;
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

    public function newTransaction($coin,$user)
    {

        $id=$user->id;
        $notes="";
        if ($user->coin < $coin) $notes="Admin set +";
        else if ($user->coin > $coin) $notes="Admin set -";
        if ($user->coin != $coin){
            $transaction = new UserToCourse();
            $transaction->user_id=$id;
            $transaction->is_active=1;

            $transaction->type=1;
            $transaction->notes=$notes;
            $transaction->coin= abs($coin-$user->coin);
            $transaction->save();
        }
    }
}
