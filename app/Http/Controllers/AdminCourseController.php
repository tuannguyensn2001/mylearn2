<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Support\Str;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;
use App\User;


class AdminCourseController extends Controller
{
    private $course,$category;
    public function __construct()
    {

        $this->course=Course::query()
            ->leftJoin('categories','categories.id','=','courses.category_id')
            ->get(['courses.*','categories.name as category']);
        $this->category=Category::all();
    }

    public function viewCourse()
    {


        return view('Admin/course/viewCourse',['course'=>$this->course,'category'=>$this->category]);
    }
    public function addCourse()
    {
        return view('Admin/course/addCourse',['category'=>$this->category]);
    }


    public function create(Request $request)
    {



       $validator=Validator::make($request->all(),[
           'name'=>'bail|required',
           'thumbnail'=>'bail|file',
           'description'=>'bail|required',
           'category_id'=>'bail|numeric',
           'status_id'=>'bail|numeric',
       ]);
       if ($validator->fails()){

            return redirect()->back()->withErrors($validator);
       } else{
           if ($request->hasFile('thumbnail'))




               $name=$request->input('name');
                $description=$request->input('description');
               $file=$request->thumbnail;
               $category_id=$request->category_id;




               $course = new Course();
               $course->status_id=$request->status_id;
               $course->name=$name;
               $course->description=$description;
               $course->thumbnail='upload/course/'.$file->getClientOriginalName();
               $course->category_id=$category_id;
               $course->slug=Str::slug($name,'-');
               $course->save();
               $file->move('upload/course',$file->getClientOriginalName());


           }
       return redirect()->route('addCourse');
       }


       public function show(Request $request)
       {
           $id=$request->id;
           $currentCourse=Course::find($id);
           return response()->json(['course'=>$currentCourse]);
       }


       public function edit(Request $request)
       {
           $validator=Validator::make($request->all(),[
               'name'=>'bail|required',
               'description'=>'bail|required',
               'category_id'=>'bail|numeric',
               'status_id'=>'bail|numeric',
           ]);
           if (!$validator->fails()){


//
                    $id=$request->input('id');
                    $course=Course::find($id);

                    $name=$request->input('name');
                    $description=$request->input('description');
                    if ($request->hasFile('thumbnail')){
                        $file=$request->thumbnail;
                        $course->thumbnail='upload/course/'.$file->getClientOriginalName();
                        $file->move('upload/course',$file->getClientOriginalName());
                    }
                    $category_id=$request->category_id;
                    $course->status_id=$request->status_id;
                    $course->name=$name;
                    $course->description=$description;
                    $course->slug=Str::slug($name,'-');
                    $course->category_id=$category_id;
                    $course->save();

           }
           return redirect()->route('viewCourse');
       }


}
