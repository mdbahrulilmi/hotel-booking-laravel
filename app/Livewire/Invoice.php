<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;

class Invoice extends Component
{
    public $booking;

    public function mount($id)
    {
        $this->booking = Booking::with('room.hotel')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.invoice');
    }
}
