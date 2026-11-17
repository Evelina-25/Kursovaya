<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['text', 'booking_id'];

    public function GetBooking(){
        return $this->BelongsTo(Booking::class, 'booking_id');
    }
}
