<?php

namespace Database\Seeders;

use App\Models\PremiumFrequency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PremiumFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $results = [
            'Monthly',
            'Quarterly',
            'Semi-annually',
            'Annually',
        ];

        foreach ($results as $result) {
            PremiumFrequency::firstOrCreate(
                ['name' => $result],
                ['is_active' => true],
            );
        }
    }
}
