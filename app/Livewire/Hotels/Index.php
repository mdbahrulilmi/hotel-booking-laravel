<?php

namespace App\Livewire\Hotels;

use Livewire\Component;
use App\Models\Hotel;

class Index extends Component
{
    public $myHotel;
    
    public function mount()
    {
        $this->myHotel = Hotel::where('user_id',auth()->id())->first();

        if($this->myHotel === null){
            return $this->redirectRoute('hotels.create');
        }
    }

    public function render()
    {
        return view('livewire.hotels.index',['myHotel' => $this->myHotel ?? '']);
    }
}
