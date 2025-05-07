<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    //
    protected $table = 'entries';
    protected $guarded = [];

    use HasFactory;

    public function businessType()
    {
        return $this->belongsTo(BusinessType::class);
    }

    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

    public function insuranceType()
    {
        return $this->belongsTo(InsuranceType::class);
    }

    public function lifeInsuranceType()
    {
        return $this->belongsTo(LifeInsuranceType::class);
    }

    public function healthInsuranceType()
    {
        return $this->belongsTo(HealthInsuranceType::class);
    }

    public function generalInsuranceType()
    {
        return $this->belongsTo(GeneralInsuranceType::class);
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function premiumFrequency()
    {
        return $this->belongsTo(PremiumFrequency::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
