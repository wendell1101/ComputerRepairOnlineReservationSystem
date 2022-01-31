<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserStatus
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
        if(auth()->user()->status == 0){
            $user = auth()->user();
            auth()->logout();
            return redirect()->route('login')->with('error', 'The account ' . $user->email. ' is deactivated. Please contact the admin to reactivate.');
        }else{
            return $next($request);
        }


    }
}
