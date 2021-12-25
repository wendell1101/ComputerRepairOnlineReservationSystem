<?php

namespace App\Http\Middleware;

use App\ProductCategory;
use Closure;

class CheckIfHasCategory
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
        $categories = ProductCategory::all();
        if(!$categories->count > 0){
            return redirect()->back()->with('error','You must have a category to create a product');
        }

        return $next($request);
    }
}
