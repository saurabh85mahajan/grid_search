<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsuranceGridOrientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [
            ['insurer' => 'ORIENTAL', 'segment' => 'PRIVATE CAR', 'segment_remarks' => 'PRIVATE CAR', 'policy_type' => 'COMPREHENSIVE + SAOD + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 13],
            ['insurer' => 'ORIENTAL', 'segment' => 'GCW', 'segment_remarks' => 'UPTO 2000 GVW', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 49],
            ['insurer' => 'ORIENTAL', 'segment' => 'GCW', 'segment_remarks' => '2001 - 3500 GVW', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 36],
            ['insurer' => 'ORIENTAL', 'segment' => 'GCW', 'segment_remarks' => '3501 - 7500 GVW', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 22],
            ['insurer' => 'ORIENTAL', 'segment' => 'GCW', 'segment_remarks' => '7501 - 10000 GVW', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 13],
            ['insurer' => 'ORIENTAL', 'segment' => 'GCW', 'segment_remarks' => '10001 - 12500 GVW', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 4],
            ['insurer' => 'ORIENTAL', 'segment' => 'GCW', 'segment_remarks' => '12501 -20000 GVW', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 6],
            ['insurer' => 'ORIENTAL', 'segment' => 'GCW', 'segment_remarks' => '20001 - 25000 GVW', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 9],
            ['insurer' => 'ORIENTAL', 'segment' => 'GCW', 'segment_remarks' => '25001 - 34000 GVW', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 6],
            ['insurer' => 'ORIENTAL', 'segment' => 'GCW', 'segment_remarks' => '34001 - 40000 GVW', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 4],
            ['insurer' => 'ORIENTAL', 'segment' => 'GCW', 'segment_remarks' => '40001 - 45000 GVW', 'policy_type' => 'THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 2],
            ['insurer' => 'ORIENTAL', 'segment' => 'Route Bus', 'segment_remarks' => 'Seating Capacity 6- 17', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => 'ALL AGES', 'points' => 13],
            ['insurer' => 'ORIENTAL', 'segment' => 'Route Bus', 'segment_remarks' => 'Seating Capacity 18- 36', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => 'UPTO 10 YEARS. 6.5% ON OD + 2% ON TP', 'points' => 8.5],
            ['insurer' => 'ORIENTAL', 'segment' => 'Route Bus', 'segment_remarks' => 'Seating Capacity 18- 36', 'policy_type' => 'COMPREHENSIVE + THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => 'ABOVE 10 YEARS. 4.5% ON OD + 2% ON TP', 'points' => 6.5],
            ['insurer' => 'ORIENTAL', 'segment' => 'Route Bus', 'segment_remarks' => 'Seating Capacity ABOVE 36', 'policy_type' => 'COMPREHENSIVE', 'location' => 'PAN INDIA', 'remarks_additional' => '', 'points' => 4],
            ['insurer' => 'ORIENTAL', 'segment' => 'MISD', 'segment_remarks' => 'AMBULANCE ONLY', 'policy_type' => 'COMPREHENSIVE', 'location' => 'PAN INDIA', 'remarks_additional' => 'ALL AGES', 'points' => 18],
            ['insurer' => 'ORIENTAL', 'segment' => 'MISD', 'segment_remarks' => 'AMBULANCE ONLY', 'policy_type' => 'THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => 'ALL AGES', 'points' => 9],
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
