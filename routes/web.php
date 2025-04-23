<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Middleware\typeAccount;


Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    
    Volt::route('/dashboard', 'dashboard')->name('dashboard');

    Volt::route('/rent', 'rent')->name('rent');
    Volt::route('/detail/{id}', 'rooms.detail')->name('rooms.detail');

    Route::prefix('/bookings')->group(function(){
        Volt::route('/', 'bookings.index')->name('bookings.index');
        Volt::route('/create/{id}', 'bookings.create')->name('bookings.create');
    });
    
    Route::prefix('/invoice')->group(function(){
        Volt::route('/{id}', 'invoice')->name('invoice.index');
    });

    Route::prefix('/messages')->group(function(){
        Volt::route('/', 'messages.index')->name('messages.index');
        Volt::route('/{id}/{room?}', 'messages.message')->name('messages.message');
    });
        Route::middleware(typeAccount::class.':owner')->group(function(){
            Route::prefix('/hotel')->group(function(){
                Volt::route('/', 'hotels.index')->name('hotels.index');
                Volt::route('/create', 'hotels.create')->name('hotels.create');
                Volt::route('/update', 'hotels.update')->name('hotels.update');
            });
        
            Route::prefix('/rooms')->group(function(){
                Volt::route('/', 'rooms.index')->name('rooms.index');
                Volt::route('/create', 'rooms.create')->name('rooms.create');
                Volt::route('/update/{id}', 'rooms.update')->name('rooms.update');
            });

            Route::prefix('/incoming-bookings')->group(function(){
                Volt::route('/', 'incoming-bookings.index')->name('incoming-bookings.index');
            });
        });
});
Route::middleware(typeAccount::class.':admin')->group(function(){
    Route::prefix('/admin')->group(function(){
        Volt::route('/users', 'admin.users')->name('admin.users');
        Volt::route('/transaction', 'admin.transaction')->name('admin.transaction');
        Volt::route('/services', 'admin.services')->name('admin.services');
    });
});

require __DIR__.'/auth.php';
