<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = ['name','brand_id', 'description', 'image','content','product_categorie_id',
        'brand_id','vendor_id','price', 'sale_price','image','atts','video_media','sku',
        'allow_checkout_when_out_of_stock','with_storehouse_management','is_featured','stock_status','quantity'
    ];

    protected $casts = [
        'atts' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $slug = Str::slug($product->name);
            $count = Product::where('slug', 'like', "{$slug}%")->count();
            $product->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        static::updating(function ($product) {
            $slug = Str::slug($product->name);
            $count = Product::where('slug', 'like', "{$slug}%")->where('id', '!=', $product->id)->count();
            $product->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_categorie_id'); //product_categories
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


    public function gallery(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
