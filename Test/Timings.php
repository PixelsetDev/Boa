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

    public function Start()
    {
        $this->StartTime = microtime(true);
    }

    public function End(): float
    {
        return $this->StartTime - microtime(true);
    }
}