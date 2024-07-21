<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Driver extends Model
{
    use HasFactory;

    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    public function runs(): HasMany
    {
        return $this->hasMany(Run::class);
    }
}
