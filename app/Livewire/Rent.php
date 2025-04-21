<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;


class Rent extends Component
{
    public $room;

    public function mount()
    {
        $this->room = Room::where('status','active')->get();
    }

    public function render()
    {
        return view('livewire.rent',['room' => $this->room]);
    }
}
