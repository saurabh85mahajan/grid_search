<?php

namespace Database\Seeders;

use App\Models\Entry;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
		//CC Resource, Demo
        User::create([
            'name' => 'Admin Demo',
            'email' => 'admin_demo@admin.com',
            'password' => Hash::make('X7f#92Lk@tVq!9wZ'),
            'organisation_id' => 3,
            'is_organisation_admin' => true,
        ]);
    }
}
