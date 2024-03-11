<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizatorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = EventsController::allPosts();
    if (session('user')->role == 'Admin') {
        return redirect('/stats');
    } else if (session('user')->role == 'User') {
        return view('user.index', ['posts' => $posts]);
    } else if (session('user')->role == 'Organizator') {
        return redirect('/myevents');
    } else {
        return view('user.index', ['posts' => $posts]);
    }
});
Route::get('/login', function () {
    if (session('user') != null) {
        return redirect('/');
    }
    return view('login');
});
Route::get('/category', function () {
    if (session('user') == null) {
        return redirect('/login');
    } else if (session('user')->role == 'User') {
        return view('404');
    } else if (session('user')->role == 'Admin') {
        return view('admin.category');
    }
});
Route::post('/log', [LoginController::class, 'login']);

Route::post('/register', [LoginController::class, 'register']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/verify', function () {
    return view('verify');
});

Route::get('/forgot', function () {
    return view('forgot');
}); 

Route::post('/sendMail', [EmailController::class, 'sendMail']);

Route::post('/sendVerification', [LoginController::class, 'verifyCode']);

Route::post('/verifyCode', [LoginController::class, 'verifyCode']);

Route::get('/reserve/{id}', [EventsController::class, 'reserve'])->name('reserve');

Route::get('/cancel/{id}', [EventsController::class, 'cancel'])->name('cancel');

Route::get('/evento' , function () {
    if (session('user') == null) {
        return redirect('/login');
    }
    return view('organizer.evento');
});

Route::get('/events' , 
function () {
    $posts = EventsController::allPosts();
    if (session('user') == null) {
        return redirect('/login');
    } else if (session('user')->role == 'User') {
        return view('user.events', ['posts' => $posts]);
    } else if (session('user')->role == 'Admin') {
        $posts = AdminController::events();
        return view('admin.events', ['posts' => $posts]);
    }
});

Route::get('/events/delete/{id}', [EventsController::class, 'delete'])->name('delete');

Route::get('/events/approve/{id}', [EventsController::class, 'approve'])->name('approve');

Route::get('/events/reject/{id}', [EventsController::class, 'reject'])->name('reject');

Route::get('/getEvent/{id}', [EventsController::class, 'getEvent'])->name('event');

Route::get('/event' , [EventsController::class , 'event']);

Route::get('/add', function () {
    $categories = EventsController::categories();
    return view('organizer.add', [ 'categories' => $categories]);
});

Route::post('/addEvent', [OrganizatorController::class, 'addEvent']);

Route::get('/search/{search}', [EventsController::class, 'search'])->name('search');

Route::get('/users' ,[AdminController::class, 'users']);

Route::get('/categories' ,[AdminController::class , 'categories']);

Route::get('/profile' , function (){
    if (session('user')->role == 'Admin') {
        return view('404');
    } else if (session('user')->role == 'Organizator') {
        $categories = EventsController::categories();
        $myevents = OrganizatorController::myevents();
        return view('organizator.profile',['myevents' => $myevents, 'categories' => $categories]);
    } else if (session('user')->role == 'User') {
        return view('404');
    }
});
Route::get('/myevents' , function (){
    if (session('user')->role == 'Admin') {
        return view('404');
    } else if (session('user')->role == 'Organizator') {
        $categories = EventsController::categories();
        $myevents = OrganizatorController::myevents();
        return view('organizator.myevents',['myevents' => $myevents, 'categories' => $categories]);
    } else if (session('user')->role == 'User') {
        return view('404');
    }
});

Route::get('/reservations' , function (){
    if (session('user')->role == 'Admin') {
        return view('404');
    } else if (session('user')->role == 'Organizator') {
        $myevents = OrganizatorController::myevents();
        return view('organizator.reservations',['myevents' => $myevents]);
    } else if (session('user')->role == 'User') {
        return view('404');
    }
});

Route::get('/edit/{id}', [OrganizatorController::class, 'edit'])->name('edit');

Route::post('/editEvent' , [OrganizatorController::class, 'editEvent']);

Route::get('/deleteCat/{id}', [AdminController::class, 'deleteCat'])->name('deleteCat');

Route::post('/addCat', [AdminController::class, 'addCat']);

Route::post('/editCat', [AdminController::class, 'editCat']);

Route::get('/upgrade/{id}', [AdminController::class, 'upgrade'])->name('upgrade');

Route::get('/downgrade/{id}', [AdminController::class, 'downgrade'])->name('downgrade');

Route::get('/stats', [AdminController::class, 'stats']);

Route::get('/myReservations', [UserController::class, 'myreservations']);

Route::get('/deleteEvent/{id}', [OrganizatorController::class, 'deleteEvent'])->name('deleteEvent');

Route::get('/ticket/{id}', [EmailController::class, 'sendTicket'])->name('sendTicket');