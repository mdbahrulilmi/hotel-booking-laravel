<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{


    public function index()
    {
        $room = Room::where('status','active')->get();
        
        return response()->json($room, 200);
    }

    public function store(Request $request)
    {
        if ($request->user()->hotel === null) {
            return response()->json(['message' => 'Please create your hotel first'], 200);
        }else
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|max:100',
                'description' => 'nullable|string|max:500',
                'price_per_night' => 'required|numeric|min:0',
                'available_quantity' => 'required|integer|min:1',
                'capacity' => 'required|integer|min:1',
                'uploadedImages.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            $pathImages = [];
            
            $uploadedFiles = $request->file('uploadedImages');
            
            if ($uploadedFiles) {
                $files = is_array($uploadedFiles) ? $uploadedFiles : [$uploadedFiles];
            
                foreach ($files as $image) {
                    $pathImages[] = $image->store('images', 'public');
                }
            }
            
            
            Room::create([
                'hotel_id' => $request->user()->hotel->id,
                'name' => $request->name,
                'type' => $request->type,
                'description' => $request->description,
                'price_per_night' => $request->price_per_night,
                'available_quantity' => $request->available_quantity,
                'capacity' => $request->capacity,
                'facilities' => json_encode($request->facilities),
                'images' => json_encode($pathImages),
                'status' => 'active',
            ]);
            return response()->json(['message' => 'Room successfully created.'], 200);
        }
    }

    public function show(Room $room)
{
    return response()->json($room, 200);
}


public function update(Request $request, Room $room)
{
    $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'type' => 'sometimes|required|string|max:100',
        'description' => 'nullable|string|max:500',
        'price_per_night' => 'sometimes|required|numeric|min:0',
        'available_quantity' => 'sometimes|required|integer|min:1',
        'capacity' => 'sometimes|required|integer|min:1',
        'uploadedImages' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $pathImages = json_decode($room->images ?? '[]');

    if ($request->hasFile('uploadedImages')) {
        foreach ($request->file('uploadedImages') as $image) {
            $pathImages[] = $image->store('images', 'public');
        }
    }

    $room->update([
        'name' => $request->name ?? $room->name,
        'type' => $request->type ?? $room->type,
        'description' => $request->description ?? $room->description,
        'price_per_night' => $request->price_per_night ?? $room->price_per_night,
        'available_quantity' => $request->available_quantity ?? $room->available_quantity,
        'capacity' => $request->capacity ?? $room->capacity,
        'facilities' => $request->has('facilities') ? json_encode($request->facilities) : $room->facilities,
        'images' => json_encode($pathImages),
    ]);

    return response()->json(['message' => 'Room successfully updated.', 'room' => $room], 200);
}


    public function destroy(Room $room)
    {
        //
    }
}
