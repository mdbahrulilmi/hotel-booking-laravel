<?php

namespace App\Livewire\Messages;

use Livewire\Component;
use App\Models\LiveChat;

class Index extends Component
{
    public $messages;

    public function mount()
    {
        $id = auth()->id();

        $this->messages = LiveChat::where(function ($query) use ($id) {
                $query->where('send_id', $id)
                      ->orWhere('recv_id', $id);
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($message) use ($id) {
                $user1 = min($message->send_id, $message->recv_id);
                $user2 = max($message->send_id, $message->recv_id);
                return $user1 . '-' . $user2;
            })
            ->map(function ($group) use ($id) {
                return $group->firstWhere(function ($message) use ($id) {
                    return $message->send_id != $id;
                });
            })
            ->filter();
    }
    



    public function render()
    {
        return view('livewire.messages.index',['messages'=>$this->messages]);
    }
}
