<?php

namespace App\Livewire\Rooms;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Support\Arr;

class Create extends Component
{

    use WithFileUploads;

    public $name,$type,$description;
    public $status = 'active';
    public $price_per_night,$available_quantity,$capacity;
    public $facilities = [''];
    public $images = [];
    public $uploadedImages = [];
    public $hotel_id;

    public function mount()
    {
        $myHotel = Hotel::where('user_id',auth()->id())->first();
        $this->hotel_id = $myHotel->id;
    }

    public function updatedImages()
    {
        if ($this->images !== null) {
            $this->uploadedImages = array_merge($this->uploadedImages, $this->images);
        }
    }

    public function removeUploadedImages($index)
    {
        unset($this->uploadedImages[$index]);
        $this->uploadedImages = array_values($this->uploadedImages); // reset index
    }
    

    public function addFacility()
    {
        $this->facilities[] = '';
    }

    public function removeFacility($index)
    {
        unset($this->facilities[$index]);
        $this->facilities = array_values($this->facilities); // reset index
    }
    
  

    public function save()
{
        $this->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
            'price_per_night' => 'required|numeric|min:0',
            'available_quantity' => 'required|integer|min:1',
            'capacity' => 'required|integer|min:1',
            'uploadedImages.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pathImages = [];

        if ($this->uploadedImages != null) {
            foreach ($this->uploadedImages as $image) {
                $path = $image->store('images', 'public');
                $pathImages[] = $path;
            }
        }

        Room::create([
            'hotel_id' => $this->hotel_id,
            'name' => $this->name,
            'type' => $this->type,
            'description' => $this->description,
            'price_per_night' => $this->price_per_night,
            'available_quantity' => $this->available_quantity,
            'capacity' => $this->capacity,
            'facilities' => json_encode($this->facilities),
            'images' => json_encode($pathImages),
            'status' => $this->status,
        ]);

        session()->flash('status', 'Room successfully created.');
        $this->reset('images');
        return $this->redirectRoute('rooms.index');
}


    public function render()
    {
        return view('livewire.rooms.create',['uploadedImages' => $uploadedImages ?? []]);
    }
}
