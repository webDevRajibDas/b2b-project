<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategorie extends Model
{
    protected $fillable = ['title','parent_id', 'description', 'slug','image','order','status'];
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function subSubcategories()
    {
        return $this->hasMany(SubSubcategorie::class, 'sub_categorie_id')->where('status', 1);
    }

}
