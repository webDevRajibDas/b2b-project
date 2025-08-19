<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubSubcategorie extends Model
{
    //protected $table = 'sub_subcategories';
    
    protected $fillable = ['title','sub_categorie_id','categorie_id', 'description', 'slug','image','order','status'];
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

    public function products()
    {
        return $this->hasMany(Product::class); // or whatever your relationship is
    }
   
    
    public function subcategory()
    {
        return $this->belongsTo(SubCategorie::class, 'sub_categorie_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
   
}
