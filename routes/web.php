<?php

use App\Livewire\RaceDrivers;
use App\Livewire\Races;
use App\Models\Race;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome')->with('races', Race::all());
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/races', Races::class)->name('dashboard');
    Route::get('/races/{race}/drivers', RaceDrivers::class)->name('race.drivers');
});
