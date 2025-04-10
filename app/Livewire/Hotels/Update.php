<?php

namespace App\Livewire\Hotels;

use Livewire\Component;
use App\Models\Hotel;

class Update extends Component
{
    public $myHotel, $name, $street_address, $description, $city, $state, $postal_code, $phone_number;
     
    public function mount()
    {
        $this->myHotel = Hotel::where('user_id',auth()->id())->first();
        if($this->myHotel !== null){
            $this->name = $this->myHotel->name;
            $this->street_address = $this->myHotel->street_address;
            $this->description = $this->myHotel->description;        
            $this->city = $this->myHotel->city;        
            $this->state = $this->myHotel->state;        
            $this->postal_code = $this->myHotel->postal_code;        
            $this->phone_number = $this->myHotel->phone_number;        
        }else{
            return $this->redirectRoute('hotels.create');
        }

    }
    
    public function save()
    {
        if($this->myHotel !== null){
            $this->myHotel->update($this->only(['name', 'street_address', 'description', 'city', 'state', 'postal_code', 'phone_number']));

        session()->flash('success', 'Hotel updated successfully.');
         }
        return $this->redirectRoute('hotels.index');
    }
    public function render()
    {
        return view('livewire.hotels.update',[
            'myHotel' => $this->myHotel
        ]);
    }
}
