<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;

class Dashboard extends Component
{
    public $booking;

    public function mount()
    {
        $this->booking = Booking::where('user_id',auth()->id())->latest()->take(3)->get();
    }

    public function render()
    {
        return view('livewire.dashboard',['booking' => $this->booking]);
    }
}
