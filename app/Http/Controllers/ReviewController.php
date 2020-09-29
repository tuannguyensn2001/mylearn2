<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
            $validator=Validator::make($request->all(),[
                'course_id'=>'numeric',
                'review'=>'required'
            ]);




            if (!$validator->fails()){
                $review = new Review();
                $review->user_id=Auth::user()->id;
                $review->course_id=$request->course_id;
                $review->reviews=$request->review;
                $review->status=-1;
                $review->save();
                return response()->json(['message'=>'Bình luận của bạn đang chờ được phê duyệt'],200);
            }


        return response()->json(['message'=>'Bình luận của bạn không hợp lệ'],403);




    }
}
