<?php

namespace App\Livewire\Rooms;

use Livewire\Component;
use App\Models\Room;

class Detail extends Component
{
    public $room;

    public function mount($id)
    {
        $this->room = Room::find($id);
    }
    public function render()
    {
        return view('livewire.rooms.detail',['rooms' => $this->room]);
    }
}
