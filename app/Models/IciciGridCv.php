<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class IciciGridCv extends Model
{
    protected $fillable = [
        'rto_cluster',
        'category',
        'value',
        'period',
        'is_highlight',
    ];

    protected $casts = [
        'is_highlight' => 'boolean',
    ];

    /**
     * Get the formatted value with 10% reduction
     */
    protected function formattedValue(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->formatValue($this->value)
        );
    }

    /**
     * Format value by reducing percentages by 10
     */
    private function formatValue(?string $value): string
    {
        if (empty($value)) {
            return '';
        }

        // If the entire value is numeric, reduce by 10 and add %
        if (is_numeric($value)) {
            return ($value - 10) . '%';
        }

        // Replace all percentage values in the string
        return preg_replace_callback('/(\d+(?:\.\d+)?)%/', function ($matches) {
            $original = (float) $matches[1];
            $new = $original - 10;

            // Optional: prevent negative values
            // $new = max(0, $new);

            // If it's an integer, drop the decimal .0
            if (floor($new) == $new) {
                return (int) $new . '%';
            }

            return $new . '%';
        }, $value);
    }
}