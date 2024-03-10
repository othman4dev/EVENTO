<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;

class PostsController extends Controller
{
    public static function allPosts() {
        if (session('user') == null) {
            $posts = DB::table('events')
            ->select('events.*', 'users.*', 'categories.*', 'reservation.*', 'events.id as event_id', 'reservation.id as reserved')
            ->leftJoin('users', 'users.id', '=', 'events.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'events.category_id')
            ->leftJoin('reservation', function ($join) {
                $join->on('reservation.event_id', '=', 'events.id')
                    ->where('reservation.user_id', '=', 0);
            })
            ->get();
        } else {
            $posts = DB::table('events')
            ->select('events.*', 'users.*', 'categories.*', 'reservation.*', 'events.id as event_id', 'reservation.id as reserved')
            ->leftJoin('users', 'users.id', '=', 'events.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'events.category_id')
            ->leftJoin('reservation', function ($join) {
                $join->on('reservation.event_id', '=', 'events.id')
                    ->where('reservation.user_id', '=', session('user')->id);
            })
            ->get();
        }
        return $posts;
    }

    public static function categories() {
        $categories = DB::table('categories')->get();
        return $categories;
    }
    public static function reserve($id) {
        if (session('user') == null) {
            echo 'login';
            redirect('/login');
        } else {
            $event = DB::table('reservation')->where('event_id', $id)->where('user_id', session('user')->id)->first();
            if ($event) {
                echo 'You have already reserved this event';
            } else {
            $reservation = DB::table('reservation')->insert([
                'event_id' => $id,
                'user_id' => session('user')->id
            ]);
            $places = DB::table('events')->where('id', $id)->value('spots');

            DB::table('events')->where('id', $id)->update([
                'spots' => $places - 1
            ]);
            echo "Reserved";
            }
        }
    }
    public static function cancel($id) {
        $event = DB::table('reservation')->where('event_id', $id)->where('user_id', session('user')->id)->first();
        if ($event) {
            DB::table('reservation')->where('event_id', $id)->where('user_id', session('user')->id)->delete();
            $places = DB::table('events')->where('id', $id)->value('spots');
            DB::table('events')->where('id', $id)->update([
                'spots' => $places + 1
            ]);
            echo "Canceled";
        } else {
            echo 'You have not reserved this event';
        }
    }
    public static function delete($id) {
        DB::table('events')->where('id', $id)->delete();
        return redirect('/events');
    }
    public static function approve($id) {
        DB::table('events')->where('id', $id)->update([
            'approved' => 1
        ]);
        return redirect('/events');
    }
    public static function reject($id) {
        DB::table('events')->where('id', $id)->update([
            'approved' => 0
        ]);
        return redirect('/events');
    }
    public static function event($id) {
        $event = DB::table('events')
            ->select('events.*', 'users.*', 'categories.*', 'reservation.*', 'events.id as event_id', 'reservation.id as reserved')
            ->leftJoin('users', 'users.id', '=', 'events.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'events.category_id')
            ->leftJoin('reservation', function ($join) {
                $join->on('reservation.event_id', '=', 'events.id')
                    ->where('reservation.user_id', '=', 0);
            })
            ->where('events.id', $id)
            ->first();
        return view('user.event', ['event' => $event]);
    }
    public static function addEvent(Request $request) {
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        $places = $request->input('spots');
        $date = $request->input('date');
        $time = $request->input('time');
        $price = $request->input('price');
        $category = $request->input('category');
        $user = session('user')->id;
        DB::table('events')->insert([
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'image' => '../uploads/'.$imageName,
            'places' => $places,
            'spots' => $places,
            'date' => $date,
            'time' => $time,
            'price' => $price,
            'category_id' => $category,
            'user_id' => $user
        ]);
        return redirect('/add');
    }
    public static function search($search) {
        $posts = DB::table('events')
            ->select('events.*', 'users.*', 'categories.*', 'reservation.*', 'events.id as event_id', 'reservation.id as reserved')
            ->leftJoin('users', 'users.id', '=', 'events.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'events.category_id')
            ->leftJoin('reservation', function ($join) {
                $join->on('reservation.event_id', '=', 'events.id')
                    ->where('reservation.user_id', '=', 0);
            })
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%')
                      ->orWhere('description', 'like', '%'.$search.'%');
            })
            ->get();
        $result = "";
        foreach ($posts as $post) {
            $result = $result ."
            <div class='result'>
                <div class='col-1-res'>
                    <div class='result-image'>
                        <div class='img-result' style='background-image: url()'></div>
                    </div>
                    <div class='result-texts'>
                        <h3 class='result-title'>".$post->title."</h3>
                        <p class='result-description'>".substr($post->description, 0, 20)."</p>
                    </div>
                </div>
                <div class='link-to-post' onclick=\"window.location.href = '/event/".$post->event_id."'\">
                    <i class='bi bi-arrow-right-circle-fill'></i>
                </div>
            </div>
            ";
        }
        
        echo $result;
    }
}