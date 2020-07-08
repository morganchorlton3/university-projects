<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Job;
use App\Company;

class CheckJob
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
       if(Company::where('ownerUID', Auth::id())->where('status', 1)->first() != null){
            return redirect('/')->with('info', 'Please allow our team to approve your company request, you will recive an email shortly on what to do next, Thanks for being patience');
        }else if(Company::where('ownerUID', Auth::id())->where('status', 2)->first() != null){
            //If user has registerd to join company
            return $next($request);
        }else if (Job::where('userID', Auth::id())->first() == null) {
            return redirect('/job/create')->with('toast_error', 'Please add your job before going to your dashboard');
        }else{
            return $next($request);
        }
    }
}
