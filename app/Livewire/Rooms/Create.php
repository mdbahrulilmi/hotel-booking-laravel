<?php

namespace App\Livewire\Rooms;

use Livewire\Component;

class Create extends Component
{
    public $facilities = [''];

    public function addFacility()
    {
        $this->facilities[] = '';
    }

    public function removeFacility($index)
    {
        unset($this->facilities[$index]);
        $this->facilities = array_values($this->facilities); // reset index
    }

    public function render()
    {
        return view('livewire.rooms.create');
    }
}
