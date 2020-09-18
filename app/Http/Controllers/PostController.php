<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Validator;
class PostController extends Controller
{
    public function __construct()
    {
        $this->getCategory();
    }

    public function index(Request $request)
    {


        if ($request->query('category')) {
            $post=$this->getCategoryPost($request->query('category'));
            return view('blog_filter',['post'=>$post]);
        }

            $post = Post::query()
                ->select('posts.*', 'categories.name as category', 'writers.name as author')
                ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
                ->leftJoin('writers', 'writers.id', '=', 'posts.writer_id')
                ->where('posts.is_active', '=', '1')
                ->where('posts.status', '=', '1')
                ->take(2)
                ->get();

            return view('blog', ['post' => $post]);

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

        $relatedPost=$this->relatedPost($post->category_id,$post->id);





        return view('blog_single',[
            'posts'=>$post,
            'category'=>$category,
            'relatedPost'=>$relatedPost,
            'comment'=>$this->getComment($post->id)
        ]);
    }
    public function loadmore(Request $request)
    {
        if ($request->category_slug) $post=$this->loadMoreCategory($request->category_slug,$request->count);
        else {


            $post = Post::query()
                ->select('posts.*', 'categories.name as category', 'writers.name as author', 'writers.avatar')
                ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
                ->leftJoin('writers', 'writers.id', '=', 'posts.writer_id')
                ->where('posts.is_active', '=', 1)
                ->where('posts.status', '=', '1')
                ->skip($request->count)
                ->take(2)
                ->get();
        }
        $status= $post->count() == 2 ? 1 : 0;
        return response()->json(['post'=>$post,'status'=>$status]);
    }
    public function relatedPost($category_id,$post_id)
    {


        $random = Post::all()->count() == 3 ? 2 : 0;
        $post=Post::query()
            ->select('posts.*','categories.name as category')
            ->leftJoin('categories','categories.id','=','posts.category_id')
            ->where('posts.is_active','=',1)
            ->where('posts.status','=','1')
            ->where('posts.category_id','=',$category_id)
            ->where('posts.id','!=',$post_id)
            ->get()
            ->random($random);
        return $post ;
    }
    public function getCategory()
    {
        $category=Category::all();
        View::share('category',$category);
    }
    public function createComment(Request $request)
    {
        echo $request->url();


        die;
       $validator=Validator::make($request->all(),[
           'name'=>'required',
           'email'=>'required',
           'content'=>'required',
       ]);
       if (!$validator->fails()){
           $comment = new Comment();
           $comment->name=$request->name;
           $comment->email=$request->email;
           $comment->comment=$request->comment;
       }
    }
    public function getCategoryPost($slug)
    {
       $category_id=Category::where('slug','=',$slug)->first()->id;

        $post = Post::query()
            ->select('posts.*', 'categories.name as category', 'writers.name as author')
            ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
            ->leftJoin('writers', 'writers.id', '=', 'posts.writer_id')
            ->where('posts.is_active', '=', '1')
            ->where('posts.status', '=', '1')
            ->where('posts.category_id','=',$category_id)
            ->take(2)
            ->get();


        return $post;

    }
    public function loadMoreCategory($slug,$count)
    {
        $category_id=Category::where('slug','=',$slug)->first()->id;

        $post=Post::query()
            ->select('posts.*','categories.name as category','writers.name as author','writers.avatar')
            ->leftJoin('categories','categories.id','=','posts.category_id')
            ->leftJoin('writers','writers.id','=','posts.writer_id')
            ->where('posts.is_active','=',1)
            ->where('posts.status','=','1')
            ->where('posts.category_id','=',$category_id)
            ->skip($count)
            ->take(2)
            ->get();
        return $post;
    }
    public function getComment($post_id)
    {
        $comments= Comment::where('post_id','=',$post_id)->get();
        return $comments;
    }
}
