<?php

namespace App\Livewire\Messages;

use Livewire\Component;
use App\Models\User;
use App\Models\LiveChat;
use App\Models\Room;

class Message extends Component
{
 
    public $recv;
    public $recv_id;
    public $send_id;
    public $room_id;
    public $message;
    public $hotel;
    public $allMessages;

    public function mount($id,$room = null)
    {
        $this->send_id = auth()->id();
        $this->recv = User::find($id);
        $this->recv_id = $id;
        $this->room_id = $room;
        if((int)$this->recv_id === (int)$this->send_id)
        {
            return $this->redirectRoute('messages.index');
        }
    }

    public function create()
    {
        $this->validate([
            'recv_id' => 'required|exists:users,id',
            'send_id' => 'required|exists:users,id',
            'message' => 'required|string|max:500',
        ]);

        LiveChat::create($this->only(['recv_id','send_id','room_id','message']));
        $this->reset(['message']);
        $this->allMessages = LiveChat::where(function ($q) {
            $q->where('send_id', auth()->id())
            ->where('recv_id', $this->recv_id);
        })->orWhere(function ($q) {
            $q->where('send_id', $this->recv_id)
            ->where('recv_id', auth()->id());
        })->get();
    }

    
    public function render()
    {
        $this->allMessages = LiveChat::where(function ($q) {
            $q->where('send_id', auth()->id())
              ->where('recv_id', $this->recv_id);
        })->orWhere(function ($q) {
            $q->where('send_id', $this->recv_id)
              ->where('recv_id', auth()->id());
        })->get();

        return view('livewire.messages.message',[
            'recv' => $this->recv_id,
            'allMessages' => $this->allMessages,
        ]);
    }
}
