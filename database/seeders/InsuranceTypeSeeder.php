<?php

namespace Database\Seeders;

use App\Models\InsuranceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsuranceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $results = [
            'Life',
            'Health',
            'General',
        ];

        foreach ($results as $result) {
            InsuranceType::firstOrCreate(
                ['name' => $result],
                ['is_active' => true],
            );
        } 
    }
}
