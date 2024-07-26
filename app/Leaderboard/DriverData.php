<?php

namespace App\Leaderboard;

class DriverData
{
    public function __construct(
        public string $name,
        public string $fastest_time,

        /**
         * @var array<RunData>
         */
        public array $runs,
    ) {
    }
}
