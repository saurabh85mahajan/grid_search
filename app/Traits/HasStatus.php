<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasStatus
{
    /**
     * Scope a query to only include active records.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', 1);
    }

    /**
     * Scope a query to only include inactive records.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('is_active', 0);
    }

    /**
     * Check if the model instance is active.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->is_active == 1;
    }

    /**
     * Check if the model instance is inactive.
     *
     * @return bool
     */
    public function isInactive(): bool
    {
        return $this->is_active == 0;
    }

    /**
     * Mark the model as active.
     *
     * @return bool
     */
    public function markAsActive(): bool
    {
        return $this->update(['is_active' => 1]);
    }

    /**
     * Mark the model as inactive.
     *
     * @return bool
     */
    public function markAsInactive(): bool
    {
        return $this->update(['is_active' => 0]);
    }
}