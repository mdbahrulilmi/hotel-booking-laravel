<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Hotel::where('user_id', $request->user()->id)->exists()) {
            return response()->json(['message' => 'User already has a hotel.'], 409);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'phone_number' => 'required|string|max:20',
            'status' => 'required|in:active,inactive',
            'is_verified' => 'required|boolean',
            'uploadedImages.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pathImages = [];
        if ($request->hasFile('uploadedImages')) {
            $files = is_array($request->file('uploadedImages')) 
                ? $request->file('uploadedImages') 
                : [$request->file('uploadedImages')];

            foreach ($files as $image) {
                $pathImages[] = $image->store('images', 'public');
            }
        }

        $words = explode(' ', $request->name);
        $words_code = strtoupper(implode('', array_map(fn($k) => substr($k, 0, 1), array_slice($words, 0, 3))));
        $random_number = rand(100, 999);
        $code = $words_code . $random_number;

        $hotel = Hotel::create([
            'name' => $request->name,
            'code' => $code,
            'description' => $request->description,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'phone_number' => $request->phone_number,
            'rating' => 0,
            'user_id' => $request->user()->id,
            'status' => $request->status,
            'is_verified' => $request->is_verified,
            'images' => json_encode($pathImages),
        ]);

        return response()->json([
            'message' => 'Hotel successfully created.',
            'data' => $hotel
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $hotel = Hotel::where('user_id', auth()->id())
            ->first();
    
        if (!$hotel) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }
    
        return response()->json($hotel, 200);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $hotel = Hotel::where('id', $id)->where('user_id', $request->user()->id)->first();

        if (!$hotel) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string|max:500',
            'street_address' => 'sometimes|required|string|max:255',
            'city' => 'sometimes|required|string|max:100',
            'state' => 'sometimes|required|string|max:100',
            'postal_code' => 'sometimes|required|string|max:20',
            'phone_number' => 'sometimes|required|string|max:20',
            'status' => 'sometimes|required|in:active,inactive',
            'is_verified' => 'sometimes|required|boolean',
            'uploadedImages.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle uploaded images jika ada
        $pathImages = json_decode($hotel->images ?? '[]', true);
        if ($request->hasFile('uploadedImages')) {
            $files = is_array($request->file('uploadedImages')) 
                ? $request->file('uploadedImages') 
                : [$request->file('uploadedImages')];

            foreach ($files as $image) {
                $pathImages[] = $image->store('images', 'public');
            }
        }

        // Update data hotel
        $hotel->update([
            'name' => $request->name ?? $hotel->name,
            'description' => $request->description ?? $hotel->description,
            'street_address' => $request->street_address ?? $hotel->street_address,
            'city' => $request->city ?? $hotel->city,
            'state' => $request->state ?? $hotel->state,
            'postal_code' => $request->postal_code ?? $hotel->postal_code,
            'phone_number' => $request->phone_number ?? $hotel->phone_number,
            'status' => $request->status ?? $hotel->status,
            'is_verified' => $request->is_verified ?? $hotel->is_verified,
            'images' => json_encode($pathImages),
        ]);

        return response()->json([
            'message' => 'Hotel successfully updated.',
            'data' => $hotel
        ], 200);
    }
}
