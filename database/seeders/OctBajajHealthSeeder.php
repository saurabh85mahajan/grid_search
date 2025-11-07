<?php

namespace Database\Seeders;

use Database\Seeders\Traits\BajajPoliciesTrait;
use Illuminate\Database\Seeder;

class OctBajajHealthSeeder extends Seeder
{
    use BajajPoliciesTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedPolicies(1);
    }
}