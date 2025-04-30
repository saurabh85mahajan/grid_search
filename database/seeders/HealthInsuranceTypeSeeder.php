<?php

namespace Database\Seeders;

use App\Models\HealthInsuranceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HealthInsuranceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $results = [
            'Individual Health Insurance',
            'Family Floater Health Insurance',
            'Group Health Insurance',
            'Senior Citizen Health Insurance',
            'Critical Illness Insurance',
            'Hospital Cash',
            'Maternity Health Insurance',
            'Personal Accident Insurance',
            'Preventive Healthcare',
            'Disease-Specific Insurance',
            'Top-up Health Insurance'
        ];

        foreach ($results as $result) {
            HealthInsuranceType::firstOrCreate(
                ['name' => $result],
                ['is_active' => true],
            );
        } 
    }
}
