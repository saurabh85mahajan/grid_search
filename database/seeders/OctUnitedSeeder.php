<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OctUnitedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [
            ['insurer' => 'UNITED', 'segment' => 'GCW', 'segment_remarks' => 'GCV - < 2000 GVW', 'policy_type' => 'PACKAGE & THIRD PARTY', 'location' => 'MH, GJ OD', 'remarks_additional' => '-', 'points' => 62.00],
            ['insurer' => 'UNITED', 'segment' => 'GCW', 'segment_remarks' => 'GCV - 2001-3500 GVW', 'policy_type' => 'PACKAGE & THIRD PARTY', 'location' => 'MH, GJ OD', 'remarks_additional' => '-', 'points' => 42.00],
            ['insurer' => 'UNITED', 'segment' => 'GCW', 'segment_remarks' => 'GCV - < 2000 GVW', 'policy_type' => 'PACKAGE & THIRD PARTY', 'location' => 'PAN INDIA (EXCEPT MH, GJ OD)', 'remarks_additional' => '-', 'points' => 64.00],
            ['insurer' => 'UNITED', 'segment' => 'GCW', 'segment_remarks' => 'GCV - 2001-3500 GVW', 'policy_type' => 'PACKAGE & THIRD PARTY', 'location' => 'PAN INDIA (EXCEPT MH, GJ OD)', 'remarks_additional' => '-', 'points' => 44.00],
            ['insurer' => 'UNITED', 'segment' => 'GCW', 'segment_remarks' => 'GCV - 3501 - 7500 GVW', 'policy_type' => 'PACKAGE & THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 25.00],
            ['insurer' => 'UNITED', 'segment' => 'GCW', 'segment_remarks' => 'GCV - 7501 - 10000 GVW', 'policy_type' => 'PACKAGE & THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 18.00],
            ['insurer' => 'UNITED', 'segment' => 'GCW', 'segment_remarks' => 'GCV 3 W Dvan', 'policy_type' => 'PACKAGE & THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 60.00],
            ['insurer' => 'UNITED', 'segment' => '3W PCV', 'segment_remarks' => 'PCV AUTO', 'policy_type' => 'PACKAGE', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 48.00],
            ['insurer' => 'UNITED', 'segment' => '3W PCV', 'segment_remarks' => 'PCV AUTO', 'policy_type' => 'THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => '-', 'points' => 28.00],
            ['insurer' => 'UNITED', 'segment' => 'PRIVATE CAR', 'segment_remarks' => 'PRIVATE CAR', 'policy_type' => 'Third Party', 'location' => 'PAN INDIA', 'remarks_additional' => 'Petrol - Upto 2500cc Only', 'points' => 18],
            ['insurer' => 'UNITED', 'segment' => 'PRIVATE CAR', 'segment_remarks' => 'PRIVATE CAR', 'policy_type' => 'Third Party', 'location' => 'PAN INDIA', 'remarks_additional' => 'Diesel - 1501 - 2500cc Only', 'points' => 18],
            ['insurer' => 'UNITED', 'segment' => 'PRIVATE CAR', 'segment_remarks' => 'PRIVATE CAR', 'policy_type' => 'Third Party', 'location' => 'PAN INDIA', 'remarks_additional' => 'Other Than EV - Above 2501cc - TATA, Maruti, Mahindra, Toyota, Hyundai, Honda, KIA Makes Decline', 'points' => 18],
            ['insurer' => 'UNITED', 'segment' => '2W', 'segment_remarks' => 'Old', 'policy_type' => 'PACKAGE & THIRD PARTY', 'location' => 'PAN INDIA', 'remarks_additional' => 'Upto 350cc', 'points' => 23],
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
