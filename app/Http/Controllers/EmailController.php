<?php
namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public static function sendMail($receiver,$name,$token) {
        session(['token' => $token]);
        Mail::to($receiver)->send(new VerifyEmail());
    }
}


