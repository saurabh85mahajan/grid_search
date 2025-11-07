<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait BajajPoliciesTrait
{
    protected function getPolicies(): array
    {
        return [
            ['insurer' => 'Tata-Bajaj Capital', 'segment' => 'HEALTH', 'policy_type' => 'Port', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 17],
            ['insurer' => 'Tata-Bajaj Capital', 'segment' => 'HEALTH', 'policy_type' => 'Fresh', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 33],
            ['insurer' => 'Tata-Bajaj Capital', 'segment' => 'HEALTH', 'policy_type' => 'Renewal', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 17],
        ];
    }

    protected function seedPolicies(int $period): void
    {
        $policies = $this->getPolicies();

        foreach ($policies as $policy) {
            DB::table('insurance_grid_raws')->insert(array_merge([
                'location' => null,
                'location_remarks' => null,
                'insurer_remarks' => null,
                'segment_remarks' => null,
                'policy_type_remarks' => null,
                'remarks_additional' => null,
                'region' => null,
                'period' => $period,
                'created_at' => now(),
                'updated_at' => now(),
            ], $policy));
        }

        $this->command->info('Seeded ' . count($policies) . ' insurance policies with period ' . $period);
    }
}