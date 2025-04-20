<?php

namespace App\Livewire\Bookings;

use Livewire\Component;
use App\Models\Room;
use Carbon\Carbon;

class Create extends Component
{
    public $room;
    public $price_per_night;
    public $totalPrice;
    public $checkin;
    public $checkout;
    public $bank_option;

    public function mount($id)
    {
        $this->room = Room::find($id);
        $this->price_per_night = $this->room->price_per_night;
        $this->checkin = now()->format('Y-m-d');
        $this->checkout = now()->addDay()->format('Y-m-d');
        $this->updateTotalPrice();
    }

    public function updated($property)
    {
        if (in_array($property, ['checkin', 'checkout'])) {
            $this->updateTotalPrice();
        }
    }

    public function updateTotalPrice()
    {
        $checkin = Carbon::parse($this->checkin);
        $checkout = Carbon::parse($this->checkout);
        $days = $checkin->diffInDays($checkout);
        $this->totalPrice = max($days, 1) * $this->price_per_night;
    }

    public function save()
    {
        // proses simpan booking
    }

    public function render()
    {
        return view('livewire.bookings.create');
    }
}
