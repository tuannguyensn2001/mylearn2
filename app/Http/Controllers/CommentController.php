<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationData;
use Validator;

class CommentController extends Controller
{
    public function create(Request $request)
    {

      $slug=explode('/',url()->previous())[4];
      $post_id=Post::where('slug','=',$slug)->first()->id;
      $validator=Validator::make($request->all(),[
          'name'=>'required',
          'email'=>'required',
          'comment'=>'required'
      ]);
      if (!$validator->fails()){
          $comment = new Comment();
          $comment->name=$request->input('name');
          $comment->email=$request->input('email');
          $comment->comment=$request->input('comment');
          $comment->post_id=$post_id;

          $check=$comment->save();

      }



      return redirect()->back();

    }
}
