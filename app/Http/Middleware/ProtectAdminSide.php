<?php

namespace App\Http\Middleware;

use Closure;

class ProtectAdminSide
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
        $roles = collect($request->user()->roles->pluck('name'));
        
        if($roles->contains('user'))
        {
            return redirect('/home');
        }

        return $next($request);
    }
}
