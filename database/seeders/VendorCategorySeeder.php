<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VendorCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define dummy data
        $categories = [
            [
                'title' => 'Electronics',
                'slug' => Str::slug('Electronics'),
                'description' => 'All kinds of electronic devices and accessories.',
                'image' => 'electronics.png',
                'template' => 'electronics',
                'order' => 1,
                'status' => '1',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'title' => 'Fashion',
                'slug' => Str::slug('Fashion'),
                'description' => 'Trendy clothing and accessories for men and women.',
                'image' => 'fashion.png',
                'template' => 'fashion',
                'order' => 2,
                'status' => '1',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'title' => 'Home & Kitchen',
                'slug' => Str::slug('Home & Kitchen'),
                'description' => 'Everything you need for your home and kitchen.',
                'image' => 'home-kitchen.png',
                'template' => 'home-kitchen',
                'order' => 3,
                'status' => '1',
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ];

        // Insert data into the vendor_categories table
        DB::table('vendor_categories')->insert($categories);
    }
}
