<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \DB::transaction(function (){
            Product::factory()->count(200)->create()
                ->each(function ($product) {
                    $product->update([
                        'image' => fake()->imageUrl(640, 480, 'products', true),
                    ]);

                    for ($i = 0; $i < random_int(2, 5); $i++) {
                        ProductImage::create([
                            'product_id' => $product->id,
                            'image_path' => fake()->imageUrl(640, 480, 'products', true),
                        ]);
                    }
                });
        });



    }
}
