<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['product_id' => 1, 'name' => 'COMMERCIAL'],
            ['product_id' => 1, 'name' => 'PRIVATE'],
            ['product_id' => 1, 'name' => 'PRIVATE - 1 YEAR OLD'],
            ['product_id' => 1, 'name' => 'PRIVATE - 1 YEAR OLD AND 3 YEAR TP'],
            ['product_id' => 1, 'name' => 'PRIVATE - 3 YEAR OD AND 3 YEAR TP'],
            ['product_id' => 1, 'name' => 'PRIVATE - 3 YEAR TP'],
            ['product_id' => 2, 'name' => 'COMMERCIAL'],
            ['product_id' => 2, 'name' => 'PRIVATE'],
            ['product_id' => 2, 'name' => 'PRIVATE - 1 YEAR OLD'],
            ['product_id' => 2, 'name' => 'Private - 1 Year OD and 5 Year TP'],
            ['product_id' => 2, 'name' => 'Private - 2 Year OD and 2 Year TP'],
            ['product_id' => 2, 'name' => 'Private - 2 Year TP'],
            ['product_id' => 2, 'name' => 'Private - 3 Year OD and 3 Year TP'],
            ['product_id' => 2, 'name' => 'Private - 3 Year TP'],
            ['product_id' => 2, 'name' => 'Private - 5 Year OD and 5 Year TP'],
            ['product_id' => 2, 'name' => 'Private - 5 Year TP'],
        ];

        ProductCategory::truncate();
        foreach ($categories as $category) {
            ProductCategory::create([
                'product_id' => $category['product_id'],
                'name' => $category['name'],
                'is_active' => true,
            ]);
        }
        
    }
}
