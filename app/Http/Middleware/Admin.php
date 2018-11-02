<?php

namespace App\Http\Middleware;

use Closure;
use illuminate\support\facades\Auth;
use Illuminate\Http\Request;
use App\User;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
		if(Auth::guard($guard)->check()){
			if(!Auth::user()->isAdmin()){
				  return redirect('/');
				}
		}
        return $next($request); 
    }
	

}
