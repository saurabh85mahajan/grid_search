<?php

namespace Database\Seeders;

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

        //Entry Resource, ppc
        User::create([
            'name' => 'Admin PPC',
            'email' => 'admin_ppc@admin.com',
            'password' => Hash::make('admin123'),
            'organisation_id' => 2,
            'is_organisation_admin' => true,
        ]);

        //CC Resource, llc
        User::create([
            'name' => 'Admin Itfusion',
            'email' => 'Itfusion360@gmail.com',
            'password' => Hash::make('X7f#92Lk@tVq!9wZ'),
            'organisation_id' => 1,
            'is_organisation_admin' => true,
        ]);

        //Grid Resource
        User::create([
            'name' => 'Admin Grid',
            'email' => 'admin_grid@aiwebdesk.com',
            'password' => Hash::make('admin123'),
            'organisation_id' => 4,
            'is_organisation_admin' => true,
        ]);

        $managers = User::factory()->count(2)->sequence(
            ['name' => 'Manager One'],
            ['name' => 'Manager Two']
        )->create([
            'is_manager' => 1,
            'organisation_id' => 2,
        ]);

        $subordinates = collect();
        $employeeCounter = 1;

        $managers->each(function ($manager) use ($subordinates, &$employeeCounter) {
            $managerSubordinates = User::factory()->count(3)->sequence(function ($sequence) use (&$employeeCounter) {
                return ['name' => 'Employee ' . $employeeCounter++];
            })->create([
                'is_manager' => 0,
                'manager_id' => $manager->id,
                'organisation_id' => 2,
            ]);
            $subordinates->push(...$managerSubordinates);
        });

        Entry::factory()->count(10)->create([
            'user_id' => function () use ($subordinates) {
                return $subordinates->random()->id;
            }
        ]);
    }
}
