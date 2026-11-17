<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['zone_id', 'user_id', 'service_id', 'status_id', 'date_start', 'time_start', 'payment'];

    public function GetZone(){
        return $this->BelongsTo(Zone::class, 'zone_id');
    }

    public function GetUser(){
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function GetService(){
        return $this->BelongsTo(Service::class, 'service_id');
    }

    public function GetStatus(){
        return $this->BelongsTo(Status::class, 'status_id');
    }

    public function GetReview(){
        return $this->hasOne(Review::class, 'booking_id');
    }
}
