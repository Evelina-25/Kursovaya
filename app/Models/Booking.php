<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public const STATUSES = ['Новая','Подтверждена','Отклонена','Завершена',]; 
    protected $fillable = ['zone_id', 'user_id', 'payment_method_id', 'date_start', 'time_start', 'status'];
    protected function casts(): array {return['date_start'=>'date'];}
    public function GetZone(){
        return $this->BelongsTo(Zone::class, 'zone_id');
    }

    public function GetUser(){
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function GetPaymentMethod(){
        return $this->BelongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function GetReview(){
        return $this->hasOne(Review::class, 'booking_id');
    }

     public function GetServices(){
        return $this->BelongsToMany(Service::class, 'booking_service', 'booking_id', 'service_id')->withTimestamps();
    }

    

    public static function CheckOverlap(int $zoneId, string $date, string $time, int $duration): bool
    {
        $start = Carbon::parse("$date $time");
        $end   = $start->copy()->addMinutes($duration);

        return static::with('GetServices')
            ->where('zone_id', $zoneId)
            ->whereDate('date_start', $date)
            ->where('status', '!=', 'Отклонена')
            ->get()
            ->contains(function ($b) use ($start, $end) {
                $bStart = Carbon::parse($b->date_start->format('Y-m-d') . ' ' . $b->time_start);
                $bEnd   = $bStart->copy()->addMinutes($b->GetServices->sum('duration'));
                return $start < $bEnd && $end > $bStart;
            });
    }
}

