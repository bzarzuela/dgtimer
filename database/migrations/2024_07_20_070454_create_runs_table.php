<?php

use App\Models\Driver;
use App\Models\Race;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('runs', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Race::class)->constrained();
            $table->foreignIdFor(Driver::class)->constrained();

            $table->unsignedBigInteger('lap_time_in_milliseconds');

            $table->unsignedBigInteger('penalty_time_in_seconds');
            $table->unsignedInteger('penalty_count');

            $table->unsignedBigInteger('total_time_in_milliseconds');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('runs');
    }
};
