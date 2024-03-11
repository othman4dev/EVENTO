<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Events;
use App\Http\Controllers\EventsController;

class OrganizatorController extends Controller
{
    public static function myevents()
    {
        $myevents = DB::table('events')
            ->select('events.*', 'categories.*', 'events.id as event_id')
            ->join('categories', 'categories.id', '=', 'events.category_id')
            ->where('events.user_id', session('user')->id)
            ->where('deleted', 0)
            ->get();
        return $myevents;
    }
    public static function addEvent(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'spots' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        Events::create(
            [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'location' => $request->input('location'),
                'image' => '../uploads/'.$imageName,
                'places' => $request->input('spots'),
                'spots' => $request->input('spots'),
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category'),
                'user_id' => session('user')->id,
                'approved' => 0
            ]
        );
        return redirect('/profile');
    }
    public static function editEvent(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'spots' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        Events::where('id', $request->input('id'))->update(
            [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'location' => $request->input('location'),
                'image' => '../uploads/'.$imageName,
                'places' => $request->input('spots'),
                'spots' => $request->input('spots'),
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category'),
                'user_id' => session('user')->id,
                'approved' => 0
            ]
        );
        return redirect('/profile');
    }

    public static function edit($id) {
        $event = DB::table('events')
            ->select('events.*', 'users.*', 'categories.*', 'events.id as event_id')
            ->leftJoin('users', 'users.id', '=', 'events.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'events.category_id')
            ->where('events.id', $id)
            ->first();
        if ($event->user_id != session('user')->id) {
            return redirect('/profile');
        }
        $categories = DB::table('categories')->get();
        return view('organizator.edit', ['event' => $event , 'categories' => $categories]);
    }
    public static function deleteEvent($id) {
        DB::table('events')->where('id', $id)->update(['deleted' => 1]);
        return redirect('/profile');
    }
    public static function reservations() {
        $reservations = DB::table('reservation')
            ->select('events.*', 'reservation.*', 'users.*', 'categories.*', 'reservation.id as reservation_id' ,'events.id as event_id')
            ->leftJoin('events', 'events.id', '=', 'reservation.event_id')
            ->leftJoin('users', 'users.id', '=', 'reservation.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'events.category_id')
            ->where('events.user_id', session('user')->id)
            ->get();
        return view('organizator.reservations', ['reservations' => $reservations]);
    }
    public static function approveReservation($id) {
        DB::table('reservation')->where('id', $id)->update(['status' => 1]);

        return redirect('/reservations');
    }
    public static function rejectReservation($id) {
        DB::table('reservation')->where('id', $id)->update(['status' => 0]);
        return redirect('/reservations');
    }
}
