<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    //
    public function unchecked()
    {
        $posts=Post::query()
            ->select("posts.*","categories.name as category",'writers.name')
            ->leftJoin("categories",'categories.id','=','posts.category_id')
            ->leftJoin('writers','writers.id','=','writer_id')
            ->where('posts.status','=','-1')
            ->get();

        return view('Admin.post.listPostUnchecked',[
            'posts'=>$posts
        ]);
    }
    public function details($slug)
    {
        $post = Post::query()
            ->select('posts.*','categories.name as category','writers.name')
            ->leftJoin('categories','categories.id','=','posts.category_id')
            ->leftJoin('writers','writers.id','=','writer_id')
            ->where('posts.slug','=',$slug)
            ->first();
       return view('Admin.post.post_details',['post'=>$post]);
    }
    public function setCheck($id)
    {

        if (is_numeric($id)){
            $review = Post::find($id);



            $review->status=1;
            $review->save();
            return redirect()->back()->with('check.done','Phê duyệt thành công');
        }
        return redirect()->back()->with('check.failed','Phê duyệt không thành công');
    }
    public function setUnCheck($id)
    {
        if (is_numeric($id)){
            $review = Post::find($id);
            $review->status=0;
            $review->save();
        }
        return redirect()->back();
    }
    public function index()
    {
        $posts=Post::query()
            ->select("posts.*","categories.name as category",'writers.name')
            ->leftJoin("categories",'categories.id','=','posts.category_id')
            ->leftJoin('writers','writers.id','=','writer_id')
            ->where('posts.status','=','1')
            ->get();
        return view('Admin.post.listPostChecked',[
            'posts'=>$posts
        ]);
    }
    public function View($id)
    {
        if (is_numeric($id)){
            $review = Post::find($id);
            $review->is_active=1;
            $review->save();
        }
        return redirect()->back();
    }
    public function UnView($id)
    {
        if (is_numeric($id)){
            $review = Post::find($id);
            $review->is_active=0;
            $review->save();
        }
        return redirect()->back();
    }
}
