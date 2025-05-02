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
            ['product_id' => 1, 'name' => 'Commercial'],
            ['product_id' => 1, 'name' => 'Private'],
            ['product_id' => 1, 'name' => 'Private - 1 Year Old'],
            ['product_id' => 1, 'name' => 'Private - 1 Year Old and 3 Year TP'],
            ['product_id' => 1, 'name' => 'Private - 3 Year OD and 3 Year TP'],
            ['product_id' => 1, 'name' => 'Private - 3 Year TP'],
            ['product_id' => 2, 'name' => 'Commercial'],
            ['product_id' => 2, 'name' => 'Private'],
            ['product_id' => 2, 'name' => 'Private - 1 Year Old'],
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
