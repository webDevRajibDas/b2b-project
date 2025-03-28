<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'title', 'description', 'video_link', 'video_path', 'status'
    ];


    /** @use HasFactory<\Database\Factories\SliderFactory> */
    use HasFactory;
}
