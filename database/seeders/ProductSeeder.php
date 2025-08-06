<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategorie;
use App\Models\SubSubcategorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Only these main categories
        $categoryNames = [
            'Electronics', 'Clothing', 'ICT Products',
            'Software & Website', 'Footwear', 'Books'
        ];

        $categories = Category::whereNull('parent_id')
            ->whereIn('title', $categoryNames)
            ->get();

        $subCategories = Category::whereIn('parent_id', $categories->pluck('id'))->get();
        $subSubCategories = Category::whereIn('parent_id', $subCategories->pluck('id'))->get();

        foreach (range(1, 10) as $i) {
            $category = $categories->random();

            $relatedSubCategories = $subCategories->where('parent_id', $category->id);
            $subCategory = $relatedSubCategories->isNotEmpty() ? $relatedSubCategories->random() : null;

            $relatedSubSubCategories = $subSubCategories->where('parent_id', $subCategory?->id);
            $subSubCategory = $relatedSubSubCategories->isNotEmpty() ? $relatedSubSubCategories->random() : null;

            $product = Product::create([
                'name' => $name = $faker->words(3, true),
                'slug' => Str::slug($name),
                'description' => $faker->sentence(),
                'content' => $faker->paragraph(),
                'status' => 'published',
                'image' => 'https://placehold.co/600x400/png?text=Product+' . $i,
                'atts' => json_encode(['color' => 'red', 'size' => 'L']),
                'sku' => strtoupper(Str::random(8)),
                'order' => rand(1, 100),
                'quantity' => rand(10, 200),
                'is_featured' => rand(0, 1),
                'brand_id' => 1,
                'vendor_id' => null,
                'categorie_id' => $category->id,
                'sub_categorie_id' => $subCategory?->id,
                'sub_subcategorie_id' => $subSubCategory?->id,
                'sale_type' => 0,
                'price' => $price = rand(100, 500),
                'sale_price' => $price - rand(10, 50),
                'stock_status' => 'in_stock',
                'product_type' => 'physical',
                'cost_per_item' => $price - 20,
                'minimum_order_quantity' => 1,
                'maximum_order_quantity' => 5,
            ]);

            foreach (range(1, 3) as $j) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => "https://placehold.co/600x400/png?text=Gallery+{$j}+of+Product+{$i}",
                ]);
            }
        }
    }

}
