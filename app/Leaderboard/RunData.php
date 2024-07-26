<?php

namespace App\Leaderboard;

use App\Models\Run;

class RunData
{
    public function __construct(
        public string $total_time,
        public string $lap_time,
        public int $penalties,
        public int $penalty_time,
        public bool $fastest = false,
    ) {
    }

    public static function fromRun(Run $run, bool $fastest = false): RunData
    {
        $total_time = str($run->total_time);
        $total_time = $total_time->after('00:');

        return new self(
            $total_time,
            $run->run_time,
            $run->penalty_count,
            $run->penalty_time_in_seconds,
            $fastest
        );
    }
}
