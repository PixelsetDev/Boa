<?php

/**
 * Saturn Test - Timings.
 *
 * Runs load time tests.
 */

namespace Boa\Test;

class Timings
{
    private float $StartTime;

    /**
     * Starts the Timings test.
     * @return void
     */
    public function Start()
    {
        $this->StartTime = microtime(true);
    }

    /**
     * Ends the Timings test.
     * @return float The time taken to run the script.
     */
    public function End(): float
    {
        return $this->StartTime - microtime(true);
    }
}