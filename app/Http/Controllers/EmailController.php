<?php
namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use App\Mail\TicketEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EventsController;

class EmailController extends Controller
{
    public static function sendMail($receiver,$name,$token) {
        session(['token' => $token]);
        Mail::to($receiver)->send(new VerifyEmail());
    }
    public static function sendTicket($id) {
        $event = EventsController::getEvent($id);
        session(['event' => $event]);
        $receiver = session('user')->email;
        Mail::to($receiver)->send(new TicketEmail());
        return redirect('/myreservations');
    }
}


