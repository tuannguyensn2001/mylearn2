<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class AdminWriterController extends Controller
{
    public function index()
    {

        $writer=Writer::all();
        return view('Admin.writer.listWriter',[
            'writer'=>$writer
        ]);
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
            $instructor = new Writer();
            $instructor->name=$request->name;
            $instructor->username=$request->username;
            $instructor->avatar='upload/users/avatar/default.png';
            $instructor->password=Hash::make($request->password);
            $instructor->save();
            return redirect()->back()->with('create.done','Thêm mới thành công');
        }
        return redirect()->back()->with('create.failed','Thêm mới  không thành công');
    }
    public function show(Request $request)
    {
        $id=$request->id;
        return Writer::find($id);
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
            $user=Writer::find($id);
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
}
