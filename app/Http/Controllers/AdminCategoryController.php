<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Support\Str;
use Validator;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{

    private $category;
    public function __construct()
    {
        $this->category=Category::all();
    }

    public function index()
    {
        return view('Admin/category/listCategory',['category'=>$this->category]);
    }


    public function create(Request $request)
    {



        $validator=Validator::make($request->all(),[
            'name'=>'required'
        ]);
        if (!$validator->fails()){
            $category = new Category();
            $category->name=$request->input('name');
            if ($request->hasFile('thumbnail')){
                $file=$request->thumbnail;
                $thumbnail='upload/category/'.$file->getClientOriginalName();
                $category->thumbnail=$thumbnail;
                $file->move('upload/category',$file->getClientOriginalName());
            }
            $category->slug=Str::slug($category->name,'-');
            $category->save();
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *

     */
    public function show(Request $request)
    {
        $category=Category::find($request->id);
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category=Category::find($request->id);
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'id'=>'numeric'
        ]);
        if (!$validator->fails()){
            $category=Category::find($request->id);
            $category->name=$request->name;
            if ($request->hasFile('thumbnail')){
                $file=$request->thumbnail;
                $thumbnail='upload/category/'.$file->getClientOriginalName();
                $category->thumbnail=$thumbnail;
                $file->move('upload/category',$file->getClientOriginalName());
            }
            $category->save();
        }
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
