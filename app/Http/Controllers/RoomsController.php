<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rooms $rooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rooms $rooms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomsRequest $request, Rooms $rooms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rooms $rooms)
    {
        //
    }
}
