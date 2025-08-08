<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ccdemo extends Model
{
    use HasFactory;
    
    protected $table = 'ccs_3';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
	
	public function salutation(): BelongsTo
    {
        return $this->belongsTo(Salutation::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
	
	public function make(): BelongsTo
    {
        return $this->belongsTo(Make::class);
    }

    public function fuelType(): BelongsTo
    {
        return $this->belongsTo(FuelType::class);
    }	
}
