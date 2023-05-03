<?php

/**
 * Boa Test - Profiler.
 *
 * Runs resource usage tests.
 */

namespace Boa\Test;

class Profiler
{
    /**
     * Gets the script's resource usage.
     * @return array The resource usage.
     */
    public function ResourceUsage(): array
    {
        return ['memory' => ['current' => memory_get_usage(), 'peak' => memory_get_peak_usage()], 'cpu' => getrusage()];
    }
}