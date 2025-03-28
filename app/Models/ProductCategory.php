<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    protected $fillable = ['title','status','order'];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_categorie_id');
    }
}
