<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Traits\OrientalPoliciesTrait;

class NovOrientSeeder extends Seeder
{
    use OrientalPoliciesTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedOrientalPolicies(2);
    }
}