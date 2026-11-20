<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Models\Zone;
use App\Models\Service;
use App\Models\PaymentMethod;

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

Route::post('/Panel/{booking}', [AdminController::class, 'StatusChange'])->name('Panel.post');

Route::get('/Booking', function(){
    $zones = Zone::all();
    $services = Service::all();
    $paymentMethods = PaymentMethod::all();
    return view('static.Booking', compact('zones', 'services', 'paymentMethods'));
})->name('Booking');

Route::post('/Booking', [BookingController::class, 'NewBooking'])->name('Booking.post');

Route::get('/applications', [BookingController::class, 'BookingOpen'])->name('applications');

Route::post('/applications/{booking}/review', [BookingController::class, 'AddRewiev'])->name('review.post');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});








