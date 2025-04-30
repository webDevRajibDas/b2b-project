<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition(): array
    {
        $attributes = [
            [
                'attName' => 'Size',
                'attValue' => 'Small|Medium|Big',
                'attVisible' => true,
            ],
            [
                'attName' => 'Color',
                'attValue' => 'Blue|Red|Green',
                'attVisible' => true,
            ],
        ];
        if (fake()->boolean(50)){
            $attributes = [
                'attName' => 'Material',
                'attValue' => 'Cotton|Wool|Silk',
                'attVisible' => true,
            ];
        }



        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(10),
            'slug' => Str::slug($this->faker->words(3, true)),
            'content' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl('storage/app/public/products', 640, 480, null, false),
            //echo $faker->imageUrl(640, 480, 'animals', true);
            'status' => 1,
            'video_media' => $this->faker->url,
            'sku' => strtoupper(Str::random(10)),
            'order' => $this->faker->numberBetween(1, 100),
            'quantity' => $this->faker->numberBetween(10, 100),
            'atts' => json_encode($attributes),
            'allow_checkout_when_out_of_stock' => 1,
            'with_storehouse_management' => 1,
            'is_featured' => $this->faker->boolean,
            'brand_id' => 1,
            'vendor_id' => 1,
            'product_categorie_id' =>  $this->faker->numberBetween(1,10),
            'is_variation' => 0,
            'sale_type' => 0,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'sale_price' => $this->faker->randomFloat(2, 5, 400),
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'color' => $this->faker->safeColorName,
            'views' => $this->faker->numberBetween(0, 1000),
            'stock_status' => 'in_stock',
            'created_by_id' => 1,
            'created_by' => 'admin',
            'approved_by' => User::inRandomOrder()->first()?->id,
            'product_type' => 'simple',
            'cost_per_item' => $this->faker->randomFloat(2, 1, 100),
        ];
    }

}
