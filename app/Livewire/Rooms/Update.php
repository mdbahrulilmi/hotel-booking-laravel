<?php

namespace App\Livewire\Rooms;

use Livewire\Component;
use App\Models\Room;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $name,$type,$description,$price_per_night,$available_quantity,$capacity;
    public $room;
    public $facilities = [];
    public $images = [];
    public $uploadedImages = [];

    public function mount($id)
    {
        $this->room = Room::find($id);
        $this->name = $this->room->name;
        $this->type = $this->room->type;
        $this->description = $this->room->description;
        $this->price_per_night = $this->room->price_per_night;
        $this->available_quantity = $this->room->available_quantity;
        $this->capacity = $this->room->capacity;
        $this->facilities = json_decode($this->room->facilities);
        $this->uploadedImages = $this->room->images;
        // dd(gettype($this->facilities));
        if($this->uploadedImages != null){
            if($this->uploadedImages === "[]")
            {
                $this->uploadedImages = [];
            }
                else
                {
                    $this->uploadedImages = json_decode($this->uploadedImages);
                }
        }    
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
        $this->uploadedImages = array_values($this->uploadedImages);
    }
    
    public function save(){
        $pathImages = [];
        if($this->uploadedImages != null){
            foreach ($this->uploadedImages as $image) {
                if ($image instanceof \Illuminate\Http\UploadedFile) {
                    $path = $image->store('images','public');
                    $pathImages[] = $path;
                }else{
                    $pathImages[] = $image;
                }
            }
        }   

        $this->room->update([
            'name' => $this->name,
            'type' => $this->type,
            'description' => $this->description,
            'price_per_night' => $this->price_per_night,
            'available_quantity' => $this->available_quantity,
            'capacity' => $this->capacity,
            'facilities' => json_encode($this->facilities),
            'images' => json_encode($pathImages),
        ]);
        session()->flash('success', 'Room updated successfully.');
        return $this->redirectRoute('rooms.index');
    }

    public function render()
    {
        return view('livewire.rooms.update',['room'=>$this->room, 'uploadedImages' => $uploadedImages ?? []]);
    }
}
