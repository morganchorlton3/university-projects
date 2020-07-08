<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.account')->with('user', Auth::user());
    }

    public function updateDetails(Request $request){
        $user = User::find($request->id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->notificationPref = $request->notificationPreferances;
        $user->save();
        return back()->with('toast_success', 'User Details Updated');

    }
}
