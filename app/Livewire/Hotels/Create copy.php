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

    #[Validate('required')]
    public $name;
    
    #[Validate('required')]
    public $code;
    
    #[Validate('required')]
    public $street_address;
    
    #[Validate('nullable')]
    public $description;
    
    #[Validate('required')]
    public $city;
    
    #[Validate('required')]
    public $state;
    
    #[Validate('required')]
    public $postal_code;
    
    #[Validate('required')]
    public $phone_number;
    
    
    #[Validate('array')]
    public $images = [];
    
    #[Validate('nullable')]
    public $user_id;
    
    public $rating = 0;
    public $myHotel;
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
        $pathImages = [];
        if($this->uploadedImages != null){
            foreach ($this->uploadedImages as $image) {
                $path = $image->store('images','public');
                $pathImages[] = $path;
            }
        }

        $this->user_id = auth()->id();
        if ($this->myHotel == null){
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

        return $this->redirectRoute('hotels.index');
    }    

    public function render()
    {
        return view('livewire.hotels.create');
    }

    
}
