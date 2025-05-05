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
            ['name' => 'Agra'],
            ['name' => 'Ahmedabad'],
            ['name' => 'Ambala'],
            ['name' => 'Amritsar'],
            ['name' => 'Aurangabad'],
            ['name' => 'Banglore'],
            ['name' => 'Baroda'],
            ['name' => 'Bhatinda'],
            ['name' => 'Bhavnagar'],
            ['name' => 'Bhopal'],
            ['name' => 'Chandigarh'],
            ['name' => 'Chennai'],
            ['name' => 'Cochin'],
            ['name' => 'Dehradun'],
            ['name' => 'Delhi'],
            ['name' => 'Gandhidham'],
            ['name' => 'Goa'],
            ['name' => 'Hyderabad'],
            ['name' => 'Indore'],
            ['name' => 'Jaipur'],
            ['name' => 'Jalandhar'],
            ['name' => 'Jamnagar'],
            ['name' => 'Kolkata'],
            ['name' => 'Lucknow'],
            ['name' => 'Ludhiana'],
            ['name' => 'Mehsana'],
            ['name' => 'Mohali'],
            ['name' => 'Mumbai'],
            ['name' => 'Nagpur'],
            ['name' => 'Nasik'],
            ['name' => 'Panchkula'],
            ['name' => 'Patiala'],
            ['name' => 'Patna'],
            ['name' => 'Pune'],
            ['name' => 'Raipur'],
            ['name' => 'Rajkot'],
            ['name' => 'Sangrur'],
            ['name' => 'Srinagar'],
            ['name' => 'Surat'],
            ['name' => 'Trivandrum'],
            ['name' => 'Vapi'],
        ];

        foreach ($regions as $region) {
            Region::firstOrCreate(
                ['name' => $region['name']],
                ['is_active' => true],
            );
        }
    }
}
