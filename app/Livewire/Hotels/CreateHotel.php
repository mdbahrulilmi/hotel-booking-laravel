<?php

namespace App\Livewire\Hotels;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Hotel;

class Create extends Component
{
    public $name;
    public $code;
    public $street_address;
    public $description;
    public $city;
    public $state;
    public $postal_code;
    public $phone_number;
    public $rating = 0;
    public $status = 'active';
    public $is_verified = false;
    public $images;
    public $user_id;
    public $myHotel;

    public function mount()
    {
        $this->myHotel = Hotel::where('user_id',auth()->id())->first();

        if($this->myHotel != null){
            return $this->redirectRoute('hotels.index');
        }
    }

    public function save()
    {
        $this->user_id = auth()->id();
        if ($this->myHotel == null){
            $words = explode(' ', $this->name);
            $words_code = strtoupper(implode('', array_map(fn($k) => substr($k, 0, 1), array_slice($words, 0, 3))));
            $random_number = rand(100, 999);
            $this->code = $words_code . $random_number;
            $this->rating = 0;


            Hotel::create(
                $this->only(
                    ['name','code','description','street_address','city','state','postal_code','phone_number','rating','user_id','status','is_verified','images']
                    )
            );
            session()->flash('status', 'Post successfully updated.');
        }

        return $this->redirectRoute('hotels.index');
    }    

    public function render()
    {
        return view('livewire.hotels.create');
    }

    
}
