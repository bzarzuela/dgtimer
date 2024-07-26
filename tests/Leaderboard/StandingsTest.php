<?php

namespace Tests\Leaderboard;

use App\Leaderboard\Standings;
use App\Models\Driver;
use App\Models\Race;
use App\Models\Run;

it('sorts the drivers by their fastest lap', function () {
    $race = Race::factory()->create();

    $r4 = Run::factory()->recycle($race)->time(4_000)->create();
    $r2 = Run::factory()->recycle($race)->time(2_000)->create();
    $r3 = Run::factory()->recycle($race)->time(3_000)->create();
    $r1 = Run::factory()->recycle($race)->time(1_000)->create();

    $drivers = resolve(Standings::class)->calculate($race);

    expect($drivers)->toHaveCount(4)
        ->and($drivers[0]->name)->toBe($r1->driver->name)
        ->and($drivers[1]->name)->toBe($r2->driver->name)
        ->and($drivers[2]->name)->toBe($r3->driver->name)
        ->and($drivers[3]->name)->toBe($r4->driver->name);
});

it('sorts the drivers by their fastest lap and skips the ones without a time', function () {
    $race = Race::factory()->create();

    Driver::factory()->recycle($race)->create();
    $r4 = Run::factory()->recycle($race)->time(4_000)->create();

    $drivers = resolve(Standings::class)->calculate($race);

    expect($race->drivers)->toHaveCount(2)
        ->and($drivers)->toHaveCount(1)
        ->and($drivers[0]->name)->toBe($r4->driver->name);
});

it('marks the fastest run of a driver', function() {

    $race = Race::factory()->create();
    $driver = Driver::factory()->recycle($race)->create();

    Run::factory()->forDriver($driver)->time(4_000)->create();
    Run::factory()->forDriver($driver)->time(3_000)->create();
    Run::factory()->forDriver($driver)->time(5_000)->create();

    $drivers = resolve(Standings::class)->calculate($race);

    expect($drivers)->toHaveCount(1)
        ->and($drivers[0]->fastest_time)->toBe('00:03.000');

    $runs = $drivers[0]->runs;

    expect($runs)->toHaveCount(3)
        ->and($runs[0]->fastest)->toBeFalse()
        ->and($runs[1]->fastest)->toBeTrue()
        ->and($runs[2]->fastest)->toBeFalse();
});
