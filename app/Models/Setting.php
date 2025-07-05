<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'label', 
        'value'
    ];

    // Get raw value
    public static function getValue(string $key): mixed
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : null;
    }

    // Get as array (split by newlines for dropdown options)
    public static function getArray(string $key): array
    {
        $value = static::getValue($key);
        
        if (!$value) {
            return [];
        }
        
        // Split by newlines and filter out empty lines
        $lines = array_filter(array_map('trim', explode("\n", $value)));
        
        return $lines;
    }

    // Get select options (key-value pairs where key = value)
    public static function getSelectOptions(string $key): array
    {
        $options = static::getArray($key);
        
        // If we have multiple lines, treat as dropdown options
        if (count($options) > 1) {
            return array_combine($options, $options);
        }
        
        // If single line, might be a simple text value, return empty array
        return [];
    }

    // Get as string
    public static function getString(string $key): string
    {
        return (string) static::getValue($key);
    }

    // Get as boolean
    public static function getBoolean(string $key): bool
    {
        $value = static::getValue($key);
        
        if (is_string($value)) {
            return in_array(strtolower(trim($value)), ['true', '1', 'yes', 'on']);
        }
        
        return (bool) $value;
    }

    // Get as integer
    public static function getInteger(string $key): int
    {
        return (int) static::getValue($key);
    }

    // Get as float
    public static function getFloat(string $key): float
    {
        return (float) static::getValue($key);
    }
}