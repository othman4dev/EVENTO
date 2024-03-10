<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;

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
    $posts = PostsController::allPosts();
    return view('user.index', ['posts' => $posts]);
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/category', function () {
    return view('admin.category');
});
Route::post('/log', [LoginController::class, 'login']);

Route::post('/register', [LoginController::class, 'register']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/profile', [UserController::class, 'profile']);

Route::get('/verify', function () {
    return view('verify');
});

Route::get('/forgot', function () {
    return view('forgot');
}); 

Route::post('/sendMail', [EmailController::class, 'sendMail']);

Route::post('/sendVerification', [LoginController::class, 'verifyCode']);

Route::post('/verifyCode', [LoginController::class, 'verifyCode']);

Route::get('/reserve/{id}', [PostsController::class, 'reserve'])->name('reserve');

Route::get('/cancel/{id}', [PostsController::class, 'cancel'])->name('cancel');

Route::get('/evento' , function () {
    if (session('user') == null) {
        return redirect('/login');
    }
    return view('organizer.evento');
});

Route::get('/events' , 
function () {
    $posts = PostsController::allPosts();
    return view('admin.events', ['posts' => $posts]);
});

Route::get('/events/delete/{id}', [PostsController::class, 'delete'])->name('delete');

Route::get('/events/approve/{id}', [PostsController::class, 'approve'])->name('approve');

Route::get('/events/reject/{id}', [PostsController::class, 'reject'])->name('reject');

Route::get('/event/{id}', [PostsController::class, 'Event'])->name('event');

Route::get('/add', function () {
    $categories = PostsController::categories();
    return view('organizer.add', [ 'categories' => $categories]);
});

Route::post('/addEvent', [PostsController::class, 'addEvent']);

Route::get('/search/{search}', [PostsController::class, 'search'])->name('search');