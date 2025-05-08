<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entry extends Model
{
    //
    protected $table = 'entries';
    protected $guarded = [];

    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function businessType(): BelongsTo
    {
        return $this->belongsTo(BusinessType::class);
    }

    public function insuranceCompany(): BelongsTo
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

    public function insuranceType(): BelongsTo
    {
        return $this->belongsTo(InsuranceType::class);
    }

    public function lifeInsuranceType(): BelongsTo
    {
        return $this->belongsTo(LifeInsuranceType::class);
    }

    public function healthInsuranceType(): BelongsTo
    {
        return $this->belongsTo(HealthInsuranceType::class);
    }

    public function generalInsuranceType(): BelongsTo
    {
        return $this->belongsTo(GeneralInsuranceType::class);
    }

    public function make(): BelongsTo
    {
        return $this->belongsTo(Make::class);
    }

    public function premiumFrequency(): BelongsTo
    {
        return $this->belongsTo(PremiumFrequency::class);
    }

    public function getInsuranceTypeNameAttribute(): ?string
    {
        if (!$this->insurance_type_id) {
            return null;
        }

        switch ($this->insurance_type_id) {
            case 1:
                return 'Life: ' . $this->lifeInsuranceType?->name;
            case 2:
                return 'Health: ' . $this->healthInsuranceType?->name;
            case 3:
                return 'General: ' . $this->generalInsuranceType?->name;
            default:
                return null;
        }
    }
}
