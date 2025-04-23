<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    
    public $user;
    public $type;

    public function mount()
    {
        $this->user = User::all();
    }

    public function updateType($id, $type)
{
    $user = User::find($id);
    if ($user) {
        $user->type = $type;
        $user->save();

        $this->user = User::all();
    }
}


    public function render()
    {
        return view('livewire.admin.users',['users' => $this->user]);
    }
}
