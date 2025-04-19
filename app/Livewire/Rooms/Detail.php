<?php

namespace App\Livewire\Rooms;

use Livewire\Component;
use App\Models\Room;

class Detail extends Component
{
    public $room;
    public $hotel;
    public $owner;

    public function mount($id)
    {
        $this->room = Room::find($id);
        $this->hotel = $this->room->hotel()->first();
        $this->owner = $this->hotel->user_id;
    }
    public function render()
    {
        return view('livewire.rooms.detail',[
            'rooms' => $this->room,
            'owner' => $this->owner
        ]);
    }
}
