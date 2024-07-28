<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Race extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $attributes = [
        'seconds_per_penalty' => 2,
    ];

    public function runs(): HasMany
    {
        return $this->hasMany(Run::class);
    }

    public function drivers(): HasMany
    {
        return $this->hasMany(Driver::class);
    }
}
