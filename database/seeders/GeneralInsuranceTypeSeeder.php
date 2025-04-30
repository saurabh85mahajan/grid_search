<?php

namespace Database\Seeders;

use App\Models\GeneralInsuranceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralInsuranceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $results = [
            'Motor Insurance',
            'Home Insurance',
            'Travel Insurance',
            'Fire Insurance',
            'Marine Insurance',
            'Property Insurance',
            'Liability Insurance',
            'Crop Insurance',
            'Rural Insurance',
            'Commercial Vehicle Insurance',
            'Engineering Insurance',
            'Burglary Insurance',
            'Cyber Insurance',
            'Pet Insurance',
            'Aviation Insurance',
        ];

        foreach ($results as $result) {
            GeneralInsuranceType::firstOrCreate(
                ['name' => $result],
                ['is_active' => true],
            );
        } 
    }
}
