<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mailgun\Mailgun;

class EmailController extends Controller
{
    public static function sendMail($receiver,$name,$token) {
        $mgClient = Mailgun::create('ae6b647743a5ff301714082883e63adb-2c441066-fa8e9da6');
        $domain = "fakesocials.tech";
        $result = $mgClient->messages()->send($domain, [
            'from'	=> 'EVENTO <mailgun@fakesocials.tech>',
            'to'	=> $receiver,
            'subject' => 'Verify your email address',
            'text' => " Hi $name, <br> Your verification code is: $token. Please enter this code to verify your email address. If you did not request this code, please ignore this email. Thank you."
        ]);
    }
}


