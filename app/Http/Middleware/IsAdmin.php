<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::id()) {
            return Redirect::to('index');
        }
        else if (Auth::user()->user_status == 'admin') {
            return $next($request);
            }else{
            return Redirect::to('profile');
        }
    }
}
