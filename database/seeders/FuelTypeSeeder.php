<?php

namespace Database\Seeders;

use App\Models\FuelType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $fuels = [
            ['name' => 'Petrol'],
            ['name' => 'Diesel'],
            ['name' => 'Electric'],
            ['name' => 'Hybrid'],
            ['name' => 'CNG'],
            ['name' => 'Inbuilt CNG'],
            ['name' => 'LPG'],
            ['name' => 'Inbuilt LPG'],
        ];

        foreach ($fuels as $fuel) {
            FuelType::firstOrCreate(
                ['name' => $fuel['name']],
                ['is_active' => true],
            );
        }
    }
}
