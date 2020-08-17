<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function showLesson($slug)
    {
        $lesson=Lesson::query()
            ->where('slug','=',$slug)
            ->first();
        return $lesson->video;
    }
}
