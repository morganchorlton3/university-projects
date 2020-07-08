<?php

namespace App\Http\Middleware;

use App\Company;
use Closure;

class CompanyRequest
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
        if (Job::where('userID', Auth::id())->first() != null) {
            return $next($request);
        }
        if(Company::where('ownerUID', Auth::id())->first() != null){
            return redirect('/')->with('info', 'Please allow our team to approve your company request, you will recive an email shortly on what to do next, Thanks for being patience');
        }

        return redirect('/job/create')->with('toast_error', 'Please add your job before going to your dashboard');
    }
}
