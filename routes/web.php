<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Home;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/auth', [Auth::class, 'index'])->name('login');
Route::get('/auth/register', [Auth::class, 'register']);
Route::get('/auth/logout', [Auth::class, 'logout']);
Route::get('/auth/recovery', [Auth::class, 'recovery']);

Route::post('/auth/login', [Auth::class, 'check']);
Route::post('/auth/register', [Auth::class, 'store']);
Route::post('/auth/recovery', [Auth::class, 'reset_password']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/home', [Home::class, 'index'])->name('home');
});
