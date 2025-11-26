<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class SriramGridAll extends Model
{
    //
    protected $guarded = [];

    protected $casts = [
        'is_highlight' => 'boolean',
    ];

    protected function formattedValue(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->formatValue($this->value)
        );
    }

    private function formatValue(?string $value): string
    {
        if (empty($value)) {
            return '';
        }

        // If the entire value is numeric, reduce by 10 and add %
        if (is_numeric($value)) {
            return ($value - 10) . '%';
        }

        // Replace all numeric values (with optional % or OD suffix)
        // Use word boundary and negative lookbehind to avoid matching digits within numbers preceded by < or >
        return preg_replace_callback(
            '/(?<![<>])\b(\d+(?:\.\d+)?)(%|OD)?\b/',
            function ($matches) {
                $original = (float) $matches[1];
                $new = $original - 10;

                // Optional: prevent negative values
                // $new = max(0, $new);

                $suffix = $matches[2] ?? '';

                // If it's an integer, drop the decimal .0
                if (floor($new) == $new) {
                    return (int) $new . $suffix;
                }

                return $new . $suffix;
            },
            $value
        );
    }
}
