<?php

namespace App\Livewire\Hotels;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Hotel;

class Update extends Component
{
    use WithFileUploads;

    public $myHotel, $name, $street_address, $description, $city, $state, $postal_code, $phone_number;
    public $images = [];
    public $uploadedImages = [];
     
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
            $this->uploadedImages = $this->myHotel->images;    
        }else{
            return $this->redirectRoute('hotels.create');
        }
        
        if($this->uploadedImages != null){
            if($this->uploadedImages === "[]"){
                $this->uploadedImages = [];}
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
    
    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'phone_number' => 'required|string|max:20',
            'uploadedImages.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pathImages = [];
        if ($this->uploadedImages) {
            foreach ($this->uploadedImages as $image) {
                if ($image instanceof \Illuminate\Http\UploadedFile) {
                    $path = $image->store('images', 'public');
                    $pathImages[] = $path;
                } else {
                    $pathImages[] = $image;
                }
            }
        }

        if ($this->myHotel !== null) {
            $this->myHotel->update(array_merge(
                $this->only(['name', 'street_address', 'description', 'city', 'state', 'postal_code', 'phone_number']),
                ['images' => json_encode($pathImages)]
            ));

            session()->flash('success', 'Hotel updated successfully.');
        }

        return $this->redirectRoute('hotels.index');
    }

    public function render()
    {
        return view('livewire.hotels.update',[
            'myHotel' => $this->myHotel,
            'uploadedImages' => $uploadedImages ?? [],
        ]);
    }
}
