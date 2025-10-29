<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OctBajajHealthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [
            ['insurer' => 'BAJAJ', 'segment' => 'HEALTH', 'policy_type' => 'Port', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 17],
            ['insurer' => 'BAJAJ', 'segment' => 'HEALTH', 'policy_type' => 'Health', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 33],
            ['insurer' => 'BAJAJ', 'segment' => 'HEALTH', 'policy_type' => 'Renewal', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 17],
        ];

        // Insert policies with default null values for unspecified columns
        foreach ($policies as $policy) {
            DB::table('insurance_grid_raws')->insert(array_merge([
                'location' => null,
                'location_remarks' => null,
                'insurer_remarks' => null,
                'segment_remarks' => null,
                'policy_type_remarks' => null,
                'remarks_additional' => null,
                'region' => null,
                'period' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], $policy));
        }

        $this->command->info('Seeded ' . count($policies) . ' insurance policies from October 2025 grid.');
    }
}
