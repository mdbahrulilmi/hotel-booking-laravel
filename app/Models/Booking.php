<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Room;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function room(): belongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
