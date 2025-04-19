<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Review;
use App\Models\LiveChat;

class Room extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'facilities' => 'array',
        'images' => 'array',
    ];

    public function hotel(): belongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    public function review(): hasMany
    {
        return $this->hasMany(Review::class);
    }
    public function live_chat(): hasMany
    {
        return $this->hasMany(LiveChat::class);
    }
    
    public function booking(): hasMany
    {
        return $this->hasMany(Booking::class);
    }
}
