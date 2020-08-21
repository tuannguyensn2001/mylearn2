<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Request $request)
    {
        return Auth::user();
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


           $user->name=$request->name;
           $user->work_place=$request->work_place;
           $user->email=$request->email;
           $user->about=$request->about;
           $user->save();

       }
       $total=!$validator->fails() && $check;

       return $total ? redirect()->back()->with('edit.done','Cập nhật thành công') : redirect()->back()->with('edit.failed','Cập nhật không thành công');
    }
}
