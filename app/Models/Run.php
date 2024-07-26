<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Run extends Model
{
    use HasFactory;

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    protected function runTime(): Attribute
    {
        return Attribute::get(fn() =>
            Carbon::createFromTimestampMs($this->lap_time_in_milliseconds)
                ->format('i:s.v')
        );
    }

    protected function totalTime(): Attribute
    {
        return Attribute::get(fn() =>
            Carbon::createFromTimestampMs($this->total_time_in_milliseconds)
                ->format('i:s.v')
        );
    }
}
