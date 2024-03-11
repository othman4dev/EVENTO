<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public static function profile() {
        if (session('user') == null) {
            redirect('/login');
        }
        $user = DB::table('users')->where('id', session('user')->id )->first();
        return view('profile', ['user' => $user]);
    }
    public static function myreservations() {
        if (session('user') == null) {
            redirect('/login');
        }
        $reservations = DB::table('reservation')
            ->select('events.*', 'reservation.*', 'users.*', 'categories.*', 'events.id as event_id')
            ->leftJoin('events', 'events.id', '=', 'reservation.event_id')
            ->leftJoin('users', 'users.id', '=', 'events.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'events.category_id')
            ->where('reservation.user_id', session('user')->id)
            ->get();
        return view('user.myreservations', ['reservations' => $reservations]);
    }
}
