<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;


class Rent extends Component
{
    public $room;

    public function mount()
    {
        $this->room = Room::all();
    }

    public function render()
    {
        return view('livewire.rent',['room' => $this->room]);
    }
}
