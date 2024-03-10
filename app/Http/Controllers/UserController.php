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
}
