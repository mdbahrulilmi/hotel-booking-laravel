<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\MessageController;

// Login route
Route::post('login', [AuthController::class,'login']);

// Register route
Route::post('register', [AuthController::class,'register']);

Route::middleware('auth:sanctum')->group(function(){
Route::prefix('/room')->group(function(){
    Route::get('/', [RoomController::class,'index']);
    Route::post('/create', [RoomController::class,'store']);
    Route::post('/update', [RoomController::class,'update']);
});
Route::prefix('/hotel')->group(function(){
    Route::get('/', [HotelController::class,'show']);
    Route::post('/create', [HotelController::class,'store']);
    Route::post('/update', [HotelController::class,'update']);
});
Route::prefix('/booking')->group(function(){
    Route::get('/', [BookingController::class,'index']);
    Route::post('/create', [BookingController::class,'store']);
    Route::post('/update', [BookingController::class,'update']);
});
Route::prefix('/message')->group(function(){
    Route::get('/', [MessageController::class,'index']);
    Route::post('/create', [MessageController::class,'store']);
    Route::post('/update', [MessageController::class,'update']);
});
});
