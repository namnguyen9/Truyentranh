<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminRightMiddleware
{
    /**
   na  * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $id = Auth::id();
            if($id == 1 && $user->name =='admin')
            {
                return $next($request);
            }
        }
       return Redirect::to('login');
    }
}
