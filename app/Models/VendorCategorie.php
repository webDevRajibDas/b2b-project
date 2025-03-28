<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VendorCategorie extends Model
{


    protected $fillable = ['title', 'description', 'slug','image','template'];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $slug = Str::slug($category->title);
                $count = static::where('slug', 'like', $slug . '%')->count();
                $category->slug = $count > 0 ? "{$slug}-{$count}" : $slug;
            }
        });
    }


    public function subCategories()
    {
        return $this->hasMany(SubCategorie::class, 'parent_id');
    }
}
