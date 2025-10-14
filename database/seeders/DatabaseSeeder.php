<?php

namespace Database\Seeders;

use App\Models\InsuranceGridRaw;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
           InsuranceGridRawSeeder::class,
           InsuranceGridGujaratSeeder::class,
           InsuranceGridMhSeeder::class,
           InsuranceGridOrientSeeder::class,
           InsuranceGridUnitedSeeder::class,
        ]);
    }
}
