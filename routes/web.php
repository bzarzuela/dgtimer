<?php

use App\Livewire\CreateRun;
use App\Livewire\Leaderboard;
use App\Livewire\RaceDrivers;
use App\Livewire\Races;
use App\Livewire\ShowDriver;
use App\Models\Race;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome')->with('races', Race::all());
});

Route::get('/races/{race}/leaderboard', Leaderboard::class)->name('race.leaderboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/races', Races::class)->name('dashboard');
    Route::get('/races/{race}/drivers', RaceDrivers::class)->name('race.drivers');

    Route::get('/drivers/{driver}', ShowDriver::class)->name('drivers.show');
    Route::get('/drivers/{driver}/runs/create', CreateRun::class)->name('runs.create');
});
