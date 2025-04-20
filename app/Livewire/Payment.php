<?php

namespace App\Livewire;

use Livewire\Component;

class Payment extends Component
{
    public $payment_method;

    public function render()
    {
        return view('livewire.payment');
    }
}
