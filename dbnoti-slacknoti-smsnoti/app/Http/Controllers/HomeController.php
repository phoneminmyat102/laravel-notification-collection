<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SMSNotification;
use App\Notifications\UserFollowNotification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function notifyFollowNotification() {

        $user = User::where('id', 1)->first();

        auth()->user()->notify(new UserFollowNotification($user));
        dd("DONE");
    }

    public function makeAsRead($id) {
        if($id) {
            auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        }
        return back();
    }

    public function smsNotification() {
        auth()->user()->notify(new SMSNotification());
        return redirect('dashboard');
    }
}
