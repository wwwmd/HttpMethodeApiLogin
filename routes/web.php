<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;

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
    return view('/home');
});
Route::post('/home', [SocialController::class, 'submit'])->name('login.submit');
//Route::post('/home', [SocialController::class, 'submit'])->name('login');
Route::get('auth/google', [SocialController::class, 'loginWithGoogle'])->name('google');
Route::any('auth/google/callback', [SocialController::class, 'callbackFromGoogle']);