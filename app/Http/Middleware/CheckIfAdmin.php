<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAdmin
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
        // if ADMIN
        if(!auth()->user()->is_admin){
            return redirect()->route('home')->with('success', 'You must be an administrator to access this page');
        }
        return $next($request);
    }
}
