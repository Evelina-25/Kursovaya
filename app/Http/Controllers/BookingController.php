<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function NewBooking(Request $request){
        $data = $request->validate([
            'zone_id'=> 'required|exists:zones,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'date_start'=> 'required',
            'time_start'=> 'required',
            'service_ids'=> 'required|array|min:1',
            'service_ids.*'=> 'exists:services,id',
            
        ],
        
        [
            'required'=>'Поле обязательно для заполнения',
            'service_ids.required' => 'Выберите хотя бы одну услугу',
            'service_ids.min' => 'Выберите хотя бы одну услугу'
        ]
        );

        $duration = (int) Service::whereIn('id', $data['service_ids'])->sum('duration');

        if(Booking::CheckOverlap($data['zone_id'], $data['date_start'], $data['time_start'], $duration)){
            return back()->withErrors(['time_start'=>'Выбранное время в этой зоне уже занято'])->withInput();
        }

        $booking = Booking::create([
            'zone_id'=> $data['zone_id'],
            'payment_method_id'=> $data['payment_method_id'],
            'date_start'=>$data['date_start'],
            'time_start'=> $data['time_start'],
            'user_id'=>Auth::id()
        ]);
        $booking->GetServices()->attach($data['service_ids']);
        return redirect('/applications');
    }

    public function BookingOpen(){
        $bookings = Booking::with(['GetServices', 'GetZone', 'GetPaymentMethod', 'GetReview'])->where('user_id', Auth::id())->latest()->get();
        return view('static.applications', compact('bookings'));
    }

    public function AddRewiev(Request $request, Booking $booking){
        if($booking->status!="Завершена"){
            return back()->withErrors(['text'=>'Оставить комментарий можно только для завершенных заявок']);
        }

        if($booking->GetReview){
            return back()->withErrors(['text'=>'Отзыв уже оставлен и не может быть изменён']);
        }

        $data = $request->validate([
            'text'=>'required|string|max:1000'
        ],
        [
            'required' => 'Поле обязательно для заполнения'
        ]
        );

        $booking->GetReview()->create([
            'text'=>$request->text
        ]);
        return back();
    }
}
