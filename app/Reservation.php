<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'transaction_id', 'user_id', 'items', 'total_amount',
        'expected_reservation_date_time', 'final_reservation_date_time', 'status', 'notes',
    ];
}
