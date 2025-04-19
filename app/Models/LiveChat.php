<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class LiveChat extends Model
{
    /** @use HasFactory<\Database\Factories\LiveChatFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = ['send_id','recv_id','message','room_id'];

    // Relasi ke pengirim (send_id)
    public function sender()
    {
        return $this->belongsTo(User::class, 'send_id');
    }

    // Relasi ke penerima (recv_id)
    public function receiver()
    {
        return $this->belongsTo(User::class, 'recv_id');
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
