<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;

class EmployeeNotificationController extends Controller
{
    public function __construct()
    {
//        $this->middleware(["auth:api"]);
    }

    public function getUnreadNotifications(){
        $user = Auth::user();
        // dd($user);
        $unreadNotifications = $user->unreadNotifications;
        return $this->customsuccessResponseWithPayload($unreadNotifications);
    }

    public function readNotification($id){
        $user = Auth::user();
        // dd($user);
        $notification = $user->notifications()->where('notifications.id',$id)->first();
        $notification->markAsRead();
        return $this->customsuccessResponseWithPayload(['message'=>'operation successful']);


    }
}
