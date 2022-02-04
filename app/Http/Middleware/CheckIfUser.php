<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfUser
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
        // if USER
        if(auth()->user()->user_role == 0){
            return $next($request);
        }

        // if ADMIN
        if(auth()->user()->user_role == 1){
            return redirect()->route('admin.dashboard');
        }
        
    }
}
