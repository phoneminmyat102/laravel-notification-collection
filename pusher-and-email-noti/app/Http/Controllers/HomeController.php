<?php

namespace App\Http\Controllers;

use App\Events\UserCreatedEvent;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function userRegister() {
        return view('userRegister');
    }

    public function pusherNoti() {     
        $name = request('name');
        event(new UserCreatedEvent($name));
    }

    public function notifyEmail() {
        $users = User::get();

        $post = [
            'title' => 'You Can Do Everything!',
            'slug' => 'post-slug',
            'author' => 'sayar gyi'
        ];
        foreach ($users as $user) {
            Notification::send($user, new EmailNotification($post));
        }
        dd("DONE");
    }
}
