<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\EmailController;

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
            ->select('events.*', 'reservation.*', 'users.*', 'categories.*', 'reservation.id as reservation_id' ,'events.id as event_id')
            ->leftJoin('events', 'events.id', '=', 'reservation.event_id')
            ->leftJoin('users', 'users.id', '=', 'events.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'events.category_id')
            ->where('reservation.user_id', session('user')->id)
            ->get();
        return view('user.myreservations', ['reservations' => $reservations]);
    }
    public static function sendTicket($id) {
        $reservation = DB::table('reservation')->where('id', $id)->first();
        $event_id = $reservation->event_id;
        $event = DB::table('events')->where('id', $event_id)->first();
        $title = $event->title;
        $date = $event->date;
        $time = $event->time;
        $location = $event->location;
        $token = $reservation->token;
        session(['event_title' => $title]);
        session(['event_date' => $date]);
        session(['event_time' => $time]);
        session(['event_location' => $location]);
        session(['event_token' => $token]);
        $receiver = session('user')->email;
        EmailController::sendTicket($receiver);
        return redirect('/myReservations');
    }
}
