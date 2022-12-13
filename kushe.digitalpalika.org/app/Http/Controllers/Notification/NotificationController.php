<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if ($request->pin == true) {
                return Notifications::with('user')
                    ->where('notification_to', '=', Auth::user()->id)
                    ->where('notification_pinned', 1)->get();
            }
            return Notifications::with('user')->where('notification_status', '=', 'false')
                ->where('notification_to', '=', Auth::user()->id)
                ->paginate(3);
            // return Notifications::all();
        } else {
            return 'Unauthorized Access!!!! <br> This will be reported to the admin';
        }
    }
    public function update(Request $request)
    {
        if (request()->ajax()) {
            if ($request->read != true) {
                $notification = Notifications::find($request->id);
                // return ($request->pin) ? true:false;
                if ($request->pin == "true") {
                    $notification->notification_pinned = true;
                    $notification->save();
                    // return $notification;
                } else {
                    $notification->notification_pinned = false;
                    $notification->save();
                    // return $notification;
                }
            }
            $notifications = Notifications::where('notification_to', Auth::user()->id)->get();
            foreach ($notifications as $notification) {
                if ($request->read == true) {
                    $notification->notification_status = 1;
                }
                $notification->save();
            }
            return $notification;
        } else {
            return 'Unauthorized Access!!!! <br> This will be reported to the admin';
        }
    }
}
