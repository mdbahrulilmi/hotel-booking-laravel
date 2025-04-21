<?php

namespace App\Livewire\Rooms;

use Livewire\Component;
use App\Models\Room;
use App\Models\Hotel;

class Index extends Component
{
    public $rooms = [];

    public function loadRooms()
    {
        $this->rooms = Room::where('hotel_id', auth()->user()->hotel->id)->get();
    }

    public function mount()
    {
        if(auth()->user()->hotel === null){
            return $this->redirectRoute('hotels.create');
        }
        $this->loadRooms();
    }
    

    public function deactive($id){
        $room = ROOM::findOrFail($id);
        $room->update(
            ['status' => 'deactive']
        );

        $this->loadRooms();
    }
   
    public function active($id){
        $room = ROOM::findOrFail($id);
        $room->update(
            ['status' => 'active']
        );

        $this->loadRooms();
    }

    public function render()
    {
        return view('livewire.rooms.index',[
            'rooms' => $this->rooms
        ]);
    }
}
