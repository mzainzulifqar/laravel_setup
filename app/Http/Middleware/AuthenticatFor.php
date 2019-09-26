<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticatFor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
        if(!$request->user()->can($permission))
        {
            abort(403);
        }
        else
        {
            return $next($request);
           
        }
    }
}
