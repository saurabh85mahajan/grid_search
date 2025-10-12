<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceGridRaw extends Model
{
    //
    protected $guarded = [];

    public function getInsurerWithRemarksAttribute(): string
    {
        $insurer = $this->insurer ?? '';
        $remarks = $this->insurer_remarks ?? '';

        if (empty($remarks)) {
            return $insurer;
        }

        return $insurer . ' - ' . $remarks;
    }

    /**
     * Get the segment with remarks concatenated
     *
     * @return string
     */
    public function getSegmentWithRemarksAttribute(): string
    {
        $segment = $this->segment ?? '';
        $remarks = $this->segment_remarks ?? '';

        if (empty($remarks)) {
            return $segment;
        }

        return $segment . ' - ' . $remarks;
    }

    /**
     * Get the policy type with remarks concatenated
     *
     * @return string
     */
    public function getPolicyTypeWithRemarksAttribute(): string
    {
        $policyType = $this->policy_type ?? '';
        $remarks = $this->policy_type_remarks ?? '';

        if (empty($remarks)) {
            return $policyType;
        }

        return $policyType . ' - ' . $remarks;
    }

    public static function getPeriodArray(): array
    {
        return [
            '1' => 'Oct, 2025',
        ];
    }

    public static function getRegionArray(): array
    {
        return [
            '1' => 'UP, DL, UK, HR',
            '2' => 'Maharashtra',
        ];
    }
}
