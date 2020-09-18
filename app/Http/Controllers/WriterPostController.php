<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Validator;
use const http\Client\Curl\AUTH_ANY;

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
    public function index()
    {
        $post=Post::query()
            ->select("posts.*","categories.name as category")
            ->leftJoin("categories",'categories.id','=','posts.category_id')
            ->where('posts.writer_id','=',Auth::guard('writer')->user()->id)

            ->get();

        return view('Writer.post.list',['posts'=>$post]);
    }
    public function details($slug)
    {
        $post = Post::query()
            ->select('posts.*','categories.name as category','writers.name')
            ->leftJoin('categories','categories.id','=','posts.category_id')
            ->leftJoin('writers','writers.id','=','writer_id')
            ->where('posts.slug','=',$slug)
            ->first();
        return view('Writer.post.post_details',['post'=>$post]);
    }
    public function editView($id)
    {
        $post=Post::find($id);
        return view('Writer.post.edit',['post'=>$post]);
    }
    public function edit(Request $request)
    {
        $id=explode('/',url()->previous())[6];
        $post=Post::find($id);
        $post->title=$request->title;
        $post->description=$request->description;
        $post->content=$request->input('content');
        $post->category_id=$request->category_id;
        $post->is_active=$request->is_active;
        $post->slug=Str::slug($request->title,'-');
        $post->save();
        return redirect()->route('writer.show.post');
    }

}
