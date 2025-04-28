<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $regions = [
            ['name' => 'AGRA'],
            ['name' => 'AHMEDABAD'],
            ['name' => 'AMBALA'],
            ['name' => 'AMRITSAR'],
            ['name' => 'AURANGABAD'],
            ['name' => 'BANGLORE'],
            ['name' => 'BARODA'],
            ['name' => 'BHATINDA'],
            ['name' => 'BHAVNAGAR'],
            ['name' => 'BHOPAL'],
            ['name' => 'CHANDIGARH'],
            ['name' => 'CHENNAI'],
            ['name' => 'COCHIN'],
            ['name' => 'DEHRADUN'],
            ['name' => 'DELHI'],
            ['name' => 'GANDHIDHAM'],
            ['name' => 'GOA'],
            ['name' => 'HYDERABAD'],
            ['name' => 'INDORE'],
            ['name' => 'JAIPUR'],
            ['name' => 'JALANDHAR'],
            ['name' => 'JAMNAGAR'],
            ['name' => 'KOLKATA'],
            ['name' => 'LUCKNOW'],
            ['name' => 'LUDHIANA'],
            ['name' => 'MEHSANA'],
            ['name' => 'MOHALI'],
            ['name' => 'MUMBAI'],
            ['name' => 'NAGPUR'],
            ['name' => 'NASIK'],
            ['name' => 'PANCHKULA'],
            ['name' => 'PATIALA'],
            ['name' => 'PATNA'],
            ['name' => 'PUNE'],
            ['name' => 'RAIPUR'],
            ['name' => 'RAJKOT'],
            ['name' => 'SANGRUR'],
            ['name' => 'SRINAGAR'],
            ['name' => 'SURAT'],
            ['name' => 'TRIVANDRUM'],
            ['name' => 'VAPI'],
        ];

        foreach ($regions as $region) {
            Region::firstOrCreate(
                ['name' => $region['name']],
                ['is_active' => true],
            );
        }
    }
}
