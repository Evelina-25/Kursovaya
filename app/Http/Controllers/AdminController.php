<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminOpen(){
        abort_unless(Auth::User()->role=='admin',403);
        $bookings = Booking::all();
        return view('static.PanelAdmin', compact('bookings'));
    }
}
