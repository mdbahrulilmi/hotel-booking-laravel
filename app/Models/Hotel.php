<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\User;

class Hotel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function room(): HasMany
    {
        return $this->hasMany(Room::class);
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
