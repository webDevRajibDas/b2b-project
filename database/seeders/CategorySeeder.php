<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Electronics',
                'created_by' => 1,
                'status' => 'active',
                'order' => 1,
            ],
            [
                'title' => 'Clothing',
                'created_by' => 1,
                'status' => 'active',
                'order' => 2,
            ],
            [
                'title' => 'Home & Kitchen',
                'created_by' => 1,
                'status' => 'active',
                'order' => 3,
            ],
            [
                'title' => 'Books',
                'created_by' => 1,
                'status' => 'active',
                'order' => 4,
            ],
            [
                'title' => 'Sports & Outdoors',
                'created_by' => 1,
                'status' => 'active',
                'order' => 5,
            ],
            [
                'title' => 'Health & Beauty',
                'created_by' => 1,
                'status' => 'active',
                'order' => 6,
            ],
            [
                'title' => 'Toys & Games',
                'created_by' => 1,
                'status' => 'active',
                'order' => 7,
            ],
            [
                'title' => 'Automotive',
                'created_by' => 1,
                'status' => 'active',
                'order' => 8,
            ],
            [
                'title' => 'Furniture',
                'created_by' => 1,
                'status' => 'active',
                'order' => 9,
            ],
            [
                'title' => 'Jewelry',
                'created_by' => 1,
                'status' => 'active',
                'order' => 10,
            ],
        ];

        // Insert data into the product_categories table
        DB::table('categories')->insert($categories);
    }


}
