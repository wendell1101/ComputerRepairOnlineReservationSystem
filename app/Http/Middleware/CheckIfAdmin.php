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
        if(auth()->user()->user_role == 1){
            return $next($request);
        }

        // if USER
        if(auth()->user()->user_role == 0){
            // TEMPORARY REDIRECTION ROUTE FOR USER
            return redirect()->route('home');
        }

        return $next($request);
    }
}
