<?php

namespace App\Livewire\Hotels;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Hotel;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $code;
    public $street_address;
    public $description;
    public $city;
    public $state;
    public $postal_code;
    public $phone_number;
    public $images = [];
    public $user_id;
    public $rating = 0;
    public $myHotel;
    public $status = 'active';
    public $is_verified = false;
    public $uploadedImages = [];

    public function mount()
    {

        $this->myHotel = Hotel::where('user_id',auth()->id())->first();

        if($this->myHotel != null){
            return $this->redirectRoute('hotels.index');
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
        'description' => 'nullable|string|max:500',
        'street_address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'state' => 'required|string|max:100',
        'postal_code' => 'required|string|max:20',
        'phone_number' => 'required|string|max:20',
        'status' => 'required|in:active,inactive',
        'is_verified' => 'required|boolean',
        'uploadedImages' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $pathImages = [];
    if ($this->uploadedImages != null) {
        foreach ($this->uploadedImages as $image) {
            $path = $image->store('images', 'public');
            $pathImages[] = $path;
        }
    }

    $this->user_id = auth()->id();

    if ($this->myHotel == null) {
        $words = explode(' ', $this->name);
        $words_code = strtoupper(implode('', array_map(fn($k) => substr($k, 0, 1), array_slice($words, 0, 3))));
        $random_number = rand(100, 999);
        $this->code = $words_code . $random_number;
        $this->rating = 0;

        Hotel::create(
            array_merge(
                $this->only([
                    'hotel_id', 'name', 'code', 'description', 'street_address', 'city', 'state', 
                    'postal_code', 'phone_number', 'rating', 'user_id', 'status', 'is_verified'
                ]),
                ['images' => json_encode($pathImages)]
            )
        );            

        session()->flash('status', 'Hotel successfully updated.');
    }

    // Redirect ke halaman index hotel
    return $this->redirectRoute('hotels.index');
}

    public function render()
    {
        return view('livewire.hotels.create');
    }

    
}
