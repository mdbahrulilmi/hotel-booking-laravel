<?php

namespace App\Livewire\IncomingBookings;

use Livewire\Component;
use App\Models\Booking;

class Index extends Component
{
    public $bookings;

    public function mount()
    {
        $this->bookings = Booking::whereHas('room.hotel', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();
        
    }
    public function render()
    {
        return view('livewire.incoming-bookings.index',['bookings' => $this->bookings]);
    }
}
