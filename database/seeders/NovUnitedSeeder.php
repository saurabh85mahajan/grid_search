<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Traits\UnitedPoliciesTrait;

class NovUnitedSeeder extends Seeder
{
    use UnitedPoliciesTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedPolicies(2);
    }
}