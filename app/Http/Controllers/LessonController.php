<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\UserToCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function showLesson($slug,Request $request)
    {




        $lesson=Lesson::query()
            ->where('slug','=',$slug)
            ->first();
        return $lesson->video;
    }

}
