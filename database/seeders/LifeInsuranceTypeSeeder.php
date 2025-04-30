<?php

namespace Database\Seeders;

use App\Models\LifeInsuranceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LifeInsuranceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $results = [
            'Term Life Insurance',
            'Whole Life Insurance',
            'Endowment Policy',
            'Unit Linked Insurance Plan (ULIP)',
            'Money Back Policy',
            'Retirement/Pension Plan',
            'Child Plan',
            'Group Life Insurance',
            'Variable Life Insurance',
            'Universal Life Insurance'
        ];

        foreach ($results as $result) {
            LifeInsuranceType::firstOrCreate(
                ['name' => $result],
                ['is_active' => true],
            );
        } 
    }
}
