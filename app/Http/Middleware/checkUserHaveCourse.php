<?php

namespace App\Http\Middleware;

use App\UserToCourse;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Middleware\StartSession;
class checkUserHaveCourse
{
    public function  __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $course_id=$request->course_id;
        $user_id=Auth::user()->id;
        $relation = UserToCourse::query()
            ->where([
                ['course_id', '=', $course_id],
                ['user_id', '=', $user_id],
                ['is_active','=',1],
                ['type','=','1']
            ])
            ->first();
        return $relation == null ? response('',401) : $next($request);

    }
}
