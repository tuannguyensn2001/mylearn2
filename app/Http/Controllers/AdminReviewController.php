<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function unchecked()
    {
        $unchecked=Review::query()
            ->select('reviews.*','courses.name as category')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->where('status','=','-1')
            ->get();

        return view('Admin.reviews.listReviewUnchecked',[
            'reviews'=>$unchecked
        ]);
    }
    public function setCheck($id)
    {
        if (is_numeric($id)){
            $review = Review::find($id);
            $review->status=1;
            $review->save();
        }
        return redirect()->back();
    }
    public function setUnCheck($id)
    {
        if (is_numeric($id)){
            $review = Review::find($id);
            $review->status=0;
            $review->save();
        }
        return redirect()->back();
    }
    public function index()
    {
        $checked=Review::query()
            ->select('reviews.*','courses.name as category')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->where('status','=','1')
            ->get();

        return view('Admin.reviews.listReviewChecked',[
            'reviews'=>$checked
        ]);
    }
    public function reject()
    {
        $checked=Review::query()
            ->select('reviews.*','courses.name as category')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->where('status','=','0')
            ->get();

        return view('Admin.reviews.listReviewRejected',[
            'reviews'=>$checked
        ]);
    }
}


