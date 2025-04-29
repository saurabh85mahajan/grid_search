<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\FuelType;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            SalutationSeeder::class,
            CitySeeder::class,
            RegionSeeder::class,
            BusinessLockSeeder::class,
            InsuranceCompanySeeder::class,
            Product::class,
            NcbSeeder::class,
            FuelType::class,
            Bank::class,
            MakeSeeder::class,
        ]);
    }
}
