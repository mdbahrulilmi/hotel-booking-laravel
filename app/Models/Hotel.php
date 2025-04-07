<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Hotel extends Model
{
    /** @use HasFactory<\Database\Factories\HotelsFactory> */
    use HasFactory;

    public function room(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
