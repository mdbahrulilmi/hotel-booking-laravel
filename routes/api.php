<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Authentication

Route::post('/register', function ($id) {
    return;
});

Route::post('/login', function ($id) {
    return;
});

Route::post('/logout', function ($id) {
    return;
});

// Get Data Hotels and Rooms

Route::get('/hotels', function ($id) {
    return;
});

Route::get('/hotels/{id}', function ($id) {
    return;
});

Route::get('/rooms?hotel_id=1', function ($id) {
    return;
});

Route::get('/rooms/{id}', function ($id) {
    return;
});

// Booking

Route::post('/bookings', function ($id) {
    return;
});

Route::get('/bookings/{id}', function ($id) {
    return;
});

Route::put('/bookings/{id}', function ($id) {
    return;
});

// Payment
Route::post('/payments', function ($id) {
    return;
});

// Reviews
Route::post('reviews', function ($id) {
    return; 
});

Route::get('reviews?hotel_id=1', function ($id) {
    return; 
});

// Live Chat
Route::post('live-chat', function ($id) {
    return; 
});

Route::get('live-chat?hotel_id=1', function ($id) {
    return; 
});