<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Volt::route('/rent', 'rent')->name('rent');

    Route::prefix('/hotel')->group(function(){
        Volt::route('/', 'hotels.index')->name('hotels.index');
        Volt::route('/create', 'hotels.create')->name('hotels.create');
        Volt::route('/update', 'hotels.update')->name('hotels.update');
    });

    Route::prefix('/rooms')->group(function(){
        Volt::route('/', 'rooms.index')->name('rooms.index');
        Volt::route('/detail/{id}', 'rooms.detail')->name('rooms.detail');
        Volt::route('/create', 'rooms.create')->name('rooms.create');
        Volt::route('/update/{id}', 'rooms.update')->name('rooms.update');
    });

    Route::prefix('/bookings')->group(function(){
        Volt::route('/', 'bookings.index')->name('bookings.index');
        Volt::route('/create/{id}', 'bookings.create')->name('bookings.create');
    });

    Route::prefix('/incoming-bookings')->group(function(){
        Volt::route('/', 'incoming-bookings.index')->name('incoming-bookings.index');
        // Volt::route('/create', 'incoming-bookings.create')->name('incoming-bookings.create');
    });

    Route::prefix('/messages')->group(function(){
        Volt::route('/', 'messages.index')->name('messages.index');
        Volt::route('/{id}/{room?}', 'messages.message')->name('messages.message');
    });
});

require __DIR__.'/auth.php';
