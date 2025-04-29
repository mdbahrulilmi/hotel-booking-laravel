<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookings = Booking::where('user_id', $request->user()->id)->get();
    
        return response()->json([
            'message' => 'List of your bookings retrieved successfully',
            'data' => $bookings,
        ], 200);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'checkin' => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
            'payment_method' => 'required|string|in:credit_card,bank_transfer,ewallet,cash',
            'payment_sub_option' => 'required_if:payment_method,credit_card,bank_transfer,ewallet|string',
        ]);

        $room = Room::find($request->room_id);

        // Cegah booking kamar milik owner sendiri
        if ($room->hotel->user_id === $request->user()->id) {
            return response()->json(['message' => 'You cannot book your own room'], 403);
        }

        $paymentType = match($request->payment_method) {
            'credit_card', 'bank_transfer', 'ewallet' => $request->payment_sub_option,
            'cash' => 'Qris',
            default => null,
        };

        if (!$paymentType) {
            return response()->json(['message' => 'Invalid payment type'], 400);
        }

        // Buat booking baru
        $booking = Booking::create([
            'user_id' => $request->user()->id,
            'room_id' => $room->id,
            'check_in' => $request->checkin,
            'check_out' => $request->checkout,
            'payment_method' => $request->payment_method,
            'payment_type' => $paymentType,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Booking successfully created',
            'data' => $booking
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
