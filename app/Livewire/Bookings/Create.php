<?php

namespace App\Livewire\Bookings;

use Livewire\Component;
use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;

class Create extends Component
{
    public $room;
    public $price_per_night;
    public $totalPrice;
    public $checkin;
    public $checkout;
    public $payment_method;
    public $payment_type;
    public $payment_sub_option;

    public function mount($id)
    {
        $this->room = Room::find($id);
        if ($this->room->hotel->user_id === auth()->id()){
            return  $this->redirectRoute('bookings.index'); 
        }
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
    if ($this->payment_method === 'credit_card') {
        $this->payment_type = $this->payment_sub_option;
    } elseif ($this->payment_method === 'bank_transfer') {
        $this->payment_type = $this->payment_sub_option;
    } elseif ($this->payment_method === 'ewallet') {
        $this->payment_type = $this->payment_sub_option;
    } elseif ($this->payment_method === 'cash') {
        $this->payment_type = 'Qris';
    } else {
        $this->payment_type = null;
    }

    if (!$this->payment_method || !$this->payment_type) {
        session()->flash('error', 'Silakan pilih metode dan sub-pilihan pembayaran!');
        return;
    }

    Booking::create([
        'user_id' => auth()->id(),
        'room_id' => $this->room->id,
        'check_in' => $this->checkin,
        'check_out' => $this->checkout,
        'payment_method' => $this->payment_method,
        'payment_type' => $this->payment_type,
        'status' => 'pending',
    ]);
    return $this->redirectRoute('bookings.index');
}


    public function render()
    {
        return view('livewire.bookings.create');
    }
}

