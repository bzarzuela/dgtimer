<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    use HasFactory;

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
