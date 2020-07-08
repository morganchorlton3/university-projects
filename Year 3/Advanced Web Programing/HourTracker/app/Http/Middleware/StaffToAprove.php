<?php

namespace App\Http\Middleware;

use Closure;

class StaffToAprove
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
        if(Auth::user()->company != null){
            return route('/')->with('error', 'Please wait for a manager to apporve your register request.');
        }else{
            return $next($request);
        }
    }
}
