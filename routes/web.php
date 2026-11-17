<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Models\Zone;
use App\Models\Service;

Route::get('/', function(){
    return view('static.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/login', function(){
    return view('static.login');
})->name('login');



Route::middleware('auth')->group(function(){
Route::get('/Panel', [AdminController::class, 'AdminOpen'])->name('Panel');

Route::get('/Booking', function(){
    $zones = Zone::all();
    $services = Service::all();
    return view('static.Booking', compact('zones', 'services'));
})->name('Booking');
});








