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

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:100|unique:hotels,code',
            'street_address' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'phone_number' => 'required|string|max:20',
            'user_id' => 'required|exists:users,id',
            'rating' => 'nullable|numeric|min:0|max:5',
            'status' => 'required|in:active,inactive',
            'is_verified' => 'required|boolean',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pathImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $pathImages[] = $image->store('images/hotels', 'public');
            }
        }

        $hotelData = array_merge(
            $validated,
            ['images' => json_encode($pathImages)]
        );
        Hotel::create($hotelData);
        return redirect()->route('hotels.index')->with('success', 'Hotel berhasil ditambahkan.');
    }

    public function render()
    {
        return view('livewire.hotels.create');
    }

    
}
