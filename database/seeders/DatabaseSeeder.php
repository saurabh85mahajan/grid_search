<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            SalutationSeeder::class,
            CitySeeder::class,
            RegionSeeder::class,
            BusinessLockSeeder::class,
            InsuranceCompanySeeder::class,
            ProductSeeder::class,
            NcbSeeder::class,
            FuelTypeSeeder::class,
            BankSeeder::class,
            MakeSeeder::class,
            RtoSeeder::class,

            BusinessTypeSeeder::class,
            InsuranceTypeSeeder::class,
            LifeInsuranceTypeSeeder::class,
            HealthInsuranceTypeSeeder::class,
            GeneralInsuranceTypeSeeder::class,
            PremiumFrequencySeeder::class,
        ]);
    }
}
