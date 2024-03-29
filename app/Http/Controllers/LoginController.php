<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EmailController;
use App\Models\Events;


class LoginController extends Controller
{
    public static function index($message) {
        return view('login', ['message' => $message]);
    }
    public static function login(Request $request){
        $username = $request->input('email');
        $password = $request->input('password');
        $user = DB::table('users')->where('email', $username)->first();
        $name = $user->firstname . ' ' . $user->lastname;
        if ($user && password_verify($password , $user->password) && $user->email_verified_at != null) {
            session(['user' => $user]);
            return redirect('/');
        } else if ( $user && $user->email_verified_at == null) {
            $token = rand(1000, 9999);
            session()->forget('token');
            session(['token' => $token]);
            session(['email' => $username]);
            EmailController::sendMail($username,session('token'));
            return redirect('/verify');
        } else {
            return redirect('/login?login')->with('message', 'Invalid username or password');
        }
    }
    public static function register(Request $request) {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $name = $firstname . ' ' . $lastname;
        $email = $request->input('email');
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');
        if ($pass1 != $pass2) {
            return redirect('/login?register')->with('message2', 'Passwords do not match');
        }
        if (strlen($pass1) < 8) {
            return redirect('/login?register')->with('message2', 'Password must be at least 8 characters');
        }
        $password = password_hash($request->input('pass1'), PASSWORD_DEFAULT);
        $user = DB::table('users')->where('email', $email)->first();
        if ($user) {
            return redirect('/login?register')->with('message2', 'Email already exists , please login or use another email address');
        } else {
            $token = rand(1000, 9999);
            session()->forget('token');
            session(['token' => $token]);
            session(['email' => $email]);
            DB::table('users')->insert(['firstname' => $firstname , 'lastname' => $lastname ,'email' => $email, 'password' => $password]);
            EmailController::sendMail($email, session('token'));
            return redirect('/verify');
        }
    }
    public static function logout() {
        session()->flush();
        return redirect('/login');
    }
    public static function verifyCode(Request $request) {
        if ($request->input('code') == session('token')) {
            session()->forget('token');
            $user = DB::table('users')->where('email', session('email'))->first();
            if ($user) {
                DB::table('users')->where('email', session('email'))->update(['email_verified_at' => date('Y-m-d H:i:s')]);
                session(['user' => $user]);
                return redirect('/');
            }
        } else {
            return redirect('/verify')->with('message', 'Invalid verification code');
        }
    }

    public static function sendForgot(Request $request) {
        $email = $request->input('email');
        $user = DB::table('users')->where('email', $email)->first();
        if ($user) {
            $token = rand(1000, 9999);
            session()->forget('token');
            session(['token' => $token]);
            session(['email' => $email]);
            EmailController::sendForgot($email);
            return redirect('/forgot?register');
        } else {
            return redirect('/forgot')->with('message', 'Email does not exist');
        }
    }
    public static function verifyForgot(Request $request) {
        if ($request->input('code') == session('token')) {
            session()->forget('token');
            return redirect('/newPassword');
        } else {
            return redirect('/forgot?register')->with('message', 'Invalid verification code');
        }
    }
    public static function changePassword(Request $request) {
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');
        if ($pass1 != $pass2) {
            return redirect('/newPassword')->with('message', 'Passwords do not match');
        }
        if (strlen($pass1) < 8) {
            return redirect('/newPassword')->with('message', 'Password must be at least 8 characters');
        }
        $password = password_hash($request->input('pass1'), PASSWORD_DEFAULT);
        DB::table('users')->where('email', session('email'))->update(['password' => $password]);
        return redirect('/login');
    }
}
