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


    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'id');
    }
}
