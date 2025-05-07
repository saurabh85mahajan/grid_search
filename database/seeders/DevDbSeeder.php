<?php

namespace Database\Seeders;

use App\Models\Cc;
use App\Models\Entry;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DevDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'System Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'organisation_id' => null,
        ]);

        User::create([
            'name' => 'Nikhil M',
            'email' => 'nikhil@gmail.com',
            'password' => Hash::make('nikhil123'),
            'organisation_id' => 2,
        ]);

        User::create([
            'name' => 'Admin LLC',
            'email' => 'admin1@admin.com',
            'password' => Hash::make('admin123'),
            'organisation_id' => 1,
        ]);

        Cc::factory()->count(10)->create();
        Entry::factory()->count(10)->create();
        
    }
}
