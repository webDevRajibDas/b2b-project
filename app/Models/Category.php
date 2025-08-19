<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['title','status','order','slug'];



    public function products()
    {
        return $this->hasMany(Product::class, 'categorie_id');
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategorie::class, 'parent_id')->where('status', 1);
    }


    public function scopeTopLevel($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereNull('parent_id');
    }


    /**
     * Get the URL for the category/subcategory/sub-subcategory.
     * Assumes you have routes defined like /categories/{slug} or similar.
     */
    public function getUrlAttribute()
    {
        // Adjust the route name and parameters as needed for your application
        return route('categories.show', $this->slug ?? $this->id);
    }


    /**
     * Boot method to handle slug generation automatically.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
                // Ensure slug uniqueness
                $count = static::where('slug', 'like', $model->slug . '%')->count();
                if ($count > 0) {
                    $model->slug .= '-' . ($count + 1);
                }
            }
        });

        // Optional: Re-generate slug on update if title changes and slug is null/old
        static::updating(function ($model) {
            if (($model->isDirty('title') || $model->isDirty('slug')) && empty($model->slug)) {
                 $model->slug = Str::slug($model->title);
                 $count = static::where('slug', 'like', $model->slug . '%')->count();
                 if ($count > 0) {
                    $model->slug .= '-' . ($count + 1);
                 }
            } elseif ($model->isDirty('title') && !empty($model->slug)) {
                 // Decide if you want to update slug when title changes
                 // Often, slugs are kept static once generated
            }
        });
    }

}
