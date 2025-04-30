<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $results = [
            'Agriculture & Farming',
            'Automotive',
            'Banking & Financial Services',
            'Construction & Real Estate',
            'Consulting & Professional Services',
            'Education & Training',
            'Energy & Utilities',
            'Entertainment & Media',
            'Food & Beverage',
            'Healthcare & Pharmaceuticals',
            'Hospitality & Tourism',
            'Information Technology & Software',
            'Legal Services',
            'Manufacturing',
            'Mining & Natural Resources',
            'Non-Profit & NGO',
            'Retail & E-commerce',
            'Telecommunications',
            'Transportation & Logistics',
            'Wholesale & Distribution',
            'Import/Export',
            'Insurance & Risk Management',
            'Marketing & Advertising',
            'Government & Public Sector',
            'Waste Management & Recycling',
        ];

        foreach ($results as $result) {
            BusinessType::firstOrCreate(
                ['name' => $result],
                ['is_active' => true],
            );
        } 
    }
}
