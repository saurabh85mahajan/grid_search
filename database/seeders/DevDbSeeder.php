<?php

namespace Database\Seeders;

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

        //Grid Resource
        User::create([
            'name' => 'Admin Grid',
            'email' => 'admin_grid@admin.com',
            'password' => Hash::make('admin123'),
            'organisation_id' => 4,
            'is_organisation_admin' => true,
        ]);
    }
}
