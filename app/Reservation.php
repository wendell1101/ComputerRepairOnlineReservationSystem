<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'transaction_id', 'user_id', 'items', 'total_amount',
        'expected_reservation_date_time', 'final_reservation_date_time', 'status', 'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullName($first_name, $last_name)
    {
        return ucwords($first_name . ' ' . $last_name);
    }
}
