<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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
    return view('index');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/category', function () {
    return view('category');
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