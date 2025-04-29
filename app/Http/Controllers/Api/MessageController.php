<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LiveChat;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $authId = $request->user()->id;
    
        $messages = LiveChat::where('send_id', $authId)
            ->orWhere('recv_id', $authId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($message) use ($authId) {
                $user1 = min($message->send_id, $message->recv_id);
                $user2 = max($message->send_id, $message->recv_id);
                return $user1 . '-' . $user2;
            })
            ->filter()
            ->values();
    
        return response()->json([
            'message' => 'Conversation list retrieved successfully.',
            'data' => $messages,
        ]);
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'recv_id' => 'required|exists:users,id|different:auth_user',
            'room_id' => 'nullable|integer',
            'message' => 'required|string|max:500',
        ]);

        $validated['send_id'] = $request->user()->id;

        $chat = LiveChat::create($validated);

        return response()->json([
            'message' => 'Message sent successfully.',
            'data' => $chat,
        ], 201);
}


    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
