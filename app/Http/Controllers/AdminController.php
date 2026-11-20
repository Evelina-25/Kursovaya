<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;


class AdminController extends Controller
{
    public function AdminOpen(){
        abort_unless(Auth::User()->role=='admin',403);
        $bookings = Booking::all();
        $statuses = Booking::STATUSES;
        return view('static.PanelAdmin', compact('bookings', 'statuses'));
    }

    public function StatusChange(Request $request, Booking $booking){
    abort_unless(Auth::User()->role==='admin', 403);
   $data = $request->validate(['status'=>'required|in:' . implode(',', Booking::STATUSES)]);
   $booking->Update($data);
    return back();
    }
}
