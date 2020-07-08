<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Auth;

class NotificationController extends Controller
{

    public function read($id)
    {
        Auth::user()->unreadNotifications->markAsRead();
        $notification = Auth::user()->notifications()->find($id);
        //$notification->markAsRead();
        if($notification->type = 'App\Notifications\ConfirmCompany'){
            return redirect()->route('admin.company.index');
        }

        
    }

}
