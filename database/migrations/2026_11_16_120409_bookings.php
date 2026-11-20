<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('bookings', function (Blueprint $table) { 

            $table->id();
            $table->foreignid('zone_id')->constrained('zones');
            $table->foreignid('user_id')->constrained('users');
            $table->foreignid('payment_method_id')->constrained('payment_methods');
            $table->date('date_start');
            $table->time('time_start');
            $table->enum('status', ['Новая','Подтверждена','Отклонена','Завершена',]);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
