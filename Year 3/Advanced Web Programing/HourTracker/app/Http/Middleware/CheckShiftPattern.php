<?php

namespace App\Http\Middleware;

use App\Company;
use App\ShiftPattern;
use Auth;
use Closure;

class CheckShiftPattern
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
        if(Company::where('ownerUID', Auth::id())->first() != null){
            return $next($request);
        }else if (ShiftPattern::where('userID', Auth::id())->first() == null) {
            return redirect('/shift-pattern')->with('toast_error', 'Please add your Shift Pattern before going to your dashboard');
        }else{
            return $next($request);  
        }
        
    }
}
