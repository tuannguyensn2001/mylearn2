<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post=Post::query()
            ->select('posts.*','categories.name as category','writers.name as author')
            ->leftJoin('categories','categories.id','=','posts.category_id')
            ->leftJoin('writers','writers.id','=','posts.writer_id')
            ->where('posts.is_active','=','1')
            ->where('posts.status','=','1')
            ->take(2)
            ->get();
        return view('blog',['post'=>$post]);
    }
    public function details($slug)
    {
        $category=Category::all();
        $post=Post::query()
            ->select('posts.*','categories.name as category','writers.name as author','writers.avatar')
            ->leftJoin('categories','categories.id','=','posts.category_id')
            ->leftJoin('writers','writers.id','=','posts.writer_id')
            ->where('posts.slug','=',$slug)
            ->where('posts.is_active','=',1)
            ->where('posts.status','=','1')
            ->first();
        return view('blog_single',['posts'=>$post,'category'=>$category]);
    }
    public function loadmore(Request $request)
    {
        $post=Post::query()
            ->select('posts.*','categories.name as category','writers.name as author','writers.avatar')
            ->leftJoin('categories','categories.id','=','posts.category_id')
            ->leftJoin('writers','writers.id','=','posts.writer_id')
            ->where('posts.is_active','=',1)
            ->where('posts.status','=','1')
            ->skip($request->count)
            ->take(2)
            ->get();
        $status= $post->count() == 2 ? 1 : 0;
        return response()->json(['post'=>$post,'status'=>$status]);
    }
}
