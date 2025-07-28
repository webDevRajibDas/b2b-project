<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Card extends Model
{

    protected $fillable = ['title','description', 'image','content','price', 'sale_price','status','card_categorie_id','type','attr_price','attr_packege'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $slug = Str::slug($product->title);
            $count = Card::where('slug', 'like', "{$slug}%")->count();
            $product->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        static::updating(function ($product) {
            $slug = Str::slug($product->title);
            $count = Card::where('slug', 'like', "{$slug}%")->where('id', '!=', $product->id)->count();
            $product->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }


    public function gallery(): HasMany
    {
        return $this->hasMany(CardImage::class);
    }
    public function cardCategory()
    {
        return $this->belongsTo(CardCategory::class, 'card_categorie_id'); //product_categories
    }


}
