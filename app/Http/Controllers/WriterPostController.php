<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Validator;
class WriterPostController extends Controller
{
    public function __construct()
    {
        View::share('category',Category::all());
    }

    public function add()
    {
        return view('Writer.post.create');
    }

    public function create(Request $request)
    {


    $validator=Validator::make($request->all(),[
        'title'=>'required',
        'description'=>'required',
        'content'=>'required',
        'category_id'=>'numeric'
    ]);

    if (!$validator->fails()){
            $post = new Post();
            $post->title=$request->title;
            $post->description=$request->description;
            $post->content=$request->input('content');
            $post->category_id=$request->category_id;
            $post->writer_id=Auth::guard('writer')->user()->id;
            $post->is_active=$request->is_active;
            $post->slug=Str::slug($request->title,'-');
            $post->status=-1;
            if ($request->hasFile('thumbnail')){
                $file=$request->thumbnail;
                $thumbnail='upload/post/'.$file->getClientOriginalName();
                $post->thumbnail=$thumbnail;
                $file->move('upload/post',$file->getClientOriginalName());
            }
           $post->save();
            return redirect()->back();
    }

    }

}
