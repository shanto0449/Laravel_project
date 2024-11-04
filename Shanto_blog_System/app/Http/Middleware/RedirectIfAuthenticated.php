<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, $guard, Closure $next): Response
    {
        if(Auth::guard($guard)->check()&&Auth::user()->role->id ==1){
            return redirect(route('admin.dashboard'));
        }elseif(Auth::guard($guard)->check()&&Auth::user()->role->id ==2){
            return redirect(route('author.dashboard'));

        }else{
            return $next($request);

        }



    }
}
