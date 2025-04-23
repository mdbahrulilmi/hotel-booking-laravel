<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Booking;

class Transaction extends Component
{

    public $transaction;

    public function mount()
    {
        $this->transaction = Booking::all();
    }

    public function render()
    {
        return view('livewire.admin.transaction',['transaction' => $this->transaction]);
    }
}
