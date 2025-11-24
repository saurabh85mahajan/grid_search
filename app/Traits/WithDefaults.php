<?php

namespace App\Traits;

trait WithDefaults
{
    public function getDefaultPeriod(): int
    {
        return 1; // Change this value when needed
    }
    
    public function initializeHasDefaultFilters(): void
    {
        $this->period = $this->period ?? $this->getDefaultPeriod();
    }

    public function getPeriodOptions(): array
    {
        return [
            1 => 'Nov, 2025',
            2 => 'Dec, 2025',
            // 3 => 'Jan, 2026',
            // Add more as needed
        ];
    }
}